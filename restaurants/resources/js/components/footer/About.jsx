import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import './About.css';
import { Link } from 'react-router-dom';
import { Container, Row, Col, Image } from 'react-bootstrap';


export default class About extends Component {
    render() {
        return (
            <Container>
                
                <Row className="show-grid text-center">
                    <Col xs={12} sm={4} className="person-wrapper">
                        <Image src="images/Nastja.jpg" className="profile-pic" />
                        <h3>Anastasia</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At debitis consectetur quis, temporibus tempore nostrum tempora laborum quibusdam perferendis? Et suscipit tempora doloribus officia mollitia molestias, at voluptas praesentium! Esse.</p>
                    </Col> 
                    <Col xs={12} sm={4} className="person-wrapper">
                        <Image src="images/Bakhodir.jpg"  className="profile-pic" />
                        <h3>Bakhodir</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At debitis consectetur quis, temporibus tempore nostrum tempora laborum quibusdam perferendis? Et suscipit tempora doloribus officia mollitia molestias, at voluptas praesentium! Esse.</p>
                    </Col> 
                    <Col xs={12} sm={4} className="person-wrapper">
                        <Image src="images/Michaela.jpg"  className="profile-pic" />
                        <h3>Michaela</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. At debitis consectetur quis, temporibus tempore nostrum tempora laborum quibusdam perferendis? Et suscipit tempora doloribus officia mollitia molestias, at voluptas praesentium! Esse.</p>
                    </Col> 
                    </Row>
            </Container>
            
        );
    }
    
}
if (document.getElementById('about')) {
    ReactDOM.render(<About />, document.getElementById('about'));
}