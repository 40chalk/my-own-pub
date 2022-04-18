import React from "react"
import ReactDom from "react-dom"
import App from "./App";
import {WorksContextProvider} from "./store/works-context";

ReactDom.render(<WorksContextProvider><App/></WorksContextProvider>, document.querySelector("#my-own-pub"))