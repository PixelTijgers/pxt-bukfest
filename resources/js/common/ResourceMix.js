const _ = require('lodash');
const fs = require('fs');
const glob = require('glob');

// TODO To document.
module.exports =
{
    mix: null,

    init: function(mix)
    {
        // Set
        this.mix = mix;

        //
        return this;
    },

    nodeModuleDists: function(files)
    {
        // Loop files.
        _.each(files, function(file) {
            this._processFile(file);
        }.bind(this));

        //
        return this;
    },

    _processFile: function(file)
    {
        // Stat due to not having wildcard?
        if (file.indexOf('*') === -1)
            this._processSingleFile(file);

        else
            this._processMultipleFiles(file);
    },

    _processSingleFile: function(file)
    {
        try
        {
            // Stat file.
            fs.statSync('node_modules/' + file);
        }
        catch(e)
        {
            // Error due to file not found.
            this._onMissingFile('copy', 'node_modules/' + file);

            return;
        }

        // Copy file.
        this._copyFile(file);
    },

    _processMultipleFiles: function(file)
    {
        // Copy due to there is an file?
        if(glob.sync('node_modules/' + file).length > 0)
            this._copyFile(file);

        // Error?
        else
            this._onMissingFile('copy', 'node_modules/' + file);
    },

    _onMissingFile: function(type, file)
    {
        // Notify user.
        console.error('File ' + file + ' does not exists for call to ' + type + '()!');

        // Exit
        process.exit(1);
    },

    _copyFile: function(file)
    {
        // Copy (dist) from node_modules to public.
        this.mix.copy('node_modules/' + file, 'public/plugins/' + file);
    },

    version: function(files)
    {
        // Loop files.
        _.each(files, function(file) {
            this._versionFile(file);
        }.bind(this));

        //
        return this;
    },

    _versionFile: function(file)
    {
        // Prepend with file.
        file = 'public/' + file;

        //
        try
        {
            // Stat file.
            fs.statSync(file);
        }
        catch(e)
        {
            // Error due to file not found.
            this._onMissingFile('version', file);

            return;
        }

        // Version file.
        this.mix.version(file);
    }

};
