import React from "react";
import ReactDOM from "react-dom";
import { BrowserRouter, Link, Route } from "react-router-dom";
import UserComponent from "./UserComponent";
import axios from "axios";

const DeletedMessage = () => {
    return (
        <div className="deleted-account">
            <div className="container sad-face">
                <div className="tear"></div>
                <div className="tear2"></div>
                <div className="face">
                    <div className="eyebrow">︶</div>
                    <div className="eyebrow">︶</div>
                    <div className="eye"></div>
                    <div className="eye"></div>
                    <div className="mouth"></div>
                </div>
            </div>
            <p>You have successfully deleted your profile</p>
            <p className="sad-p">We are sorry to see you go</p>
            <a href="/restaurant-registration" className="btn-to-registration">
                Register back to fight the food waste
            </a>
        </div>
    );
};

export default class App extends React.Component {
    render() {
        return (
            <BrowserRouter>
                <div className="container"></div>
                <Route path="/users/:username" component={UserComponent} />
                <Route exact path="/deleted" component={DeletedMessage} />
            </BrowserRouter>
        );
    }
}

if (document.getElementById("root")) {
    ReactDOM.render(<App />, document.getElementById("root"));
}
