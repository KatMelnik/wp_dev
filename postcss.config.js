module.exports = {
    plugins: [
        require('postcss-smart-import')(),
        require('autoprefixer')({remove: false}),
        require('cssnano')({
            preset: 'default',
        }),
    ]
};
