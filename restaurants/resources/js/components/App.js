import React from 'react';
import ReactDOM from 'react-dom';
import {BrowserRouter, Link, Route}  from 'react-router-dom';
import UserComponent from './UserComponent';
import axios from 'axios';

const DeletedMessage = () => {
    return(
        <div>
            You have successfully deleted your profile
        </div>
    )
}


export default class App extends React.Component {

    
    render(){
      return (
          <BrowserRouter>
            <div className="container">
         </div>
          <Route path="/users/:username" component={UserComponent} />
          <Route exact path="/deleted" component={DeletedMessage} /> 
          </BrowserRouter>
      
    );  
    }
    
}


if (document.getElementById('root')) {
    ReactDOM.render(<App />, document.getElementById('root'));
}
