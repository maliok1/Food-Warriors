import React from 'react';
import ReactDOM from 'react-dom';
import UserComponent from './UserComponent';
import axios from 'axios';


function App() {
    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                       <UserComponent />
                    </div>
                </div>
            </div>
        </div>
    );
}

export default App;

if (document.getElementById('root')) {
    ReactDOM.render(<App />, document.getElementById('root'));
}
