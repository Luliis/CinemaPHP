-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Jun-2022 às 02:10
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_cinema`
--
CREATE DATABASE IF NOT EXISTS `bd_cinema` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bd_cinema`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_filme`
--

DROP TABLE IF EXISTS `tb_filme`;
CREATE TABLE `tb_filme` (
  `i_cod_filme` int(11) NOT NULL,
  `dt_dura_filme` int(11) NOT NULL,
  `s_nm_filme` varchar(100) NOT NULL,
  `dt_lan_filme` int(11) NOT NULL,
  `s_gen_filme` varchar(40) NOT NULL,
  `s_diretor_filme` varchar(60) NOT NULL,
  `lancado_filme` varchar(25) NOT NULL,
  `desc_filme` varchar(10000) DEFAULT NULL,
  `imagem` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_filme`
--

INSERT INTO `tb_filme` (`i_cod_filme`, `dt_dura_filme`, `s_nm_filme`, `dt_lan_filme`, `s_gen_filme`, `s_diretor_filme`, `lancado_filme`, `desc_filme`, `imagem`) VALUES
(1, 126, 'Doutor Estranho no Multiverso da Loucura', 2022, 'Super-Herói', 'Sam Raimi', 'Em Cartaz', 'O aguardado filme trata da jornada do Doutor Estranho rumo ao desconhecido. Além de receber ajuda de novos aliados místicos e outros já conhecidos do público, o personagem atravessa as realidades alternativas incompreensíveis e perigosas do Multiverso para enfrentar um novo e misterioso adversário.\r\n', 'Doutor-Estranho.png'),
(2, 102, 'Detetives do Prédio Azul 3 - Uma Aventura no Fim do Mundo', 2022, 'aventura', 'Mauro Lima', 'Em Cartaz', 'Severino encontra um objeto em meio aos escombros de um avião, sem saber que se trata de uma das faces do Medalhão de Uzur. Ao colocá-lo no pescoço, o porteiro do Prédio Azul passa a se tornar cada vez mais malvado. Com a bruxa Duvíbora e sua filha Dunhoca dispostas a roubá-lo, Pippo, Sol e Bento não têm outra saída a não ser encontrar a metade do bem do medalhão. Para tanto, eles contam com a ajuda da feiticeira Berenice, dos Inspetores de la Casa Naranja e ainda do mago Elergun.', 'Detetive_Azul.png'),
(3, 122, 'Sonic 2 - O filme', 2022, 'Ação', 'Jeff Fowler', 'Em Cartaz', 'O Dr. Robotnik retorna à procura de uma esmeralda mística que tem o poder de destruir civilizações. Para detê-lo, Sonic se une a seu antigo parceiro, Tails, e parte em uma jornada para encontrar a joia antes que ela caia em mãos erradas.', 'Sonic-2.png'),
(4, 135, 'Animais Fantásticos: Os Segredos de Dumbledore', 2022, 'Fantasia', 'David Yates', 'Em Cartaz', 'O professor Alvo Dumbledore (Jude Law) sabe que o poderoso mago das trevas Gellert Grindelwald (Mads Mikkelsen) está se movimentando para assumir o controle do mundo mágico. Incapaz de detê-lo sozinho, ele pede ao magizoologista Newt Scamander (Eddie Redmayne) para liderar uma intrépida equipe de bruxos, bruxas e um corajoso padeiro trouxa em uma missão perigosa, em que eles encontram velhos e novos animais fantásticos e entram em conflito com a crescente legião de seguidores de Grindelwald. Mas com tantas ameaças, quanto tempo poderá Dumbledore permanecer à margem do embate?', 'Animais-Fanasticos.png'),
(5, 122, 'Downton Abbey: Uma Nova Era', 2022, 'Drama histórico', 'Simon Curtis', 'Em Cartaz', 'Depois do sucesso do filme de 2019, o legado continua. Downton Abbey: Uma Nova Era reúne novamente A Viúva (Maggie Smith) e a sua família desta vez numa villa no sul de França.', 'Downton-Abbey.png'),
(6, 101, 'Medida provisória', 2022, 'Drama', 'Lázaro Ramos', 'Em Cartaz', 'Em uma iniciativa de reparação pelo passado escravocrata, o governo brasileiro decreta uma medida provisória e provoca uma reação imediata no Congresso Nacional. Os parlamentares aprovam uma medida que obriga os cidadãos negros a se mudar para a África na intenção de retomar as suas origens. A aprovação afeta diretamente a vida do casal formado pela médica Capitú e pelo advogado Antonio, além de seu primo, o jornalista André, que mora com eles no mesmo apartamento.', 'Medida_Provisoria.png'),
(7, 105, 'Jujutsu Kaisen 0', 2022, 'Ação', 'Sunghoo Park', 'Em Cartaz', 'O jovem Yuta Okkotsu ganha o controle de um espírito extremamente poderoso, então um grupo de feiticeiros o matriculam na Tokyo Prefectural Jujutsu High School, para ajudá-lo a controlar esse poder e também para ficar de olho nele.', 'JujutsuKaisen0.png'),
(8, 77, 'Meu AmigãoZão – O Filme', 2022, 'Fantasia', 'Andrés Lieban', 'Em Cartaz', 'Yuri, Lili e Matt se preparam pra um dia especialíssimo. Mas seus sonhos vão por água abaixo quando descobrem que os pais mudaram os planos e agora vão juntos para uma mesma colônia de ferias, com várias crianças que eles nunca viram.Um ônibus já espera por eles na esquina do parque, com uma fila delas. Quando estão prestes a embarcar na excursão, os AmigãoZões entram em ação e saem correndo com seus pequenos amigos para dentro do parque.Eles escapam pra um lugar fantástico, onde cada cantinho parece feito dos seus sonhos! Mas ali vive Duvi Dudum, uma criatura suspeita que quer ter todos os AmigãoZões só pra ele. Despertando a vaidade das crianças, o desastrado vilão consegue distraí-las e levar Golias, Nessa e Bongo pra uma ilha distante onde ele esconde muitos outros AmigãoZões. Yuri, Lili e Matt caem na real e começam uma jornada cheia de aventura e mistério para salvar seus AmigãoZões. Nessa viagem eles fazem muitos amigos novos e se sentem mais fortes que nunca pra confrontar a maior das ameaças e libertar todos os AmigãoZões da ilha do Dudum.', 'Meu_Amigãozão.png'),
(9, 108, 'George Michael Freedom Uncut', 2022, 'Documentário', 'David Austin', 'Em Cartaz', 'George Michael Freedom Uncut é focado no período formativo da vida e carreira do falecido cantor vencedor do prêmio Grammy, desde os momentos que antecederam e logo após o seu aclamado e mais vendido álbum ‘\'Listen Without Prejudice Vol. 1\'\', e a subsequente e infame batalha na justiça com a sua gravadora, tudo isso enquanto ele lamentava a morte do seu primeiro amor, AnselmoFeleppa. Filmado antes da morte de George Michael, esse documentário é narrado pelo cantor, que esteve fortemente envolvido com a produção desse filme, e que serve como a sua obra final. O filme contém o incrível arquivo pessoal de George, com cenas inéditas e imagens caseiras, dando aos espectadores um relato em primeira pessoa desse período dramático de sua vida, mostrando como ele se tornou um dos artistas mais influentes de todos os tempos, que lutou sozinho por um espaço para todos os artistas, desafiando os padrões impostos pelas gravadoras, e então reescrevendo as regras da indústria musical. Ele nos explica os motivos de ter saído dos holofotes e virado as costas ao sucesso. O documentário de longa-metragem inclui as cinco supermodelos originaisdo clipe do diretor indicado ao Oscar® David Fincher, o ‘\'Freedom! ‘90s\'\' -Naomi Campbell, Christy Turlington, Cindy Crawford, Tatjana Patitz e Linda Evangelista –que se juntam pela primeira vez para discutir a experiência no icônico vídeo clipe. O filme também contém entrevistas com alguns dos amigos mais famosos de George e lendas da música, como Stevie Wonder, Elton John, Ricky Gervais, Nile Rodgers, Mark Ronson, Tracey Emin, Liam Gallagher, Mary J. Blige, Jean Paul Gaultier, James Corden e Tony Bennett.', 'George-Michael.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

DROP TABLE IF EXISTS `tb_usuario`;
CREATE TABLE `tb_usuario` (
  `i_cod_cliente` int(11) NOT NULL,
  `i_tel_cliente` varchar(14) DEFAULT NULL,
  `i_nivel_cliente` int(11) DEFAULT NULL,
  `s_nm_cliente` varchar(30) DEFAULT NULL,
  `s_snm_cliente` varchar(30) DEFAULT NULL,
  `s_senha_cliente` varchar(32) DEFAULT NULL,
  `s_email_cliente` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`i_cod_cliente`, `i_tel_cliente`, `i_nivel_cliente`, `s_nm_cliente`, `s_snm_cliente`, `s_senha_cliente`, `s_email_cliente`) VALUES
(14, '(12)12345-6789', 10, 'kay', 'ste', '70ea781b64184297a4b418db2ea41c0b', 'kay@gmail.com');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_filme`
--
ALTER TABLE `tb_filme`
  ADD PRIMARY KEY (`i_cod_filme`);

--
-- Índices para tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`i_cod_cliente`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_filme`
--
ALTER TABLE `tb_filme`
  MODIFY `i_cod_filme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `i_cod_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
