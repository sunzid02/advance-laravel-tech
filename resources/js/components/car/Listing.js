import React, { Component } from 'react';
import  axios  from 'axios';
import { baseUrl } from '../../baseUrl';
import {Link, Route} from 'react-router-dom';
import Pagination from "react-js-pagination";

export default class Listing extends Component {
    constructor(props) {

        super(props);

        this.state = {
            cars: [],
            activePage: 1,
            itemsCountPerPage: 1,
            totalItemsCount: 1,
            pageRangeDisplayed: 4,
            alert_message: '',
        };
    }

    componentDidMount() {
        axios.get(baseUrl + 'cars')
            .then( response => {
                this.setState({
                    cars: response.data.data,
                    activePage: response.data.current_page,
                    itemsCountPerPage: response.data.per_page,
                    totalItemsCount: response.data.total,
                    pageRangeDisplayed: 4,
                    alert_message: '',
                })
            });
    }

    handlePageChange(pageNumber) {

        axios.get(baseUrl + 'cars?page='+pageNumber)
            .then(response => {

                this.setState({
                    cars: response.data.data,
                    activePage: response.data.current_page,
                    itemsCountPerPage: response.data.per_page,
                    totalItemsCount: response.data.total,
                    pageRangeDisplayed: 3,
                });
            });
    }


    render() {

        return(
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-12">

                        <div className="card-header"> Car Listing Component </div>
                        <table className="table">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Car Name</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            {
                                this.state.cars.map(car => {
                                    return (
                                        <tr key={car.id}>
                                            <th scope="row"> {car.id} </th>
                                            <td>{car.name}</td>
                                            <td>
                                                <p>Action a</p>
                                            </td>
                                        </tr>
                                    )
                                })
                            }
                            </tbody>
                        </table>

                        {/* pagination */}
                        <div className="d-flex justify-content-center">
                            <Pagination
                                activePage={this.state.activePage}
                                itemsCountPerPage={this.state.itemsCountPerPage}
                                totalItemsCount={this.state.totalItemsCount}
                                pageRangeDisplayed={this.state.pageRangeDisplayed}
                                onChange={this.handlePageChange.bind(this)}
                                itemClass='page-item'
                                linkClass='page-link'
                            />
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}