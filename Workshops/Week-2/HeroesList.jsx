import React, { useState } from 'react';

function HeroesList({ onSelectHero }) {
    const [heroes, setHeroes] = useState([
        { id: 1, name: 'Windstorm' },
        { id: 2, name: 'Bombasto' },
        { id: 3, name: 'Magneta' },
        { id: 4, name: 'Tornado' }
    ]);

    return (
        <div>
            <h2>My Heroes</h2>
            <ul>
                {heroes.map(hero => (
                    <li key={hero.id} onClick={() => onSelectHero(hero)}>
                        {hero.name}
                    </li>
                ))}
            </ul>
        </div>
    );
}

export default HeroesList;
