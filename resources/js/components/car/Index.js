import React, { Component } from  'react';
import ReactDOM from 'react-dom';

import {
    BrowserRouter as Router,
    Route,
    Link
} from "react-router-dom";

import Listing from './Listing';
import Add from "./Add";

export default class Index extends Component {

    render() {
        return(
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header"> Car Index Component </div>
                            <Link to="/cars" className="btn btn-primary"> Listing </Link>&nbsp;
                            <Link to="/car/add" className="btn btn-primary"> Add </Link>&nbsp;

                            <Route exact path="/cars" component={ Listing } />
                            <Route exact path="/car/add" component={ Add } />

                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

if (document.getElementById('app-car')) {
    ReactDOM.render(<Router><Index /></Router>, document.getElementById('app-car'));
}
