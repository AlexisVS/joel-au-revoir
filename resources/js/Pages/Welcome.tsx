import { Link, Head } from '@inertiajs/react';
import { PageProps } from '@/types';
import { GoodbyeCard } from '../types/goodbyeCard'
import { FormEvent, SyntheticEvent, useState } from 'react'
import { router } from '@inertiajs/react'
import { useForm } from '@inertiajs/react'


export default function Welcome({ goodbyeCards }: PageProps<{ goodbyeCards: Array<GoodbyeCard> }>) {


    const { data, setData, post, processing, errors } = useForm({
        author_name: "",
        author_email: "",
        message: "",
        card_color: null,
        has_asset: false,
        asset_type: "",
        asset_file: null
    });
    
    function handleSubmit(e: SyntheticEvent) {
        e.preventDefault()
        post('/goodbye-cards')
    }

    function formulaire() {

        return (
            <form onSubmit={handleSubmit}>
                <label htmlFor="author_name">Nom:</label>
                <input required id="author_name" value={data.author_name} onChange={e => setData('author_name', e.target.value)} />
                <label htmlFor="author_email">Email:</label>
                <input id="author_email" value={data.author_email} onChange={e => setData('author_email', e.target.value)} />
                <label htmlFor="message">Message:</label>
                <textarea required id="message" value={data.message} onChange={e => setData('message', e.target.value)} />
                <button type="submit" disabled={processing}>Envoyer</button>
            </form>
        )
    }

    const setImage = (card: GoodbyeCard) => {
        const getImageUrl = (path: string) => {
            return new URL(path, window.location.origin).toString();
        };

        let image = null;

        if (card.has_asset && card.asset_type === 'image') {
            image = <img src={getImageUrl(`${card.asset_path}`)} alt="Goodbye Card Image" style={{ maxWidth: '100%' }} />
        }

        return image
    }

    return (
        <>
            <h1>Goodbye Cards</h1>

            {formulaire()}

            <ul>
                {goodbyeCards.sort((a,b) => b.id - a.id).map((card) => (
                    <li key={card.id} style={{ backgroundColor: card.card_color ? card.card_color : '', padding: '10px', margin: '10px 0', borderRadius: '5px' }}>
                        <p>ID: {card.id}</p>
                        {setImage(card)}
                        <p>Message: {card.message}</p>
                        <p>Author: {card.author_name} ({card.author_email})</p>
                        <p>Created At: {new Date(card.created_at).toLocaleString()}</p>
                        <p>Updated At: {new Date(card.updated_at).toLocaleString()}</p>
                    </li>
                ))}
            </ul>
        </>
    );
}
