import React from 'react';
import ReactDOM from 'react-dom';
import {BrowserRouter, Link, Route}  from 'react-router-dom';
import UserComponent from './UserComponent';
import axios from 'axios';

const Homepage = () => {
    return(
        <div>
            homepage
        </div>
    )
}

export default class App extends React.Component {

    
    render(){
      return (
          <BrowserRouter>
            <div className="container">

</div>
          <Route exact path="/" component={Homepage} />
          <Route path="/users/:username" component={UserComponent} />      
          </BrowserRouter>
      
    );  
    }
    
}


if (document.getElementById('root')) {
    ReactDOM.render(<App />, document.getElementById('root'));
}
