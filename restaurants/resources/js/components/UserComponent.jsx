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
      const resp = await axios.get('/user')
      // axios.get('/users').then(function(response) {
      //   console.log('response' , response);
      // })
      console.log("test")
      console.log("axios response", resp)
    }
    render(){
      console.log("hello")
      return(
        <h1>hello world</h1>
      )
    }
}