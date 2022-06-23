// TODO To document.
export default new class AutoloadViews
{
    load(prefix, files)
    {
        // Loop files.
        files.keys().forEach(fileName =>
        {
            // Include JS?
            if(fileName.split('.').pop() == 'js')
                files(fileName);

            // Should be Vue?
            else
                this.initVue(prefix, fileName, files(fileName));
        });
    }

    initVue(prefix, fileName, fileExport)
    {
        // Build tag by our convention.Vue.component(tag, fileExport.default);
        var formattedPrefix = prefix ? (prefix.split('.').join('-') + '-') : '';
        var formattedFilename = fileName.substr(2).split('.vue')[0].split('/').join('-');

        var tag = (formattedPrefix + /*'components-' +*/ formattedFilename).toLowerCase();

		// Enable to see all registered tags.
		//console.info(tag);

        // Register Vue component.
        Vue.component(tag, fileExport.default);
    }
};
