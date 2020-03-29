import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import './News.css';
import { Container, Row, Col } from 'react-bootstrap';


export default class News extends Component {
    render() {
        return (
        
          <>
          Some news comes here . . .
          </>
            
               
            );
    }
}
if (document.getElementById('news')) {
    ReactDOM.render(<News />, document.getElementById('news'));
}

