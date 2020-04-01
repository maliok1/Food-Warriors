import React, { Component } from "react";
import axios , { post, get } from "axios";

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
            <div className="userInfo ">
                <div className='container'>
                    <form className='row form__group field'>
                        <div className="profile-image-holder col-md-6">
                            <img src={this.state.image} />
                            <label className='label-img'>
                                Click to select your profile image...
                                <input
                                    className="image-upload"
                                    type="file"
                                    name="image_file"
                                    onChange={e => {
                                        this.setState({ file: e.target.files[0] });
                                    }}
                                /> 
                            </label> 
                        </div>
                        <div className="profile-info col-md-6">
                            <h4>Name</h4>
                            <input
                                
                                className="form__field"
                                type="text"
                                label="username"
                                value={this.state.name}
                                name="name"
                                onChange={e => {
                                    this.setState({ name: e.target.value });
                                }}
                            />
                            <h4>Email</h4>
                            <input
                                className="form__field"
                                type="email"
                                label="email"
                                value={this.state.email}
                                name="email"
                                onChange={e => {
                                    this.setState({ email: e.target.value });
                                }}
                            />

                            <h4>Phone number</h4>
                            <input 
                                className="form__field"
                                type="text"
                                label="phonenumber"
                                value={this.state.phonenumber}
                                name="phonenumber"
                                onChange={e => {
                                    this.setState({ phonenumber: e.target.value });
                                }}
                            />
                            <br/>
                            
                        </div>
                    </form> 

                    <div className="row buttons">

                        <button onClick={this.handleFormSubmit}  className="btn btn-update col-md-6 col-lg-3 ">Update</button>
                        
                        <button onClick={this.handleDelete} className="btn btn-danger col-md-6 col-lg-3">
                            Delete my account
                        </button>
                    </div>
                    
                </div>
            </div>
        );
    }
}
