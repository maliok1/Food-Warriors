import React from 'react';
import ReactDOM from 'react-dom';
import './footer.css'
import {BrowserRouter as Router, Route, Switch}  from 'react-router-dom';
import About from './footer/About';
import News from './footer/News';
import Contact from './footer/Contact';
import Navbar from './footer/CustomNavbar';



export default class Footer extends React.Component {
    constructor(props) {
        super(props);
    }
    
    render(){
      return (
        <>
        <div className="footer-social-icons">
             <ul className="route">
            <Router>
                <Switch>
                    <Navbar />
                    <Route path="/about" exact component={About} />
                    <Route path="/contact" exact component={Contact} />
                    <Route path="/news"  component={News} />
                </Switch>
            </Router>
        </ul>
        <ul className="social-icons">
            <li><a href="" className="social-icon"> <i className="fa fa-facebook"></i></a></li>
            <li><a href="" className="social-icon"> <i className="fa fa-twitter"></i></a></li>
            <li><a href="" className="social-icon"> <i className="fa fa-linkedin"></i></a></li>
            <li><a href="" className="social-icon"> <i className="fa fa-github"></i></a></li>
        </ul>
    </div>
     <div className="footer-copyright text-center">© 2020 Copyright: 
     <a href="/"> Food Warriors</a>
   </div>
   </>  
    ) 
    }
    
}


if (document.getElementById('footer')) {
    ReactDOM.render(<Footer />, document.getElementById('footer'));
}
