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
                        <p>Hi, I am a Junior Full-stack Web Developer who greatly enjoys solving puzzles and building things. I stay curious and constatntly explore new technologies and ways to better my code. </p>
                    </Col> 
                    <Col xs={12} sm={4} className="person-wrapper">
                        <Image src="images/Bakhodir.jpg"  className="profile-pic" />
                        <h3>Bakhodir</h3>
                        <p>I am a Junior Full-stack Web Developer with  a passion for writing code. I actively seek out new technologies and stay up-to-date on industry trends and advancements.</p>
                    </Col> 
                    <Col xs={12} sm={4} className="person-wrapper">
                        <Image src="images/Michaela.jpg"  className="profile-pic" />
                        <h3>Michaela</h3>
                        <p>Hello, I am Michaela a Junior Full-stack Web Developer, mostly insterested in UX, Front-end development, and testing. I love dogs and avocados.  </p>
                    </Col> 
                    </Row>
            </Container>
            
        );
    }
    
}
if (document.getElementById('about')) {
    ReactDOM.render(<About />, document.getElementById('about'));
}