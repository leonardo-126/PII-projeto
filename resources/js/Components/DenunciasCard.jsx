import "../../sass/components/denunciasCard.scss"

export default function DenunciasCard({nome, endereco, text, type}) {
    return (
        <section className="denunciasCard">
            <h1>{nome}</h1>
            <span>{type}</span>
            <div className="denunciasCard-text">
                <p>{text}</p>
                <p>{endereco}</p>
            </div>
        </section>
    )
}