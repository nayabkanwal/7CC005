// src/App.js
import React from 'react';
import { BrowserRouter as Router, Route, Switch } from 'react-router-dom';
import HeroesList from './HeroesList';
import Hero from './Hero';

function App() {
    return (
        <Router>
            <div>
                <Switch>
                    <Route path="/heroes">
                        <HeroesList />
                    </Route>
                    <Route path="/hero/:id">
                        <Hero />
                    </Route>
                    <Route path="/">
                        <Home />
                    </Route>
                </Switch>
            </div>
        </Router>
    );
}

export default App;
