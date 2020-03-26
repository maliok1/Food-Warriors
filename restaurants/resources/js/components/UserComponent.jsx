import React, { Component } from "react";
import axios from "axios";

export default class UserComponent extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            name: this.props.match.params.username,
            email: "",
            password: ""
        };
       this.handleFormSubmit = this.handleFormSubmit.bind(this);
       console.log('state.name', this.state.name)
    }

    async componentDidMount() {
        const { username } = this.props.match.params;
        const resp = await axios
            .get(`http://www.food-warriors.test/api/users/${username}`)
            .then(response => {
                this.setState({
                    name: response.data.name,
                    email: response.data.email
                })
                // ,console.log("axios response", response);
            });
    }

     handleFormSubmit(e){
      e.preventDefault();
      fetch(`http://www.food-warriors.test/api/users/${username}`, {
        method: 'POST',
        headers: {
            'Content-type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            name: this.state.name,
            email:this.state.email
        })
    }).then(response => response.json())
        .then(data => {
            
        })
};
    

    render() {
        console.log(this.props.match.params);
        console.log(this.state.name);
        console.log(this.state.email);
        
        return (
            <div className="userInfo">
                <form onSubmit={this.handleFormSubmit}>
                    <h3>Name</h3>
                    <input
                        type="text"
                        label="username"
                        value={this.state.name}
                        id="username"
                        onChange={e => {
                            this.setState({ name: e.target.value });
                        }}
                    />
                    <h3>Email</h3>
                    <input
                        type="email"
                        label="email"
                        value={this.state.email}
                        id="email"
                        onChange={e => {
                            this.setState({ email: e.target.value });
                        }}
                    />
                    {/* <h3>Image</h3>
                            <input type="textarea" label="Image" placeholder="Enter a URL to an image(optional)" id="image"/> */}
                       <button className="btn btn-success">Update</button>
                </form>
            </div>
        );
    }
}
