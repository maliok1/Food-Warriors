import React, { Component } from 'react';
import { Navbar, Nav } from 'react-bootstrap';
import { Link } from 'react-router-dom';


export default class CustomNavbar extends Component {
    render() {
        return (

           <Navbar>
                    
                <Nav.Item><Nav.Link href="/about">About us</Nav.Link></Nav.Item>
                <Nav.Item><Nav.Link href="/contact">Contact</Nav.Link></Nav.Item>
                <Nav.Item><Nav.Link href="/news">News</Nav.Link></Nav.Item>
                    
           </Navbar>
        )
    }
}