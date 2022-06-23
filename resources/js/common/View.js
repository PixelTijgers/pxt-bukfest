// TODO Refactor to ES6 class / Use only ES6 classes.
window['common'] = window.common || {};

// TODO Remove if not needed for content editor anymore.
if(!window['common'].View)
    window['common'].View = {

        cssClass2ViewData: {},

        create : function(s, p)
        {
            var t = this, sp, ns, cn, scn, c, de = 0;

            // Parse : <prefix> <class>:<super class>
            var s2 = s;
            s = /^((static) )?([\w.]+)(:([\w.]+))?/.exec(s);
            cn = s[3].match(/(^|\.)(\w+)$/i)[2]; // Class name

            // Create namespace for new class
            var nsName = s[3].replace(/\.\w+$/, '');

            ns = nsName == s[3] ? window : t.createNamespace(nsName);

            p._ns = function()
            {
                return s[3];
            };

            p._cssNs = function()
            {
                var topNS = s[3].split('.')[0];

                return '.' + /*(topNS != 'common' && topNS != 'module' ? 'page-' : '') +*/ s[3].split('.').join('-');
            };

            // Class already exists
            if (ns[cn])
                return;

            // Make pure static class
            if (s[2] == 'static') {
                ns[cn] = p;

                if(p.init)
                    p.init();

                if(p.onDOMLoad)
                    $($.proxy(p.onDOMLoad, p));

                return;
            }

            // Create default constructor
            var ctor = function(arg1)
            {
                if(arg1 instanceof jQuery)
                {
                    this.element = arg1;

                    var instances = arg1.data('instances') || {};

                    instances[s2] = this;

                    arg1.data({
                        instance: this,
                        instances: instances
                    })
                }

                $($.proxy(this.onDOMLoad, this));
            };

            if (!p[cn]) {
                p[cn] = ctor;
                de = 1;
            }
            else
            {
                var originalCtor = p[cn];

                p[cn] = function() {
                    this.parent = ctor;
                    return originalCtor.apply(this, arguments);
                };
            }

            // Add constructor and methods
            ns[cn] = p[cn];
            t.extend(ns[cn].prototype, p);

            // Extend
            if (s[5]) {
                sp = t.resolve(s[5]).prototype;

                scn = s[5].match(/\.(\w+)$/i);

                scn = scn ? scn[1] : s[5]; // Class name

                // Extend constructor
                c = ns[cn];

                if (de) {
                    // Add passthrough constructor
                    ns[cn] = function() {
                        return sp[scn].apply(this, arguments);
                    };
                } else {
                    // Add inherit constructor
                    ns[cn] = function() {
                        this.parent = sp[scn];
                        return c.apply(this, arguments);
                    };
                }
                ns[cn].prototype[cn] = ns[cn];

                // Add super methods
                t.each(sp, function(f, n) {
                    ns[cn].prototype[n] = sp[n];
                });

                // Add overridden methods
                t.each(p, function(f, n) {
                    // Extend methods if needed
                    if (sp[n]) {
                        ns[cn].prototype[n] = function() {
                            this.parent = sp[n];
                            return f.apply(this, arguments);
                        };
                    } else {
                        if (n != cn)
                            ns[cn].prototype[n] = f;
                    }
                });
            }

            ns[cn]._ns = function(){ return s[3]; };
            ns[cn]._cssNs = p._cssNs;

            // Add static methods
            t.each(p['static'], function(f, n) {
                ns[cn][n] = f;
            });

            // Init get instance?
            if(!ns[cn].getInstance)
                ns[cn].getInstance = function(that)
                {
                    return that.element.parents(ns[cn]._cssNs()).eq(0).data('instance');
                };

            if(p['static'] && p['static'].onDOMLoad)
                $($.proxy(p['static'].onDOMLoad, ns[cn]));

            // Store ctor.
            this.cssClass2ViewData[p._cssNs()] = {
                jsNamespace: s2,
                jsClass: ns[cn]
            };

            // Init divs on DOM ready.
            $($.proxy(function()
            {
                $(p._cssNs()).each(function()
                {
                    new ns[cn]($(this));
                });
            }, this));
        },

        reinit()
        {
            // Wait for DOM - just to be sure.
            $(() =>
            {
                // Loop classes.
                _.each(this.cssClass2ViewData, (viewData, cssClass) =>
                {
                    // Loop elements.
                    $(cssClass).each((i, element) =>
                    {
                        // Get instances.
                        let instances = $(element).data('instances');

                        // Init due to not already initialized?
                        if(!instances || !instances[viewData.jsNamespace])
                            new viewData.jsClass($(element));
                    });
                });
            });
        },

        createNamespace : function(n) {
            var i, v;

            var o = window;

            n = n.split('.');

            for (i=0; i<n.length; i++)
            {
                v = n[i];

                if (!o[v])
                    o[v] = {};

                o = o[v];
            }

            return o;
        },

        extend : function(o, e) {
            var i, a = arguments;

            for (i=1; i<a.length; i++) {
                e = a[i];

                common.View.each(e, function(v, n) {
                    if (typeof(v) !== 'undefined')
                        o[n] = v;
                });
            }

            return o;
        },

        resolve : function(n, o) {
            var i, l;

            o = o || window;

            n = n.split('.');
            for (i=0, l = n.length; i<l; i++) {
                o = o[n[i]];

                if (!o)
                    break;
            }

            return o;
        },

        each : function(o, cb, s) {
            var n, l;

            if (!o)
                return 0;

            s = s || o;

            if (typeof(o.length) != 'undefined') {
                // Indexed arrays, needed for Safari
                for (n=0, l = o.length; n<l; n++) {
                    if (cb.call(s, o[n], n, o) === false)
                        return 0;
                }
            } else {
                // Hashtables
                for (n in o) {
                    if (o.hasOwnProperty(n)) {
                        if (cb.call(s, o[n], n, o) === false)
                            return 0;
                    }
                }
            }

            return 1;
        }
    };
