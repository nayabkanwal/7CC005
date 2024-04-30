// src/HeroesList.js
import React, { useEffect, useState } from 'react';
import { fetchHeroes } from './heroService';

function HeroesList() {
    const [heroes, setHeroes] = useState([]);

    useEffect(() => {
        const getHeroes = async () => {
            try {
                const heroesData = await fetchHeroes();
                setHeroes(heroesData);
            } catch (error) {
                console.error('Failed to fetch heroes:', error);
            }
        };

        getHeroes();
    }, []);

    return (
        <ul>
            {heroes.map(hero => <li key={hero.id}>{hero.name}</li>)}
        </ul>
    );
}

export default HeroesList;
