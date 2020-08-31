import React, { Component } from 'react';
import  axios  from 'axios';
import { baseUrl } from '../../baseUrl';

import SuccessAlert from '../alert/SuccessAlert';
import ErrorAlert from '../alert/ErrorAlert';



export default class Add extends Component {

    constructor(props) {
        super(props);

        this.state = {
            car_name: '',
            alert_message: '',
        }

        this.onChangeCarName = this.onChangeCarName.bind(this);
        this.onSubmit = this.onSubmit.bind(this);
    }

    onChangeCarName(e) {
        this.setState({
            car_name: e.target.value
        });
    }

    onSubmit(e) {
        e.preventDefault();

        const car = {
            car_name: this.state.car_name
        }

        axios.post(baseUrl+'car/store', car)
            .then(response => {

                this.setState({
                    car_name: '',
                    alert_message: 'success'

                });
            })
            .catch(error => {

                this.setState({
                    alert_message: 'error'
                });
            });
    }

    render() {
        return(
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card">
                            <div className="card-header"> Car Add Component </div>

                            {this.state.alert_message === 'success' ? <SuccessAlert message={"record inserted successfully "} /> : null}
                            {this.state.alert_message === 'error' ? <ErrorAlert message={"error occurred while inserting"} /> : null}

                            <br/>
                            <form onSubmit={ this.onSubmit }>
                                <div className="form-group">

                                    <input
                                        type="text"
                                        className="form-control"
                                        id="car_name"
                                        placeholder="Enter car name"

                                        value={ this.state.car_name }
                                        onChange={ this.onChangeCarName }

                                        required

                                    />

                                </div>
                                <button type="submit" className="btn btn-primary">Submit</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}