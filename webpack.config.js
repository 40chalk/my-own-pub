const defaultConfig = require('@wordpress/scripts/config/webpack.config');
const path = require("path");

module.exports = [
    {
    ...defaultConfig,
    entry: {
        'test-one': './includes/blocks/test-one/src',
    },
},
    {
        entry: "./includes/admin/pages/main/src/",
        output: {
            filename: "my-own-pub.js",
            path: path.resolve(__dirname, "build"),
        },
        resolve: {
            modules: [__dirname, "src", "node_modules"],
            extensions: ["*", ".js", ".jsx", ".tsx", ".ts"],
        },
        module: {
            rules: [
                {
                    test: /\.jsx?$/,
                    exclude: /node_modules/,
                    loader: require.resolve("babel-loader"),
                },
                {
                    test: /\.css$/,
                    use: ["style-loader", "css-loader"],
                },
                {
                    test: /\.png|svg|jpg|gif$/,
                    use: ["file-loader"],
                },
            ],
        },
    }
];