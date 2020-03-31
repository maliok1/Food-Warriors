import React, { Component } from "react";
import axios , { post, get } from "axios";
import  { Redirect } from 'react-router-dom'

export default class UserComponent extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            name: "",
            email: "",
            phonenumber: "",
            image: "",
            file: null
        };
        this.handleFormSubmit = this.handleFormSubmit.bind(this);
        this.handleDelete = this.handleDelete.bind(this);
        // this.logout = this.logout.bind(this);
    }
    
    async componentDidMount() {
        const { username } = this.props.match.params;
        const resp = await axios
            .get(`/api/users/${username}`)
            .then(response => {
                this.setState({
                    name: response.data.name,
                    email: response.data.email,
                    phonenumber: response.data.phonenumber,
                    image: response.data.image
                })
                ,console.log("axios response", response);
            });
    }

    handleFormSubmit(e) {
        e.preventDefault();

        const { username } = this.props.match.params;
        const url = `/api/users/${username}`;

        const data = new FormData();
        data.append('image_file',this.state.file);
        data.append('name', this.state.name);
        data.append('email', this.state.email);
        data.append('phonenumber', this.state.phonenumber);

        fetch(url, {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content")
            },
            body: data
        })
            .then(response => response.json())
            .then(data => {
               this.props.history.replace('/users/'+ data.name),
               this.setState({
                   image: data.image
               });
               console.log(data);
            });
    }

    
    async handleDelete(){
    const { username } = this.props.match.params;
    const resp = await axios
        .post(`/api/users/delete/${username}`)
        .then(
            this.props.history.push('/deleted')
        );
    }

    render() {
        return (
            <div className="userInfo">
                <form onSubmit={this.handleFormSubmit}>
                    <h3>Name</h3>
                    <input
                        type="text"
                        label="username"
                        value= {this.state.name}
                        name="name"
                        onChange={e => {
                            this.setState({ name: e.target.value });
                        }}
                    />
                    <h3>Email</h3>
                    <input
                        type="email"
                        label="email"
                        value={this.state.email}
                        name="email"
                        onChange={e => {
                            this.setState({ email: e.target.value });
                        }}
                    />
                    <h3>Phone number</h3>
                    <input
                        type="text"
                        label="phonenumber"
                        value={this.state.phonenumber}
                        name="phonenumber"
                        onChange={e => {
                            this.setState({ phonenumber: e.target.value });
                        }}
                    />
                    <br/>
                    <img src={this.state.image} />
                    <h3>Change your profile picture: </h3>
                    <input
                     type="file"
                     name="image_file"
                     onChange={e => {
                        this.setState({file: e.target.files[0]});}}
                      /> 
                    <button className="btn btn-success">Update</button>
                </form>
                
                 <button onClick = {this.handleDelete} className="btn btn-danger">Delete my account</button>
            </div>
        );
    }
}
