import React, {Component} from 'react';
import axios from 'axios';

export default class UserComponent extends React.Component{
    constructor(props){
      super(props);
        this.state = {
          name: '',
          email: ''
        }
    }


    async componentDidMount() {
      const {username} = this.props.match.params
      const resp = await axios.get(`http://www.food-warriors.test/api/users/${username}`).then(resp=>{
        this.setState({
          name:resp.data.name,
          email:resp.data.email,
        })
      })
      console.log("test")
      console.log("axios response", resp)
  }

    render(){
      console.log(this.props.match.params)
      console.log("hello")
      return(
        <div>
          <h2>{this.state.name} </h2>
         
          {this.state.email}
          
        </div>
      )
    }
}