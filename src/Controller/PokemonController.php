<?php

namespace App\Controller;

use App\Repository\PokemonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PokemonController extends AbstractController
{
    #[Route('/pokemon', name: 'pokemon_pokedex')]
    public function pokedex(PokemonRepository $pokemonRepository): Response
    {
        $pokemons = $pokemonRepository->findPokemons();

        dump($pokemons);

        return $this->render('pokemon/pokedex.html.twig', [
            'pokemons' => $pokemons
        ]);
    }
    #[Route('/pokemon/detail/{id}', name: 'pokemon_detail')]
    public function detail(int $id, PokemonRepository $pokemonRepository): Response
    {
        $pokemon = $pokemonRepository->find($id);

        return  $this->render('pokemon/detail.html.twig', [
            'pokemon' => $pokemon
        ]);
    }
}
