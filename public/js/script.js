class Pokemons {

    constructor() {
        this.endpoint = 'https://pokeapi.co/api/v2/';
        this.pokemons = [];
    }

    init(){
        this.fetch();

    }

    async fetch(){
        let response = await fetch(this.endpoint+'pokemon?limit=5');
        if (!response.ok) {
            throw new Error("HTTP error " + response.status);
        }
        response = await response.json()
        if(response.results){
            for(const result of response.results){
                let resp = await fetch(result.url);
                if(resp.ok){
                    pokemon = await resp.json();
                    this.pokemons.push(pokemon)
                }
            }
        }
        this.display();
    }

    display(){
        const root = document.getElementById('pokemons');
        for(const pokemon of this.pokemons){
            const div = document.createElement('div');
            // div.classname = 'pokemon';
            const image = document.createElement('img');
            image.setAttribute("src", pokemon.sprites.front_default)
            div.appendChild(image)
            root.appendChild(div);
        }
    }
}

pokemon = new Pokemons();
pokemon.init();
