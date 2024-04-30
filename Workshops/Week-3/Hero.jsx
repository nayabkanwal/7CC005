import React from 'react';

function Hero({ hero }) {
    return (
        <div>
            <h2>{hero.name} Details</h2>
            <div><label>id: </label>{hero.id}</div>
            <div>
                <label>name: </label>
                <input type="text" value={hero.name} />
            </div>
        </div>
    );
}

export default Hero;
