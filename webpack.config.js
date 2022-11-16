const path = require('path');

const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const { VueLoaderPlugin } = require('vue-loader')

const webpack = require('webpack');

const TerserPlugin = require("terser-webpack-plugin");
const BundleAnalyzerPlugin = require('webpack-bundle-analyzer').BundleAnalyzerPlugin;

const THEME_NAME = 'arcsecdev';

const appPath = path.join(__dirname, `wp-content/themes/${THEME_NAME}`);

const pPath = path.join(`wp-content/themes/${THEME_NAME}`, '/assets/js/');

const jsPath = path.join(appPath, '/assets/js/index.js');

const outPath = path.join(appPath, '/assets/js/');



const rules = [
    {
        test: /\.vue$/,
        loader: "vue-loader"
    },
    {
        test: /\.m?js$/,
        exclude: /node_modules/,
        use: {
            loader: 'babel-loader',
            options: {
                presets: [
                    ['@babel/preset-env', { targets: "defaults" }]
                ]
            }
        }
    },

    {
        test: /\.s[ac]ss$/i,
        use: [
            // Creates `style` nodes from JS strings
            //"style-loader",
            // Translates CSS into CommonJS

            {
                loader: MiniCssExtractPlugin.loader,
                options: {
                    publicPath: '',
                },
            },
            "css-loader",
            // Compiles Sass to CSS
            "sass-loader",
        ],
    },


    {
        test: /\.(png|svg|jpg|jpeg|gif)$/i,
        type: 'asset/resource',
        generator: {
            filename: 'assets/images/[name][ext]?v=[hash]',
        },
    },
    {
        test: /\.(woff(2)?|ttf|eot)(\?v=\d+\.\d+\.\d+)?$/,
        type: 'asset/resource',
        generator: {
            filename: 'assets/fonts/[name][ext]',
        },

    },
];

const plugins = [
    //new BundleAnalyzerPlugin(),//Analyze sizes scripts

    new MiniCssExtractPlugin({
        filename: '../../main.css',
    }),
    new VueLoaderPlugin(),

    new webpack.ProvidePlugin({
        $: 'jquery',
        jQuery: 'jquery',
        'window.jQuery': 'jquery',
    }),
];

module.exports = {
    mode: 'development',
    context: appPath,
    entry: ['babel-polyfill', jsPath],
    devtool: 'inline-source-map',
    resolve: {
        modules: [path.resolve(__dirname), 'node_modules'],
        alias: {
            vue: 'vue/dist/vue.js'
        },
    },
    output: {
        path: outPath,
        publicPath: '/',
        filename: 'build.js',
    },
    module: {
        rules,
    },
    optimization: {
        minimize: true,
        minimizer: [new TerserPlugin({
            minify: TerserPlugin.swcMinify,
            terserOptions: {
                compress: true,
                mangle: true,
            },
            extractComments: false
        })],
    },
    plugins,
    watch: true,
    // externals: {
    //   jquery: 'jQuery',
    // },
};
