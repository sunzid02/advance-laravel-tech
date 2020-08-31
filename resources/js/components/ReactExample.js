import React from 'react';
import ReactDOM from 'react-dom';

function ReactExample() {
    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header"> React ReactExample Component </div>

                        <div className="card-body"> I'm an React ReactExample Component! </div>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default ReactExample;

if (document.getElementById('app-two')) {
    ReactDOM.render(<ReactExample />, document.getElementById('app-two'));
}
