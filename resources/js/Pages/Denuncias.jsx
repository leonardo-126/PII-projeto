import DenunciasCard from "@/Components/DenunciasCard";
import { useEffect, useState } from "react"
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
    const [denunciasFilter, setDenunciasFilter] = useState(denunciasData)
    const [searchTerm, setSearchTerm] = useState("");

    const handleSearchChange = (e) => {
      const value = e.target.value;
      setSearchTerm(value);

      // Filtrar os dados com base na entrada do usuário
      const filteredData = denunciasData.filter(item =>
          item.endereco.toLowerCase().includes(value.toLowerCase())
      );
      setDenunciasFilter(filteredData);
  };
  useEffect(() => {
    // Função para pegar os dados do backend
    const fetchDenuncias = async () => {
      try {
        const response = await fetch("URL_DO_BACKEND_AQUI"); // Substitua pela URL do seu backend
        if (!response.ok) {
          throw new Error("Erro ao carregar os dados.");
        }
        const data = await response.json();
        setDenuncias(data); // Atualiza o estado com os dados recebidos
      } catch (err) {
        setError(err.message); // Se houver um erro, atualiza o estado de erro
      } finally {
        setLoading(false); // Finaliza o estado de carregamento
      }
    };

    fetchDenuncias(); // Chama a função para pegar os dados
  }, []); // O array vazio [] garante que a requisição só aconteça uma vez após o componente ser montado

  if (loading) {
    return <div>Carregando...</div>;
  }

  if (error) {
    return <div>Erro: {error}</div>;
  }
    return (
        <section className="denuncias">
            <a href="/RegisterOrganizacao" className="text-blue-500 underline hover:text-blue-700">
              Sou uma organização e quero me cadastrar
            </a>

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