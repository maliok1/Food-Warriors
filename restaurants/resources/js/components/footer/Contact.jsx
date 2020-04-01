import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import './Contact.css';


export default class Contact extends Component {
    render() {
        return (
            <>
             <div className="container">
            <div className="row">
                <div className="col-md-6.5 " id="form_container">
                    <h2>Contact Us</h2> 
                    <p> Please send your message below. We will get back to you at the earliest! </p>
                    <form role="form" method="post" id="reused_form">
                        <div className="row">
                            <div className="col-sm-12 form-group">
                                <label> Message:</label>
                                <textarea className="form-control" type="textarea" id="message" name="message" rows="10"></textarea>
                            </div>
                        </div>
                        <div className="row">
                            <div className="col-sm-6 form-group">
                                <label> Your Name:</label>
                                <input type="text" className="form-control" id="name" name="name" required/>
                            </div>
                            <div className="col-sm-6 form-group">
                                <label> Email:</label>
                                <input type="email" className="form-control" id="email" name="email" required/>
                            </div>
                        </div>
                        <div className="row">
                            <div className="col-sm-12 form-group">
                                <button type="submit" className="btn btn-lg btn-success pull-right" >Send &rarr;</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
            </>
            );
    }
}
if (document.getElementById('contact')) {
    ReactDOM.render(<Contact />, document.getElementById('contact'));
}