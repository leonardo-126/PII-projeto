import DenunciasCard from "@/Components/DenunciasCard";
<<<<<<< HEAD
import { useState } from "react"
=======
import { useEffect, useState } from "react"
>>>>>>> teste
import "../../sass/pages/Denuncias.scss"
import { FaSearch } from "react-icons/fa";
const denunciasData = [
    {
      nome: "Maria Silva",
      endereco: "Rua das Flores, 123 - São Paulo, SP",
      text: "Denúncia sobre poluição sonora durante a noite.Denúncia sobre poluição sonora durante a noite.Denúncia sobre poluição sonora durante a noite.Denúncia sobre poluição sonora durante a noite.Denúncia sobre poluição sonora durante a noite.Denúncia sobre poluição sonora durante a noite.Denúncia sobre poluição sonora durante a noite.Denúncia sobre poluição sonora durante a noite.Denúncia sobre poluição sonora durante a noite.Denúncia sobre poluição sonora durante a noite.Denúncia sobre poluição sonora durante a noite.Denúncia sobre poluição sonora durante a noite.Denúncia sobre poluição sonora durante a noite.Denúncia sobre poluição sonora durante a noite.Denúncia sobre poluição sonora durante a noite.Denúncia sobre poluição sonora durante a noite.Denúncia sobre poluição sonora durante a noite.Denúncia sobre poluição sonora durante a noite.Denúncia sobre poluição sonora durante a noite.",
      type: "Poluição Sonora"
    },
    {
      nome: "João Pereira",
      endereco: "Av. Central, 456 - Rio de Janeiro, RJ",
      text: "Denúncia sobre lixo acumulado nas ruas.",
      type: "Lixo Acumulado"
    },
    {
      nome: "Ana Costa",
      endereco: "Rua da Paz, 789 - Belo Horizonte, MG",
      text: "Denúncia sobre veículos abandonados em área residencial.",
      type: "Veículo Abandonado"
    },
    {
        nome: "Maria Silva",
        endereco: "Rua das Flores, 123 - São Paulo, SP",
        text: "Denúncia sobre poluição sonora durante a noite.",
        type: "Poluição Sonora"
      },
      {
        nome: "João Pereira",
        endereco: "Av. Central, 456 - Rio de Janeiro, RJ",
        text: "Denúncia sobre lixo acumulado nas ruas.",
        type: "Lixo Acumulado"
      },
      {
        nome: "Ana Costa",
        endereco: "Rua da Paz, 789 - Belo Horizonte, MG",
        text: "Denúncia sobre veículos abandonados em área residencial.",
        type: "Veículo Abandonado"
      },
      {
        nome: "Maria Silva",
        endereco: "Rua das Flores, 123 - São Paulo, SP",
        text: "Denúncia sobre poluição sonora durante a noite.",
        type: "Poluição Sonora"
      },
      {
        nome: "João Pereira",
        endereco: "Av. Central, 456 - Rio de Janeiro, RJ",
        text: "Denúncia sobre lixo acumulado nas ruas.",
        type: "Lixo Acumulado"
      },
      {
        nome: "Ana Costa",
        endereco: "Rua da Paz, 789 - Belo Horizonte, MG",
        text: "Denúncia sobre veículos abandonados em área residencial.",
        type: "Veículo Abandonado"
      },
  ];
  

export default function Denuncias() {
<<<<<<< HEAD
    const [denunciasFilter, setDenunciasFilter] = useState(denunciasData)
    const [searchTerm, setSearchTerm] = useState("");

=======
    const [denunciasFilter, setDenunciasFilter] = useState(denunciasData)//colocar um array
    const [searchTerm, setSearchTerm] = useState("");

    //const [denunciasFilter, setDenunciasFilter] = useState([]);

    useEffect(() => {
        // Chamar a API
        fetch("/api/denuncias")
            .then((response) => {
                if (!response.ok) {
                    throw new Error("Erro ao buscar dados das denúncias");
                }
                return response.json();
            })
            .then((data) => {
                // Atualizar o estado com os dados recebidos
                setDenunciasFilter(data);
            })
            .catch((error) => {
                console.error("Erro ao buscar denúncias:", error);
            });
    }, []);

>>>>>>> teste
    const handleSearchChange = (e) => {
      const value = e.target.value;
      setSearchTerm(value);

      // Filtrar os dados com base na entrada do usuário
      const filteredData = denunciasData.filter(item =>
          item.endereco.toLowerCase().includes(value.toLowerCase())
      );
      setDenunciasFilter(filteredData);
  };
<<<<<<< HEAD
    return (
        <section className="denuncias">
=======
  
    return (
        <section className="denuncias">
            <a href="/RegisterOrganizacao" className="text-blue-500 underline hover:text-blue-700">
              Sou uma organização e quero me cadastrar
            </a>

>>>>>>> teste
            <form action="" className="denuncias-search">
              <input 
              type="text" 
              placeholder="Pesquise a Cidade"
              value={searchTerm}
              onChange={handleSearchChange} 
              />
              <FaSearch className="denuncias-search-icon" />
            </form>
            <div className="denuncias-denun">
                {denunciasFilter.map((item, index) => (
                    <DenunciasCard
                    endereco={item.endereco}
                    nome={item.nome}
                    text={item.text}
                    type={item.type}
                    key={index}
                    />
                ))}
            </div>
        </section>
    )
}