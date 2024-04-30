import React, { useState } from 'react';
import Hero from './Hero';
import HeroesList from './HeroesList';

function App() {
    const [selectedHero, setSelectedHero] = useState(null);

    return (
        <div className="App">
            {selectedHero && <Hero hero={selectedHero} />}
            <HeroesList onSelectHero={setSelectedHero} />
        </div>
    );
}

export default App;
