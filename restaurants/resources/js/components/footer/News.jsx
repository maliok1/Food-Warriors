import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import './News.css';
import { Container, Row, Col } from 'react-bootstrap';


export default class News extends Component {
    render() {
        return (
        
          <>
<div className="container">
  <div className="row">
    <div className="col-12 col-md-6 col-xl-4">
      <a className="d-flex flex-column align-items-end justify-content-between p-3 block-news box1" href="">
        <button className="btn btn-more">Read more</button>
        <div className="description">Pizza Menu You Don't Expect To See In Your Area.</div>
      </a>
    </div>
    <div className="col-12 col-md-6 col-xl-8">
      <a className="d-flex flex-column align-items-end justify-content-between p-3 block-news box2" href="">
        <button className="btn btn-more">Read more</button>
        <div className="description">Not Sure Where To Eat? Here Is The 10 Best Restaurants In Prague.</div>
      </a>
    </div>
    <div className="col-12 col-xl-4">
      <a className="d-flex flex-column align-items-end justify-content-between p-3 block-news box3" href="">
        <button className="btn btn-more">Read more</button>
        <div className="description">Tapas Bar Opened This Week, First 100 Clients Get 25% discount.</div>
      </a>
    </div>
    <div className="col-12 col-md-6 col-xl-4">
      <a className="d-flex flex-column align-items-end justify-content-between p-3 block-news box4" href="">
        <button className="btn btn-more">Read more</button>
        <div className="description">74 Cheap And Easy Dinner Recipes So You Never Have To Cook A Boring Meal Again.</div>
      </a>
    </div>
    <div className="col-12 col-md-6 col-xl-4">
      <a className="d-flex flex-column align-items-end justify-content-between p-3 block-news box5" href="">
        <button className="btn btn-more">Read more</button>
        <div className="description">Explore Our Baking Courses To Find The Right Recipe and Share Your Kitchen Creations with Loved Ones.
</div>
      </a>
    </div>
  </div>
</div>
          </>
            
               
            );
    }
}
if (document.getElementById('news')) {
    ReactDOM.render(<News />, document.getElementById('news'));
}

