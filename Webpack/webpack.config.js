const webpack = require("webpack");
const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const devMode = process.env.NODE_ENV != "production";
const UglifyJSPlugin = require("uglifyjs-webpack-plugin");
const OptimizeCSSAssets = require("css-minimizer-webpack-plugin");
const DashboardPlugin = require("webpack-dashboard/plugin");


let config = {
    mode: "development",
    entry: {
        polyfill: "babel-polyfill",
        app: "./src/index.js"
    },
    output: {
        path: path.resolve(__dirname, "./public"),
        filename: "./[name].bundle.js"
    },
    module: {
        rules: [{
            test: /\.js$/,
            exclude: /node_modules/,
            use: {
                loader: "babel-loader",
                options: {
                    presets: ["@babel/preset-env"]
                }
            }
        },
        {
            test: /\.(sa|sc|c)ss$/,
            use: [
                devMode ? "style-loader" : MiniCssExtractPlugin.loader,
                "css-loader",
                "postcss-loader",
                "sass-loader",
            ],
        }]
    },
    plugins: [
        new MiniCssExtractPlugin({
            filename: "styles.css"
        }),
        new DashboardPlugin()
    ],
    devServer: {
        static: {
            directory: path.join(__dirname, './public'),
        },
        historyApiFallback: true,
        open: true,
        hot: true
    },
    devtool: "eval-source-map",
    optimization: {
        minimize: !devMode,
        minimizer: [
            new UglifyJSPlugin({
                test: /\.js(\?.*)?$/i,
            }),
            new OptimizeCSSAssets({
                test: /\.css(\?.*)?$/i,
            })
        ],
    },
}

module.exports = config;
