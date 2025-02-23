-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 18/02/2025 às 22:04
-- Versão do servidor: 10.11.10-MariaDB
-- Versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mapa`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cbos`
--

CREATE TABLE `cbos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `name_filter` varchar(191) DEFAULT NULL,
  `code_2002` varchar(191) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0 - inativo; 1 - ativo;'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `cbos`
--

INSERT INTO `cbos` (`id`, `name`, `name_filter`, `code_2002`, `is_active`) VALUES
(1, 'TÉCNICO DE LABORATÓRIO INDUSTRIAL', 'tecnico de laboratorio industrial', '301105', 0),
(2, 'TÉCNICO QUÍMICO', 'tecnico quimico', '311105', 0),
(3, 'TÉCNICO DE LABORATÓRIO DE ANÁLISES FÍSICO-QUÍMICAS (MATERIAIS DE CONSTRUÇÃO)', 'tecnico de laboratorio de analises fisico-quimicas (materiais de construcao)', '301110', 0),
(4, 'TÉCNICO QUÍMICO DE PETRÓLEO', 'tecnico quimico de petroleo', '301115', 0),
(5, 'TÉCNICO DE APOIO À BIOENGENHARIA', 'tecnico de apoio à bioengenharia', '301205', 0),
(6, 'TÉCNICO DE CELULOSE E PAPEL', 'tecnico de celulose e papel', '311110', 0),
(7, 'TÉCNICO EM CURTIMENTO', 'tecnico em curtimento', '311115', 0),
(8, 'TÉCNICO EM PETROQUÍMICA', 'tecnico em petroquimica', '311205', 0),
(9, 'TÉCNICO EM MATERIAIS, PRODUTOS CERÂMICOS E VIDROS', 'tecnico em materiais, produtos ceramicos e vidros', '311305', 0),
(10, 'TÉCNICO EM BORRACHA', 'tecnico em borracha', '311405', 0),
(11, 'TÉCNICO EM PLÁSTICO', 'tecnico em plastico', '311410', 0),
(12, 'TÉCNICO DE CONTROLE DE MEIO AMBIENTE', 'tecnico de controle de meio ambiente', '311505', 0),
(13, 'TÉCNICO DE METEOROLOGIA', 'tecnico de meteorologia', '311510', 0),
(14, 'TÉCNICO DE UTILIDADE (PRODUÇÃO E DISTRIBUIÇÃO DE VAPOR, GASES, ÓLEOS, COMBUSTÍVEIS, ENERGIA)', 'tecnico de utilidade (producao e distribuicao de vapor, gases, oleos, combustiveis, energia)', '311515', 0),
(15, 'TÉCNICO EM TRATAMENTO DE EFLUENTES', 'tecnico em tratamento de efluentes', '311520', 0),
(16, 'TÉCNICO TÊXTIL', 'tecnico textil', '311605', 0),
(17, 'TÉCNICO TÊXTIL (TRATAMENTOS QUÍMICOS)', 'tecnico textil (tratamentos quimicos)', '311610', 0),
(18, 'TÉCNICO TÊXTIL DE FIAÇÃO', 'tecnico textil de fiacao', '311615', 0),
(19, 'TÉCNICO TÊXTIL DE MALHARIA', 'tecnico textil de malharia', '311620', 0),
(20, 'TÉCNICO TÊXTIL DE TECELAGEM', 'tecnico textil de tecelagem', '311625', 0),
(21, 'COLORISTA DE PAPEL', 'colorista de papel', '311705', 0),
(22, 'COLORISTA TÊXTIL', 'colorista textil', '311710', 0),
(23, 'PREPARADOR DE TINTAS', 'preparador de tintas', '311715', 0),
(24, 'PREPARADOR DE TINTAS (FÁBRICA DE TECIDOS)', 'preparador de tintas (fabrica de tecidos)', '311720', 0),
(25, 'TINGIDOR DE COUROS E PELES', 'tingidor de couros e peles', '311725', 0),
(26, 'TÉCNICO DE OBRAS CIVIS', 'tecnico de obras civis', '312105', 0),
(27, 'TÉCNICO DE ESTRADAS', 'tecnico de estradas', '312205', 0),
(28, 'TÉCNICO DE SANEAMENTO', 'tecnico de saneamento', '312210', 0),
(29, 'TÉCNICO EM AGRIMENSURA', 'tecnico em agrimensura', '312305', 0),
(30, 'TÉCNICO EM GEODÉSIA E CARTOGRAFIA', 'tecnico em geodesia e cartografia', '312310', 0),
(31, 'TÉCNICO EM HIDROGRAFIA', 'tecnico em hidrografia', '312315', 0),
(32, 'TOPÓGRAFO', 'topografo', '312320', 0),
(33, 'ELETROTÉCNICO', 'eletrotecnico', '313105', 0),
(34, 'ELETROTÉCNICO (PRODUÇÃO DE ENERGIA)', 'eletrotecnico (producao de energia)', '313110', 0),
(35, 'ELETROTÉNICO NA FABRICAÇÃO, MONTAGEM E INSTALAÇÃO DE MÁQUINAS E EQUIPAMENTOS', 'eletrotenico na fabricacao, montagem e instalacao de maquinas e equipamentos', '313115', 0),
(36, 'TÉCNICO DE MANUTENÇÃO ELÉTRICA', 'tecnico de manutencao eletrica', '313120', 0),
(37, 'TÉCNICO DE MANUTENÇÃO ELÉTRICA DE MÁQUINA', 'tecnico de manutencao eletrica de maquina', '313125', 0),
(38, 'TÉCNICO ELETRICISTA', 'tecnico eletricista', '313130', 0),
(39, 'TÉCNICO DE MANUTENÇÃO ELETRÔNICA', 'tecnico de manutencao eletronica', '313205', 0),
(40, 'TÉCNICO DE MANUTENÇÃO ELETRÔNICA (CIRCUITOS DE MÁQUINAS COM COMANDO NUMÉRICO)', 'tecnico de manutencao eletronica (circuitos de maquinas com comando numerico)', '313210', 0),
(41, 'TÉCNICO ELETRÔNICO', 'tecnico eletronico', '313215', 0),
(42, 'TÉCNICO EM MANUTENÇÃO DE EQUIPAMENTOS DE INFORMÁTICA', 'tecnico em manutencao de equipamentos de informatica', '313220', 0),
(43, 'TÉCNICO DE COMUNICAÇÃO DE DADOS', 'tecnico de comunicacao de dados', '313305', 0),
(44, 'TÉCNICO DE REDE (TELECOMUNICAÇÕES)', 'tecnico de rede (telecomunicacoes)', '313310', 0),
(45, 'TÉCNICO DE TELECOMUNICAÇÕES (TELEFONIA)', 'tecnico de telecomunicacoes (telefonia)', '313315', 0),
(46, 'TÉCNICO DE TRANSMISSÃO (TELECOMUNICAÇÕES)', 'tecnico de transmissao (telecomunicacoes)', '313320', 0),
(47, 'TÉCNICO EM CALIBRAÇÃO', 'tecnico em calibracao', '313405', 0),
(48, 'TÉCNICO EM INSTRUMENTAÇÃO', 'tecnico em instrumentacao', '313410', 0),
(49, 'ENCARREGADO DE MANUTENÇÃO DE INSTRUMENTOS DE CONTROLE, MEDIÇÃO E SIMILARES', 'encarregado de manutencao de instrumentos de controle, medicao e similares', '313415', 0),
(50, 'TÉCNICO EM REABILITAÇÃO', 'tecnico em reabilitacao', '3135D1', 0),
(51, 'TÉCNICO EM EQUIPAMENTO MÉDICO HOSPITALAR', 'tecnico em equipamento medico hospitalar', '3135D2', 0),
(52, 'TÉCNICO EM FOTÔNICA', 'tecnico em fotonica', '313505', 0),
(53, 'TÉCNICO EM MECÂNICA DE PRECISÃO', 'tecnico em mecanica de precisao', '314105', 0),
(54, 'TÉCNICO MECÂNICO', 'tecnico mecanico', '314110', 0),
(55, 'TÉCNICO MECÂNICO (CALEFAÇÃO, VENTILAÇÃO E REFRIGERAÇÃO)', 'tecnico mecanico (calefacao, ventilacao e refrigeracao)', '314115', 0),
(56, 'TÉCNICO MECÂNICO (MÁQUINAS)', 'tecnico mecanico (maquinas)', '314120', 0),
(57, 'TÉCNICO MECÂNICO (MOTORES)', 'tecnico mecanico (motores)', '314125', 0),
(58, 'TÉCNICO MECÂNICO NA FABRICAÇÃO DE FERRAMENTAS', 'tecnico mecanico na fabricacao de ferramentas', '314205', 0),
(59, 'TÉCNICO MECÂNICO NA MANUTENÇÃO DE FERRAMENTAS', 'tecnico mecanico na manutencao de ferramentas', '314210', 0),
(60, 'TÉCNICO EM AUTOMOBILÍSTICA', 'tecnico em automobilistica', '314305', 0),
(61, 'TÉCNICO MECÂNICO (AERONAVES)', 'tecnico mecanico (aeronaves)', '314310', 0),
(62, 'TÉCNICO MECÂNICO (EMBARCAÇÕES)', 'tecnico mecanico (embarcacoes)', '314315', 0),
(63, 'TÉCNICO DE MANUTENÇÃO DE SISTEMAS E INSTRUMENTOS', 'tecnico de manutencao de sistemas e instrumentos', '314405', 0),
(64, 'TÉCNICO EM MANUTENÇÃO DE MÁQUINAS', 'tecnico em manutencao de maquinas', '314410', 0),
(65, 'INSPETOR DE SOLDAGEM', 'inspetor de soldagem', '314605', 0),
(66, 'TÉCNICO EM CALDEIRARIA', 'tecnico em caldeiraria', '314610', 0),
(67, 'TÉCNICO EM ESTRUTURAS METÁLICAS', 'tecnico em estruturas metalicas', '314615', 0),
(68, 'TÉCNICO EM SOLDAGEM', 'tecnico em soldagem', '314620', 0),
(69, 'TÉCNICO DE ACABAMENTO EM SIDERURGIA', 'tecnico de acabamento em siderurgia', '314705', 0),
(70, 'TÉCNICO DE ACIARIA EM SIDERURGIA', 'tecnico de aciaria em siderurgia', '314710', 0),
(71, 'TÉCNICO DE FUNDIÇÃO EM SIDERURGIA', 'tecnico de fundicao em siderurgia', '314715', 0),
(72, 'TÉCNICO DE LAMINAÇÃO EM SIDERURGIA', 'tecnico de laminacao em siderurgia', '314720', 0),
(73, 'TÉCNICO DE REDUÇÃO NA SIDERURGIA (PRIMEIRA FUSÃO)', 'tecnico de reducao na siderurgia (primeira fusao)', '314725', 0),
(74, 'TÉCNICO DE REFRATÁRIO EM SIDERURGIA', 'tecnico de refratario em siderurgia', '314730', 0),
(75, 'TÉCNICO EM GEOFÍSICA', 'tecnico em geofisica', '316105', 0),
(76, 'TÉCNICO EM GEOLOGIA', 'tecnico em geologia', '316110', 0),
(77, 'TÉCNICO EM GEOQUÍMICA', 'tecnico em geoquimica', '316115', 0),
(78, 'TÉCNICO EM GEOTECNIA', 'tecnico em geotecnia', '316120', 0),
(79, 'TÉCNICO DE MINERAÇÃO', 'tecnico de mineracao', '316305', 0),
(80, 'TÉCNICO DE MINERAÇÃO (ÓLEO E PETRÓLEO)', 'tecnico de mineracao (oleo e petroleo)', '316310', 0),
(81, 'TÉCNICO EM PROCESSAMENTO MINERAL (EXCETO PETRÓLEO)', 'tecnico em processamento mineral (exceto petroleo)', '316315', 0),
(82, 'TÉCNICO EM PESQUISA MINERAL', 'tecnico em pesquisa mineral', '316320', 0),
(83, 'TÉCNICO DE PRODUÇÃO EM REFINO DE PETRÓLEO', 'tecnico de producao em refino de petroleo', '316325', 0),
(84, 'TÉCNICO EM PLANEJAMENTO DE LAVRA DE MINAS', 'tecnico em planejamento de lavra de minas', '316330', 0),
(85, 'DESINCRUSTADOR (POÇOS DE PETRÓLEO)', 'desincrustador (pocos de petroleo)', '316335', 0),
(86, 'CIMENTADOR (POÇOS DE PETRÓLEO)', 'cimentador (pocos de petroleo)', '316340', 0),
(87, 'PROGRAMADOR DE INTERNET', 'programador de internet', '317105', 0),
(88, 'PROGRAMADOR DE SISTEMAS DE INFORMAÇÃO', 'programador de sistemas de informacao', '317110', 0),
(89, 'PROGRAMADOR DE MÁQUINAS - FERRAMENTA COM COMANDO NUMÉRICO', 'programador de maquinas - ferramenta com comando numerico', '317115', 0),
(90, 'PROGRAMADOR DE MULTIMÍDIA', 'programador de multimidia', '317120', 0),
(91, 'OPERADOR DE COMPUTADOR (INCLUSIVE MICROCOMPUTADOR)', 'operador de computador (inclusive microcomputador)', '317205', 0),
(92, 'TÉCNICO DE APOIO AO USUÁRIO DE INFORMÁTICA (HELPDESK)', 'tecnico de apoio ao usuario de informatica (helpdesk)', '317210', 0),
(93, 'DESENHISTA DETALHISTA', 'desenhista detalhista', '318015', 0),
(94, 'DESENHISTA TÉCNICO (ARQUITETURA)', 'desenhista tecnico (arquitetura)', '318105', 0),
(95, 'DESENHISTA TÉCNICO (CARTOGRAFIA)', 'desenhista tecnico (cartografia)', '318110', 0),
(96, 'DESENHISTA TÉCNICO (CONSTRUÇÃO CIVIL)', 'desenhista tecnico (construcao civil)', '318115', 0),
(97, 'DESENHISTA TÉCNICO (INSTALAÇÕES HIDROSSANITÁRIAS)', 'desenhista tecnico (instalacoes hidrossanitarias)', '318120', 0),
(98, 'DESENHISTA TÉCNICO MECÂNICO', 'desenhista tecnico mecanico', '318205', 0),
(99, 'DESENHISTA TÉCNICO AERONÁUTICO', 'desenhista tecnico aeronautico', '318210', 0),
(100, 'DESENHISTA TÉCNICO NAVAL', 'desenhista tecnico naval', '318215', 0),
(101, 'DESENHISTA TÉCNICO (ELETRICIDADE E ELETRÔNICA)', 'desenhista tecnico (eletricidade e eletronica)', '318305', 0),
(102, 'DESENHISTA TÉCNICO (CALEFAÇÃO, VENTILAÇÃO E REFRIGERAÇÃO)', 'desenhista tecnico (calefacao, ventilacao e refrigeracao)', '318310', 0),
(103, 'DESENHISTA TÉCNICO (ARTES GRÁFICAS)', 'desenhista tecnico (artes graficas)', '318405', 0),
(104, 'DESENHISTA TÉCNICO (ILUSTRAÇÕES ARTÍSTICAS)', 'desenhista tecnico (ilustracoes artisticas)', '318410', 0),
(105, 'DESENHISTA TÉCNICO (ILUSTRAÇÕES TÉCNICAS)', 'desenhista tecnico (ilustracoes tecnicas)', '318415', 0),
(106, 'DESENHISTA TÉCNICO (INDÚSTRIA TÊXTIL)', 'desenhista tecnico (industria textil)', '318420', 0),
(107, 'DESENHISTA TÉCNICO (MOBILIÁRIO)', 'desenhista tecnico (mobiliario)', '318425', 0),
(108, 'DESENHISTA TÉCNICO DE EMBALAGENS, MAQUETES E LEIAUTES', 'desenhista tecnico de embalagens, maquetes e leiautes', '318430', 0),
(109, 'DESENHISTA PROJETISTA DE ARQUITETURA', 'desenhista projetista de arquitetura', '318505', 0),
(110, 'DESENHISTA PROJETISTA DE CONSTRUÇÃO CIVIL', 'desenhista projetista de construcao civil', '318510', 0),
(111, 'DESENHISTA PROJETISTA DE MÁQUINAS', 'desenhista projetista de maquinas', '318605', 0),
(112, 'DESENHISTA PROJETISTA MECÂNICO', 'desenhista projetista mecanico', '318610', 0),
(113, 'DESENHISTA PROJETISTA DE ELETRICIDADE', 'desenhista projetista de eletricidade', '318705', 0),
(114, 'DESENHISTA PROJETISTA ELETRÔNICO', 'desenhista projetista eletronico', '318710', 0),
(115, 'PROJETISTA DE MÓVEIS', 'projetista de moveis', '318805', 0),
(116, 'MODELISTA DE ROUPAS', 'modelista de roupas', '318810', 0),
(117, 'MODELISTA DE CALÇADOS', 'modelista de calcados', '318815', 0),
(118, 'TÉCNICO EM CALÇADOS E ARTEFATOS DE COURO', 'tecnico em calcados e artefatos de couro', '319105', 0),
(119, 'TÉCNICO EM CONFECÇÕES DO VESTUÁRIO', 'tecnico em confeccoes do vestuario', '319110', 0),
(120, 'TÉCNICO DO MOBILIÁRIO', 'tecnico do mobiliario', '319205', 0),
(121, 'TÉCNICO EM BIOTERISMO', 'tecnico em bioterismo', '320105', 0),
(122, 'TÉCNICO EM HISTOLOGIA', 'tecnico em histologia', '320110', 0),
(123, 'TÉCNICO AGRÍCOLA', 'tecnico agricola', '321105', 0),
(124, 'TÉCNICO AGROPECUÁRIO', 'tecnico agropecuario', '321110', 0),
(125, 'TÉCNICO EM MADEIRA', 'tecnico em madeira', '321205', 0),
(126, 'TÉCNICO FLORESTAL', 'tecnico florestal', '321210', 0),
(127, 'TÉCNICO EM PISCICULTURA', 'tecnico em piscicultura', '321305', 0),
(128, 'TÉCNICO EM CARCINICULTURA', 'tecnico em carcinicultura', '321310', 0),
(129, 'TÉCNICO EM MITILICULTURA', 'tecnico em mitilicultura', '321315', 0),
(130, 'TÉCNICO EM RANICULTURA', 'tecnico em ranicultura', '321320', 0),
(131, 'TÉCNICO EM ACUPUNTURA', 'tecnico em acupuntura', '322105', 0),
(132, 'PODÓLOGO', 'podologo', '322110', 0),
(133, 'TÉCNICO EM QUIROPRAXIA', 'tecnico em quiropraxia', '322115', 0),
(134, 'MASSOTERAPEUTA', 'massoterapeuta', '322120', 0),
(135, 'TERAPEUTA HOLÍSTICO', 'terapeuta holistico', '322125', 0),
(136, 'ESTETICISTA', 'esteticista', '322130', 0),
(137, 'DOULA', 'doula', '322135', 0),
(138, 'TÉCNICO DE ENFERMAGEM', 'tecnico de enfermagem', '322205', 0),
(139, 'TÉCNICO DE ENFERMAGEM DE TERAPIA INTENSIVA', 'tecnico de enfermagem de terapia intensiva', '322210', 0),
(140, 'TÉCNICO DE ENFERMAGEM DO TRABALHO', 'tecnico de enfermagem do trabalho', '322215', 0),
(141, 'TÉCNICO DE ENFERMAGEM PSIQUIÁTRICA', 'tecnico de enfermagem psiquiatrica', '322220', 0),
(142, 'INSTRUMENTADOR CIRÚRGICO', 'instrumentador cirurgico', '322225', 0),
(143, 'AUXILIAR DE ENFERMAGEM', 'auxiliar de enfermagem', '322230', 0),
(144, 'AUXILIAR DE ENFERMAGEM DO TRABALHO', 'auxiliar de enfermagem do trabalho', '322235', 0),
(145, 'AUXILIAR DE SAÚDE (NAVEGAÇÃO MARÍTIMA)', 'auxiliar de saude (navegacao maritima)', '322240', 0),
(146, 'TÉCNICO DE ENFERMAGEM DA ESTRATÉGIA DE SAÚDE DA FAMÍLIA', 'tecnico de enfermagem da estrategia de saude da familia', '322245', 0),
(147, 'AUXILIAR DE ENFERMAGEM DA ESTRATÉGIA DE SAÚDE DA FAMÍLIA', 'auxiliar de enfermagem da estrategia de saude da familia', '322250', 0),
(148, 'TÉCNICO EM ÓPTICA E OPTOMETRIA', 'tecnico em optica e optometria', '322305', 0),
(149, 'TÉCNICO EM SAÚDE BUCAL', 'tecnico em saude bucal', '322405', 0),
(150, 'PROTÉTICO DENTÁRIO', 'protetico dentario', '322410', 0),
(151, 'AUXILIAR EM SAÚDE BUCAL', 'auxiliar em saude bucal', '322415', 0),
(152, 'AUXILIAR DE PRÓTESE DENTÁRIA', 'auxiliar de protese dentaria', '322420', 0),
(153, 'TÉCNICO EM SAÚDE BUCAL DA ESTRATÉGIA DE SAÚDE DA FAMÍLIA', 'tecnico em saude bucal da estrategia de saude da familia', '322425', 0),
(154, 'AUXILIAR EM SAÚDE BUCAL DA ESTRATÉGIA DE SAÚDE DA FAMÍLIA', 'auxiliar em saude bucal da estrategia de saude da familia', '322430', 0),
(155, 'TÉCNICO DE ORTOPEDIA', 'tecnico de ortopedia', '322505', 0),
(156, 'TÉCNICO DE IMOBILIZAÇÃO ORTOPÉDICA', 'tecnico de imobilizacao ortopedica', '322605', 0),
(157, 'TÉCNICO EM PECUÁRIA', 'tecnico em pecuaria', '323105', 0),
(158, 'TÉCNICO EM MÉTODOS ELETROGRÁFICOS EM ENCEFALOGRAFIA', 'tecnico em metodos eletrograficos em encefalografia', '324105', 0),
(159, 'TÉCNICO EM MÉTODOS GRÁFICOS EM CARDIOLOGIA', 'tecnico em metodos graficos em cardiologia', '324110', 0),
(160, 'TÉCNICO EM RADIOLOGIA E IMAGENOLOGIA', 'tecnico em radiologia e imagenologia', '324115', 0),
(161, 'TÉCNÓLOGO EM RADIOLOGIA', 'tecnologo em radiologia', '324120', 0),
(162, 'TECNÓLOGO OFTÁLMICO', 'tecnologo oftalmico', '324125', 0),
(163, 'AUXILIAR TÉCNICO EM PATOLOGIA CLÍNICA', 'auxiliar tecnico em patologia clinica', '324210', 0),
(164, 'ENÓLOGO', 'enologo', '325005', 0),
(165, 'AROMISTA', 'aromista', '325010', 0),
(166, 'PERFUMISTA', 'perfumista', '325015', 0),
(167, 'AUXILIAR TÉCNICO EM LABORATÓRIO DE FARMÁCIA', 'auxiliar tecnico em laboratorio de farmacia', '325105', 0),
(168, 'TÉCNICO EM LABORATÓRIO DE FARMÁCIA', 'tecnico em laboratorio de farmacia', '325110', 0),
(169, 'TÉCNICO EM FARMÁCIA', 'tecnico em farmacia', '325115', 0),
(170, 'TÉCNICO DE ALIMENTOS', 'tecnico de alimentos', '325205', 0),
(171, 'TÉCNICO EM NUTRIÇÃO E DIETÉTICA', 'tecnico em nutricao e dietetica', '325210', 0),
(172, 'TÉCNICO EM BIOTECNOLOGIA', 'tecnico em biotecnologia', '325305', 0),
(173, 'TÉCNICO EM IMUNOBIOLÓGICOS', 'tecnico em imunobiologicos', '325310', 0),
(174, 'EMBALSAMADOR', 'embalsamador', '328105', 0),
(175, 'TAXIDERMISTA', 'taxidermista', '328110', 0),
(176, 'PROFESSOR DE NÍVEL MÉDIO NA EDUCAÇÃO INFANTIL', 'professor de nivel medio na educacao infantil', '331105', 0),
(177, 'AUXILIAR DE DESENVOLVIMENTO INFANTIL', 'auxiliar de desenvolvimento infantil', '331110', 0),
(178, 'PROFESSOR DE NÍVEL MÉDIO NO ENSINO FUNDAMENTAL', 'professor de nivel medio no ensino fundamental', '331205', 0),
(179, 'PROFESSOR DE NÍVEL MÉDIO NO ENSINO PROFISSIONALIZANTE', 'professor de nivel medio no ensino profissionalizante', '331305', 0),
(180, 'PROFESSOR LEIGO NO ENSINO FUNDAMENTAL', 'professor leigo no ensino fundamental', '332105', 0),
(181, 'PROFESSOR PRÁTICO NO ENSINO PROFISSIONALIZANTE', 'professor pratico no ensino profissionalizante', '332205', 0),
(182, 'INSTRUTOR DE AUTO-ESCOLA', 'instrutor de auto-escola', '333105', 0),
(183, 'INSTRUTOR DE CURSOS LIVRES', 'instrutor de cursos livres', '333110', 0),
(184, 'PROFESSORES DE CURSOS LIVRES', 'professores de cursos livres', '333115', 0),
(185, 'INSPETOR DE ALUNOS DE ESCOLA PRIVADA', 'inspetor de alunos de escola privada', '334105', 0),
(186, 'INSPETOR DE ALUNOS DE ESCOLA PÚBLICA', 'inspetor de alunos de escola publica', '334110', 0),
(187, 'MONITOR DE TRANSPORTE ESCOLAR', 'monitor de transporte escolar', '334115', 0),
(188, 'PILOTO COMERCIAL (EXCETO LINHAS AÉREAS)', 'piloto comercial (exceto linhas aereas)', '341105', 0),
(189, 'MECÂNICO DE VÔO', 'mecanico de voo', '341115', 0),
(190, 'PILOTO AGRÍCOLA', 'piloto agricola', '341120', 0),
(191, 'OURIVES', 'ourives', '751125', 0),
(192, 'PILOTO COMERCIAL DE HELICÓPTERO (EXCETO LINHAS AÉREAS)', 'piloto comercial de helicoptero (exceto linhas aereas)', '341110', 0),
(193, 'EDITOR DE REVISTA', 'editor de revista', '261620', 0),
(194, 'EDITOR DE REVISTA CIENTÍFICA', 'editor de revista cientifica', '261625', 0),
(195, 'ANCORA DE RÁDIO E TELEVISÃO', 'ancora de radio e televisao', '261705', 0),
(196, 'COMENTARISTA DE RÁDIO E TELEVISÃO', 'comentarista de radio e televisao', '261710', 0),
(197, 'LOCUTOR DE RÁDIO E TELEVISÃO', 'locutor de radio e televisao', '261715', 0),
(198, 'LOCUTOR PUBLICITÁRIO DE RÁDIO E TELEVISÃO', 'locutor publicitario de radio e televisao', '261720', 0),
(199, 'NARRADOR EM PROGRAMAS DE RÁDIO E TELEVISÃO', 'narrador em programas de radio e televisao', '261725', 0),
(200, 'REPÓRTER DE RÁDIO E TELEVISÃO', 'reporter de radio e televisao', '261730', 0),
(201, 'FOTÓGRAFO PUBLICITÁRIO', 'fotografo publicitario', '261810', 0),
(202, 'FOTÓGRAFO RETRATISTA', 'fotografo retratista', '261815', 0),
(203, 'REPÓTER FOTOGRÁFICO', 'repoter fotografico', '261820', 0),
(204, 'EMPRESÁRIO DE ESPETÁCULO', 'empresario de espetaculo', '262105', 0),
(205, 'PRODUTOR CINEMATOGRÁFICO', 'produtor cinematografico', '262110', 0),
(206, 'PRODUTOR DE RÁDIO', 'produtor de radio', '262115', 0),
(207, 'PRODUTOR DE TEATRO', 'produtor de teatro', '262120', 0),
(208, 'PRODUTOR DE TELEVISÃO', 'produtor de televisao', '262125', 0),
(209, 'TECNÓLOGO EM PRODUÇÃO FONOGRÁFICA', 'tecnologo em producao fonografica', '262130', 0),
(210, 'TECNÓLOGO EM PRODUÇÃO AUDIOVISUAL', 'tecnologo em producao audiovisual', '262135', 0),
(211, 'DIRETOR DE CINEMA', 'diretor de cinema', '262205', 0),
(212, 'DIRETOR DE PROGRAMAS DE RÁDIO', 'diretor de programas de radio', '262210', 0),
(213, 'DIRETOR DE PROGRAMAS DE TELEVISÃO', 'diretor de programas de televisao', '262215', 0),
(214, 'DIRETOR TEATRAL', 'diretor teatral', '262220', 0),
(215, 'CENÓGRAFO CARNAVALESCO E FESTAS POPULARES', 'cenografo carnavalesco e festas populares', '262305', 0),
(216, 'CENÓGRAFO DE CINEMA', 'cenografo de cinema', '262310', 0),
(217, 'CENÓGRAFO DE EVENTOS', 'cenografo de eventos', '262315', 0),
(218, 'CENÓGRAFO DE TEATRO', 'cenografo de teatro', '262320', 0),
(219, 'CENÓGRAFO DE TV', 'cenografo de tv', '262325', 0),
(220, 'DIRETOR DE ARTE', 'diretor de arte', '262330', 0),
(221, 'ARTISTA (ARTES VISUAIS)', 'artista (artes visuais)', '262405', 0),
(222, 'INTÉRPRETE DE LÍNGUA DE SINAIS', 'interprete de lingua de sinais', '261425', 0),
(223, 'DESENHISTA INDUSTRIAL (DESIGNER)', 'desenhista industrial (designer)', '262410', 0),
(224, 'CONSERVADOR-RESTAURADOR DE BENS CULTURAIS', 'conservador-restaurador de bens culturais', '262415', 0),
(225, 'MESTRE DE PRODUÇÃO QUÍMICA', 'mestre de producao quimica', '810110', 0),
(226, 'DESENHISTA INDUSTRIAL DE PRODUTO (DESIGNER DE PRODUTO)', 'desenhista industrial de produto (designer de produto)', '262420', 0),
(227, 'DESENHISTA INDUSTRIAL DE PRODUTO DE MODA (DESIGNER DE MODA)', 'desenhista industrial de produto de moda (designer de moda)', '262425', 0),
(228, 'COMPOSITOR', 'compositor', '262605', 0),
(229, 'MÚSICO ARRANJADOR', 'musico arranjador', '262610', 0),
(230, 'MÚSICO REGENTE', 'musico regente', '262615', 0),
(231, 'MUSICÓLOGO', 'musicologo', '262620', 0),
(232, 'MÚSICO INTÉRPRETE CANTOR', 'musico interprete cantor', '262705', 0),
(233, 'MÚSICO INTÉRPRETE INSTRUMENTISTA', 'musico interprete instrumentista', '262710', 0),
(234, 'ASSISTENTE DE COREOGRAFIA', 'assistente de coreografia', '262805', 0),
(235, 'BAILARINO (EXCETO DANÇAS POPULARES)', 'bailarino (exceto dancas populares)', '262810', 0),
(236, 'COREÓGRAFO', 'coreografo', '262815', 0),
(237, 'DRAMATURGO DE DANÇA', 'dramaturgo de danca', '262820', 0),
(238, 'ENSAIADOR DE DANÇA', 'ensaiador de danca', '262825', 0),
(239, 'PROFESSOR DE DANÇA', 'professor de danca', '262830', 0),
(240, 'DECORADOR DE INTERIORES DE NÍVEL SUPERIOR', 'decorador de interiores de nivel superior', '262905', 0),
(241, 'MINISTRO DE CULTO RELIGIOSO', 'ministro de culto religioso', '263105', 0),
(242, 'MISSIONÁRIO', 'missionario', '263110', 0),
(243, 'TEÓLOGO', 'teologo', '263115', 0),
(244, 'CHEFE DE COZINHA', 'chefe de cozinha', '271105', 0),
(245, 'TECNÓLOGO EM GASTRONOMIA', 'tecnologo em gastronomia', '271110', 0),
(246, 'TÉCNICO EM MECATRÔNICA - AUTOMAÇÃO DA MANUFATURA', 'tecnico em mecatronica - automacao da manufatura', '300105', 0),
(247, 'TÉCNICO EM MECATRÔNICA - ROBÓTICA', 'tecnico em mecatronica - robotica', '300110', 0),
(248, 'TÉCNICO EM ELETROMECÂNICA', 'tecnico em eletromecanica', '300305', 0),
(249, 'BOIADEIRO', 'boiadeiro', '782815', 0),
(250, 'CONDUTOR DE VEÍCULOS A PEDAIS', 'condutor de veiculos a pedais', '782820', 0),
(251, 'AGENTE DE PÁTIO', 'agente de patio', '783105', 0),
(252, 'MANOBRADOR', 'manobrador', '783110', 0),
(253, 'CARREGADOR (AERONAVES)', 'carregador (aeronaves)', '783205', 0),
(254, 'CARREGADOR (ARMAZÉM)', 'carregador (armazem)', '783210', 0),
(255, 'CARREGADOR (VEÍCULOS DE TRANSPORTES TERRESTRES)', 'carregador (veiculos de transportes terrestres)', '783215', 0),
(256, 'ESTIVADOR', 'estivador', '783220', 0),
(257, 'AJUDANTE DE MOTORISTA', 'ajudante de motorista', '783225', 0),
(258, 'BLOQUEIRO (TRABALHADOR PORTUÁRIO)', 'bloqueiro (trabalhador portuario)', '783230', 0),
(259, 'EMBALADOR, A MÃO', 'embalador, a mao', '784105', 0),
(260, 'EMBALADOR, A MÁQUINA', 'embalador, a maquina', '784110', 0),
(261, 'OPERADOR DE MÁQUINA DE ETIQUETAR', 'operador de maquina de etiquetar', '784115', 0),
(262, 'OPERADOR DE MÁQUINA DE ENVASAR LÍQUIDOS', 'operador de maquina de envasar liquidos', '784120', 0),
(263, 'OPERADOR DE PRENSA DE ENFARDAMENTO', 'operador de prensa de enfardamento', '784125', 0),
(264, 'ALIMENTADOR DE LINHA DE PRODUÇÃO', 'alimentador de linha de producao', '784205', 0),
(265, 'ARTESÃO BORDADOR', 'artesao bordador', '791105', 0),
(266, 'ARTESÃO CERAMISTA', 'artesao ceramista', '791110', 0),
(267, 'ARTESÃO COM MATERIAL RECICLÁVEL', 'artesao com material reciclavel', '791115', 0),
(268, 'ARTESÃO CONFECCIONADOR DE BIOJÓIAS E ECOJÓIAS', 'artesao confeccionador de biojoias e ecojoias', '791120', 0),
(269, 'ARTESÃO DO COURO', 'artesao do couro', '791125', 0),
(270, 'ARTESÃO ESCULTOR', 'artesao escultor', '791130', 0),
(271, 'ARTESÃO MOVELEIRO (EXCETO RECICLADO)', 'artesao moveleiro (exceto reciclado)', '791135', 0),
(272, 'ARTESÃO TECELÃO', 'artesao tecelao', '791140', 0),
(273, 'ARTESÃO TRANÇADOR', 'artesao trancador', '791145', 0),
(274, 'ARTESÃO CROCHETEIRO', 'artesao crocheteiro', '791150', 0),
(275, 'ARTESÃO TRICOTEIRO', 'artesao tricoteiro', '791155', 0),
(276, 'ARTESÃO RENDEIRO', 'artesao rendeiro', '791160', 0),
(277, 'MESTRE (INDÚSTRIA PETROQUÍMICA E CARBOQUÍMICA)', 'mestre (industria petroquimica e carboquimica)', '810105', 0),
(278, 'MESTRE (INDÚSTRIA DE BORRACHA E PLÁSTICO)', 'mestre (industria de borracha e plastico)', '810205', 0),
(279, 'MESTRE DE PRODUÇÃO FARMACÊUTICA', 'mestre de producao farmaceutica', '810305', 0),
(280, 'OPERADOR DE PROCESSOS QUÍMICOS E PETROQUÍMICOS', 'operador de processos quimicos e petroquimicos', '811005', 0),
(281, 'OPERADOR DE SALA DE CONTROLE DE INSTALAÇÕES QUÍMICAS, PETROQUÍMICAS E AFINS', 'operador de sala de controle de instalacoes quimicas, petroquimicas e afins', '811010', 0),
(282, 'MOLEIRO (TRATAMENTOS QUÍMICOS E AFINS)', 'moleiro (tratamentos quimicos e afins)', '811105', 0),
(283, 'OPERADOR DE MÁQUINA MISTURADEIRA (TRATAMENTOS QUÍMICOS E AFINS)', 'operador de maquina misturadeira (tratamentos quimicos e afins)', '811110', 0),
(284, 'OPERADOR DE BRITADEIRA (TRATAMENTOS QUÍMICOS E AFINS)', 'operador de britadeira (tratamentos quimicos e afins)', '811115', 0),
(285, 'OPERADOR DE CONCENTRAÇÃO', 'operador de concentracao', '811120', 0),
(286, 'CHAPELEIRO DE SENHORAS', 'chapeleiro de senhoras', '765010', 0),
(287, 'BONELEIRO', 'boneleiro', '765015', 0),
(288, 'CORTADOR DE ARTEFATOS DE COURO (EXCETO ROUPAS E CALÇADOS)', 'cortador de artefatos de couro (exceto roupas e calcados)', '765105', 0),
(289, 'CORTADOR DE TAPEÇARIA', 'cortador de tapecaria', '765110', 0),
(290, 'COLCHOEIRO (CONFECÇÃO DE COLCHOES)', 'colchoeiro (confeccao de colchoes)', '765205', 0),
(291, 'CONFECCIONADOR DE BRINQUEDOS DE PANO', 'confeccionador de brinquedos de pano', '765215', 0),
(292, 'CONFECCIONADOR DE VELAS NÁUTICAS, BARRACAS E TOLDOS', 'confeccionador de velas nauticas, barracas e toldos', '765225', 0),
(293, 'ESTOFADOR DE AVIOES', 'estofador de avioes', '765230', 0),
(294, 'ESTOFADOR DE MÓVEIS', 'estofador de moveis', '765235', 0),
(295, 'COSTURADOR DE ARTEFATOS DE COURO, A MÁQUINA (EXCETO ROUPAS E CALÇADOS)', 'costurador de artefatos de couro, a maquina (exceto roupas e calcados)', '765310', 0),
(296, 'MONTADOR DE ARTEFATOS DE COURO (EXCETO ROUPAS E CALÇADOS)', 'montador de artefatos de couro (exceto roupas e calcados)', '765315', 0),
(297, 'REDEIRO', 'redeiro', '768120', 0),
(298, 'PRODUTOR NA OLERICULTURA DE LEGUMES', 'produtor na olericultura de legumes', '612305', 0),
(299, 'SUPERVISOR DE CONTROLE DE TRATAMENTO TÉRMICO', 'supervisor de controle de tratamento termico', '720160', 0),
(300, 'MESTRE (CONSTRUÇÃO NAVAL)', 'mestre (construcao naval)', '720205', 0),
(301, 'CONTRAMESTRE DE CABOTAGEM', 'contramestre de cabotagem', '341205', 0),
(302, 'MESTRE DE CABOTAGEM', 'mestre de cabotagem', '341210', 0),
(303, 'MESTRE FLUVIAL', 'mestre fluvial', '341215', 0),
(304, 'PATRÃO DE PESCA DE ALTO-MAR', 'patrao de pesca de alto-mar', '341220', 0),
(305, 'PATRÃO DE PESCA NA NAVEGAÇÃO INTERIOR', 'patrao de pesca na navegacao interior', '341225', 0),
(306, 'PILOTO FLUVIAL', 'piloto fluvial', '341230', 0),
(307, 'CONDUTOR MAQUINISTA FLUVIAL', 'condutor maquinista fluvial', '341305', 0),
(308, 'CONDUTOR MAQUINISTA MARÍTIMO', 'condutor maquinista maritimo', '341310', 0),
(309, 'ELETRICISTA DE BORDO', 'eletricista de bordo', '341315', 0),
(310, 'ANALISTA DE TRANSPORTE EM COMÉRCIO EXTERIOR', 'analista de transporte em comercio exterior', '342105', 0),
(311, 'OPERADOR DE TRANSPORTE MULTIMODAL', 'operador de transporte multimodal', '342110', 0),
(312, 'CONTROLADOR DE SERVIÇOS DE MÁQUINAS E VEÍCULOS', 'controlador de servicos de maquinas e veiculos', '342115', 0),
(313, 'AFRETADOR', 'afretador', '342120', 0),
(314, 'TECNÓLOGO EM LOGÍSTICA DE TRANSPORTE', 'tecnologo em logistica de transporte', '342125', 0),
(315, 'AJUDANTE DE DESPACHANTE ADUANEIRO', 'ajudante de despachante aduaneiro', '342205', 0),
(316, 'DESPACHANTE ADUANEIRO', 'despachante aduaneiro', '342210', 0),
(317, 'CHEFE DE SERVIÇO DE TRANSPORTE RODOVIÁRIO (PASSAGEIROS E CARGAS)', 'chefe de servico de transporte rodoviario (passageiros e cargas)', '342305', 0),
(318, 'INSPETOR DE SERVIÇOS DE TRANSPORTES RODOVIÁRIOS (PASSAGEIROS E CARGAS)', 'inspetor de servicos de transportes rodoviarios (passageiros e cargas)', '342310', 0),
(319, 'SUPERVISOR DE CARGA E DESCARGA', 'supervisor de carga e descarga', '342315', 0),
(320, 'AGENTE DE ESTAÇÃO (FERROVIA E METRÔ)', 'agente de estacao (ferrovia e metro)', '342405', 0),
(321, 'OPERADOR DE CENTRO DE CONTROLE (FERROVIA E METRÔ)', 'operador de centro de controle (ferrovia e metro)', '342410', 0),
(322, 'CONTROLADOR DE TRÁFEGO AÉREO', 'controlador de trafego aereo', '342505', 0),
(323, 'DESPACHANTE OPERACIONAL DE VÔO', 'despachante operacional de voo', '342510', 0),
(324, 'FISCAL DE AVIAÇÃO CIVIL (FAC)', 'fiscal de aviacao civil (fac)', '342515', 0),
(325, 'GERENTE DA ADMINISTRAÇÃO DE AEROPORTOS', 'gerente da administracao de aeroportos', '342520', 0),
(326, 'GERENTE DE EMPRESA AÉREA EM AEROPORTOS', 'gerente de empresa aerea em aeroportos', '342525', 0),
(327, 'INSPETOR DE AVIAÇÃO CIVIL', 'inspetor de aviacao civil', '342530', 0),
(328, 'OPERADOR DE ATENDIMENTO AEROVIÁRIO', 'operador de atendimento aeroviario', '342535', 0),
(329, 'SUPERVISOR DA ADMINISTRAÇÃO DE AEROPORTOS', 'supervisor da administracao de aeroportos', '342540', 0),
(330, 'SUPERVISOR DE EMPRESA AÉREA EM AEROPORTOS', 'supervisor de empresa aerea em aeroportos', '342545', 0),
(331, 'AGENTE DE PROTEÇÃO DE AVIAÇÃO CIVIL', 'agente de protecao de aviacao civil', '342550', 0),
(332, 'CHEFE DE ESTAÇÃO PORTUÁRIA', 'chefe de estacao portuaria', '342605', 0),
(333, 'SUPERVISOR DE OPERAÇÕES PORTUÁRIAS', 'supervisor de operacoes portuarias', '342610', 0),
(334, 'TÉCNICO DE CONTABILIDADE', 'tecnico de contabilidade', '351105', 0),
(335, 'CHEFE DE CONTABILIDADE (TÉCNICO)', 'chefe de contabilidade (tecnico)', '351110', 0),
(336, 'CONSULTOR CONTÁBIL (TÉCNICO)', 'consultor contabil (tecnico)', '351115', 0),
(337, 'TÉCNICO EM ADMINISTRAÇÃO', 'tecnico em administracao', '351305', 0),
(338, 'TÉCNICO EM ADMINISTRAÇÃO DE COMÉRCIO EXTERIOR', 'tecnico em administracao de comercio exterior', '351310', 0),
(339, 'AGENTE DE RECRUTAMENTO E SELEÇÃO', 'agente de recrutamento e selecao', '351315', 0),
(340, 'ESCREVENTE', 'escrevente', '351405', 0),
(341, 'ESCRIVÃO JUDICIAL', 'escrivao judicial', '351410', 0),
(342, 'ESCRIVÃO EXTRA - JUDICIAL', 'escrivao extra - judicial', '351415', 0),
(343, 'ESCRIVÃO DE POLÍCIA', 'escrivao de policia', '351420', 0),
(344, 'OFICIAL DE JUSTIÇA', 'oficial de justica', '351425', 0),
(345, 'AUXILIAR DE SERVIÇOS JURÍDICOS', 'auxiliar de servicos juridicos', '351430', 0),
(346, 'TÉCNICO EM SECRETARIADO', 'tecnico em secretariado', '351505', 0),
(347, 'TAQUÍGRAFO', 'taquigrafo', '351510', 0),
(348, 'ESTENOTIPISTA', 'estenotipista', '351515', 0),
(349, 'INSPETOR DE RISCO', 'inspetor de risco', '351725', 0),
(350, 'TÉCNICO EM SEGURANÇA NO TRABALHO', 'tecnico em seguranca no trabalho', '351605', 0),
(351, 'ANALISTA DE SEGUROS (TÉCNICO)', 'analista de seguros (tecnico)', '351705', 0),
(352, 'ANALISTA DE SINISTROS', 'analista de sinistros', '351710', 0),
(353, 'ASSISTENTE COMERCIAL DE SEGUROS', 'assistente comercial de seguros', '351715', 0),
(354, 'ASSISTENTE TÉCNICO DE SEGUROS', 'assistente tecnico de seguros', '351720', 0),
(355, 'INSPETOR DE SINISTROS', 'inspetor de sinistros', '351730', 0),
(356, 'TÉCNICO DE RESSEGUROS', 'tecnico de resseguros', '351735', 0),
(357, 'TÉCNICO DE SEGUROS', 'tecnico de seguros', '351740', 0),
(358, 'DETETIVE PROFISSIONAL', 'detetive profissional', '351805', 0),
(359, 'INVESTIGADOR DE POLÍCIA', 'investigador de policia', '351810', 0),
(360, 'PAPILOSCOPISTA POLICIAL', 'papiloscopista policial', '351815', 0),
(361, 'AGENTE DE INTELIGÊNCIA', 'agente de inteligencia', '351905', 0),
(362, 'AGENTE TÉCNICO DE INTELIGÊNCIA', 'agente tecnico de inteligencia', '351910', 0),
(363, 'AGENTE DE DEFESA AMBIENTAL', 'agente de defesa ambiental', '352205', 0),
(364, 'METROLOGISTA', 'metrologista', '352305', 0),
(365, 'AGENTE FISCAL DE QUALIDADE', 'agente fiscal de qualidade', '352310', 0),
(366, 'AGENTE FISCAL METROLÓGICO', 'agente fiscal metrologico', '352315', 0),
(367, 'AGENTE FISCAL TÊXTIL', 'agente fiscal textil', '352320', 0),
(368, 'AGENTE DE DIREITOS AUTORAIS', 'agente de direitos autorais', '352405', 0),
(369, 'AVALIADOR DE PRODUTOS DO MEIO DE COMUNICAÇÃO', 'avaliador de produtos do meio de comunicacao', '352410', 0),
(370, 'TÉCNICO EM DIREITOS AUTORAIS', 'tecnico em direitos autorais', '352420', 0),
(371, 'TÉCNICO DE OPERAÇÕES E SERVIÇOS BANCÁRIOS - CÂMBIO', 'tecnico de operacoes e servicos bancarios - cambio', '353205', 0),
(372, 'TÉCNICO DE OPERAÇÕES E SERVIÇOS BANCÁRIOS - CRÉDITO IMOBILIÁRIO', 'tecnico de operacoes e servicos bancarios - credito imobiliario', '353210', 0),
(373, 'TÉCNICO DE OPERAÇÕES E SERVIÇOS BANCÁRIOS - CRÉDITO RURAL', 'tecnico de operacoes e servicos bancarios - credito rural', '353215', 0),
(374, 'TÉCNICO DE OPERAÇÕES E SERVIÇOS BANCÁRIOS - LEASING', 'tecnico de operacoes e servicos bancarios - leasing', '353220', 0),
(375, 'TÉCNICO DE OPERAÇÕES E SERVIÇOS BANCÁRIOS - RENDA FIXA E VARIÁVEL', 'tecnico de operacoes e servicos bancarios - renda fixa e variavel', '353225', 0),
(376, 'TESOUREIRO DE BANCO', 'tesoureiro de banco', '353230', 0),
(377, 'CHEFE DE SERVIÇOS BANCÁRIOS', 'chefe de servicos bancarios', '353235', 0),
(378, 'AGENCIADOR DE PROPAGANDA', 'agenciador de propaganda', '354110', 0),
(379, 'AGENTE DE VENDAS DE SERVIÇOS', 'agente de vendas de servicos', '354120', 0),
(380, 'ASSISTENTE DE VENDAS', 'assistente de vendas', '354125', 0),
(381, 'PROMOTOR DE VENDAS ESPECIALIZADO', 'promotor de vendas especializado', '354130', 0),
(382, 'TÉCNICO DE VENDAS', 'tecnico de vendas', '354135', 0),
(383, 'TÉCNICO EM ATENDIMENTO E VENDAS', 'tecnico em atendimento e vendas', '354140', 0),
(384, 'VENDEDOR PRACISTA', 'vendedor pracista', '354145', 0),
(385, 'PROPAGANDISTA DE PRODUTOS FAMACÊUTICOS', 'propagandista de produtos famaceuticos', '354150', 0),
(386, 'COMPRADOR', 'comprador', '354205', 0),
(387, 'SUPERVISOR DE COMPRAS', 'supervisor de compras', '354210', 0),
(388, 'ANALISTA DE EXPORTAÇÃO E IMPORTAÇÃO', 'analista de exportacao e importacao', '354305', 0),
(389, 'LEILOEIRO', 'leiloeiro', '354405', 0),
(390, 'AVALIADOR DE IMÓVEIS', 'avaliador de imoveis', '354410', 0),
(391, 'AVALIADOR DE BENS MÓVEIS', 'avaliador de bens moveis', '354415', 0),
(392, 'CORRETOR DE SEGUROS', 'corretor de seguros', '354505', 0),
(393, 'CORRETOR DE IMÓVEIS', 'corretor de imoveis', '354605', 0),
(394, 'REPRESENTANTE COMERCIAL AUTÔNOMO', 'representante comercial autonomo', '354705', 0),
(395, 'TÉCNICO EM TURISMO', 'tecnico em turismo', '354805', 0),
(396, 'OPERADOR DE TURISMO', 'operador de turismo', '354810', 0),
(397, 'AGENTE DE VIAGEM', 'agente de viagem', '354815', 0),
(398, 'ORGANIZADOR DE EVENTO', 'organizador de evento', '354820', 0),
(399, 'AUXILIAR DE BIBLIOTECA', 'auxiliar de biblioteca', '371105', 0),
(400, 'TÉCNICO EM BIBLIOTECONOMIA', 'tecnico em biblioteconomia', '371110', 0),
(401, 'COLECIONADOR DE SELOS E MOEDAS', 'colecionador de selos e moedas', '371205', 0),
(402, 'TÉCNICO EM MUSEOLOGIA', 'tecnico em museologia', '371210', 0),
(403, 'CONFECCIONADOR DE INSTRUMENTOS DE SOPRO (METAL)', 'confeccionador de instrumentos de sopro (metal)', '742130', 0),
(404, 'CONFECCIONADOR DE ORGÃO', 'confeccionador de orgao', '742135', 0),
(405, 'CONFECCIONADOR DE PIANO', 'confeccionador de piano', '742140', 0),
(406, 'SUPERVISOR DE JOALHERIA', 'supervisor de joalheria', '750105', 0),
(407, 'SUPERVISOR DA INDÚSTRIA DE MINERAIS NÃO METÁLICOS (EXCETO OS DERIVADOS DE PETRÓLEO E CARVÃO)', 'supervisor da industria de minerais nao metalicos (exceto os derivados de petroleo e carvao)', '750205', 0),
(408, 'ENGASTADOR (JÓIAS)', 'engastador (joias)', '751005', 0),
(409, 'JOALHEIRO', 'joalheiro', '751010', 0),
(410, 'JOALHEIRO (REPARAÇÕES)', 'joalheiro (reparacoes)', '751015', 0),
(411, 'LAPIDADOR (JÓIAS)', 'lapidador (joias)', '751020', 0),
(412, 'BATE-FOLHA A MÁQUINA', 'bate-folha a maquina', '751105', 0),
(413, 'FUNDIDOR (JOALHERIA E OURIVESARIA)', 'fundidor (joalheria e ourivesaria)', '751110', 0),
(414, 'GRAVADOR (JOALHERIA E OURIVESARIA)', 'gravador (joalheria e ourivesaria)', '751115', 0),
(415, 'LAMINADOR DE METAIS PRECIOSOS A MÃO', 'laminador de metais preciosos a mao', '751120', 0),
(416, 'TREFILADOR (JOALHERIA E OURIVESARIA)', 'trefilador (joalheria e ourivesaria)', '751130', 0),
(417, 'ARTESÃO MODELADOR (VIDROS)', 'artesao modelador (vidros)', '752105', 0),
(418, 'MOLDADOR (VIDROS)', 'moldador (vidros)', '752110', 0),
(419, 'SOPRADOR DE VIDRO', 'soprador de vidro', '752115', 0),
(420, 'TRANSFORMADOR DE TUBOS DE VIDRO', 'transformador de tubos de vidro', '752120', 0),
(421, 'APLICADOR SERIGRÁFICO EM VIDROS', 'aplicador serigrafico em vidros', '752205', 0),
(422, 'CORTADOR DE VIDRO', 'cortador de vidro', '752210', 0),
(423, 'GRAVADOR DE VIDRO A ÁGUA-FORTE', 'gravador de vidro a agua-forte', '752215', 0),
(424, 'GRAVADOR DE VIDRO A ESMERIL', 'gravador de vidro a esmeril', '752220', 0),
(425, 'GRAVADOR DE VIDRO A JATO DE AREIA', 'gravador de vidro a jato de areia', '752225', 0),
(426, 'LAPIDADOR DE VIDROS E CRISTAIS', 'lapidador de vidros e cristais', '752230', 0),
(427, 'SURFASSAGISTA', 'surfassagista', '752235', 0),
(428, 'CERAMISTA', 'ceramista', '752305', 0),
(429, 'CERAMISTA (TORNO DE PEDAL E MOTOR)', 'ceramista (torno de pedal e motor)', '752310', 0),
(430, 'CERAMISTA (TORNO SEMI-AUTOMÁTICO)', 'ceramista (torno semi-automatico)', '752315', 0),
(431, 'CERAMISTA MODELADOR', 'ceramista modelador', '752320', 0),
(432, 'CERAMISTA MOLDADOR', 'ceramista moldador', '752325', 0),
(433, 'CERAMISTA PRENSADOR', 'ceramista prensador', '752330', 0),
(434, 'DECORADOR DE CERÂMICA', 'decorador de ceramica', '752405', 0),
(435, 'DECORADOR DE VIDRO', 'decorador de vidro', '752410', 0),
(436, 'DECORADOR DE VIDRO À PINCEL', 'decorador de vidro à pincel', '752415', 0),
(437, 'OPERADOR DE ESMALTADEIRA', 'operador de esmaltadeira', '752420', 0),
(438, 'OPERADOR DE ESPELHAMENTO', 'operador de espelhamento', '752425', 0),
(439, 'PINTOR DE CERÂMICA, A PINCEL', 'pintor de ceramica, a pincel', '752430', 0),
(440, 'CONTRAMESTRE DE ACABAMENTO (INDÚSTRIA TÊXTIL)', 'contramestre de acabamento (industria textil)', '760105', 0),
(441, 'CONTRAMESTRE DE FIAÇÃO (INDÚSTRIA TÊXTIL)', 'contramestre de fiacao (industria textil)', '760110', 0),
(442, 'CONTRAMESTRE DE MALHARIA (INDÚSTRIA TÊXTIL)', 'contramestre de malharia (industria textil)', '760115', 0),
(443, 'CONTRAMESTRE DE TECELAGEM (INDÚSTRIA TÊXTIL)', 'contramestre de tecelagem (industria textil)', '760120', 0),
(444, 'MESTRE (INDÚSTRIA TÊXTIL E DE CONFECÇÕES)', 'mestre (industria textil e de confeccoes)', '760125', 0),
(445, 'SUPERVISOR DE CURTIMENTO', 'supervisor de curtimento', '760205', 0),
(446, 'ENCARREGADO DE CORTE NA CONFECÇÃO DO VESTUÁRIO', 'encarregado de corte na confeccao do vestuario', '760305', 0),
(447, 'ENCARREGADO DE COSTURA NA CONFECÇÃO DO VESTUÁRIO', 'encarregado de costura na confeccao do vestuario', '760310', 0),
(448, 'SUPERVISOR (INDÚSTRIA DE CALÇADOS E ARTEFATOS DE COURO)', 'supervisor (industria de calcados e artefatos de couro)', '760405', 0),
(449, 'SUPERVISOR DA CONFECÇÃO DE ARTEFATOS DE TECIDOS, COUROS E AFINS', 'supervisor da confeccao de artefatos de tecidos, couros e afins', '760505', 0),
(450, 'SUPERVISOR DAS ARTES GRÁFICAS (INDÚSTRIA EDITORIAL E GRÁFICA)', 'supervisor das artes graficas (industria editorial e grafica)', '760605', 0),
(451, 'OPERADOR POLIVALENTE DA INDÚSTRIA TÊXTIL', 'operador polivalente da industria textil', '761005', 0),
(452, 'CLASSIFICADOR DE FIBRAS TÊXTEIS', 'classificador de fibras texteis', '761105', 0),
(453, 'LAVADOR DE LA', 'lavador de la', '761110', 0),
(454, 'OPERADOR DE ABERTURA (FIAÇÃO)', 'operador de abertura (fiacao)', '761205', 0),
(455, 'OPERADOR DE BINADEIRA', 'operador de binadeira', '761210', 0),
(456, 'OPERADOR DE BOBINADEIRA', 'operador de bobinadeira', '761215', 0),
(457, 'OPERADOR DE CARDAS', 'operador de cardas', '761220', 0),
(458, 'OPERADOR DE CONICALEIRA', 'operador de conicaleira', '761225', 0),
(459, 'OPERADOR DE FILATÓRIO', 'operador de filatorio', '761230', 0),
(460, 'OPERADOR DE LAMINADEIRA E REUNIDEIRA', 'operador de laminadeira e reunideira', '761235', 0),
(461, 'OPERADOR DE MAÇAROQUEIRA', 'operador de macaroqueira', '761240', 0),
(462, 'OPERADOR DE OPEN-END', 'operador de open-end', '761245', 0),
(463, 'OPERADOR DE PASSADOR (FIAÇÃO)', 'operador de passador (fiacao)', '761250', 0),
(464, 'OPERADOR DE PENTEADEIRA', 'operador de penteadeira', '761255', 0),
(465, 'OPERADOR DE RETORCEDEIRA', 'operador de retorcedeira', '761260', 0),
(466, 'TECELÃO (REDES)', 'tecelao (redes)', '761303', 0),
(467, 'TECELÃO (RENDAS E BORDADOS)', 'tecelao (rendas e bordados)', '761306', 0),
(468, 'TECELÃO (TEAR AUTOMÁTICO)', 'tecelao (tear automatico)', '761309', 0),
(469, 'TECELÃO (TEAR JACQUARD)', 'tecelao (tear jacquard)', '761312', 0),
(470, 'TECELÃO (TEAR MECÂNICO DE MAQUINETA)', 'tecelao (tear mecanico de maquineta)', '761315', 0),
(471, 'TECELÃO (TEAR MECÂNICO DE XADREZ)', 'tecelao (tear mecanico de xadrez)', '761318', 0),
(472, 'TECELÃO (TEAR MECÂNICO LISO)', 'tecelao (tear mecanico liso)', '761321', 0),
(473, 'TECELÃO (TEAR MECÂNICO, EXCETO JACQUARD)', 'tecelao (tear mecanico, exceto jacquard)', '761324', 0),
(474, 'TECELÃO DE MALHAS, A MÁQUINA', 'tecelao de malhas, a maquina', '761327', 0),
(475, 'TECELÃO DE MALHAS (MÁQUINA CIRCULAR)', 'tecelao de malhas (maquina circular)', '761330', 0),
(476, 'TECELÃO DE MALHAS (MÁQUINA RETILÍNEA)', 'tecelao de malhas (maquina retilinea)', '761333', 0),
(477, 'TECELÃO DE MEIAS, A MÁQUINA', 'tecelao de meias, a maquina', '761336', 0),
(478, 'TECELÃO DE MEIAS (MÁQUINA CIRCULAR)', 'tecelao de meias (maquina circular)', '761339', 0),
(479, 'TECELÃO DE MEIAS (MÁQUINA RETILÍNEA)', 'tecelao de meias (maquina retilinea)', '761342', 0),
(480, 'TECELÃO DE TAPETES, A MÁQUINA', 'tecelao de tapetes, a maquina', '761345', 0),
(481, 'OPERADOR DE ENGOMADEIRA DE URDUME', 'operador de engomadeira de urdume', '761348', 0),
(482, 'OPERADOR DE ESPULADEIRA', 'operador de espuladeira', '761351', 0),
(483, 'OPERADOR DE MÁQUINA DE CORDOALHA', 'operador de maquina de cordoalha', '761354', 0),
(484, 'OPERADOR DE URDIDEIRA', 'operador de urdideira', '761357', 0),
(485, 'PASSAMANEIRO A MÁQUINA', 'passamaneiro a maquina', '761360', 0),
(486, 'REMETEDOR DE FIOS', 'remetedor de fios', '761363', 0),
(487, 'PICOTADOR DE CARTOES JACQUARD', 'picotador de cartoes jacquard', '761366', 0),
(488, 'ALVEJADOR (TECIDOS)', 'alvejador (tecidos)', '761405', 0),
(489, 'ESTAMPADOR DE TECIDO', 'estampador de tecido', '761410', 0),
(490, 'OPERADOR DE CALANDRAS (TECIDOS)', 'operador de calandras (tecidos)', '761415', 0),
(491, 'OPERADOR DE CHAMUSCADEIRA DE TECIDOS', 'operador de chamuscadeira de tecidos', '761420', 0),
(492, 'OPERADOR DE IMPERMEABILIZADOR DE TECIDOS', 'operador de impermeabilizador de tecidos', '761425', 0),
(493, 'OPERADOR DE MÁQUINA DE LAVAR FIOS E TECIDOS', 'operador de maquina de lavar fios e tecidos', '761430', 0),
(494, 'OPERADOR DE RAMEUSE', 'operador de rameuse', '761435', 0),
(495, 'INSPETOR DE ESTAMPARIA (PRODUÇÃO TÊXTIL)', 'inspetor de estamparia (producao textil)', '761805', 0),
(496, 'REVISOR DE FIOS (PRODUÇÃO TÊXTIL)', 'revisor de fios (producao textil)', '761810', 0),
(497, 'REVISOR DE TECIDOS ACABADOS', 'revisor de tecidos acabados', '761815', 0),
(498, 'REVISOR DE TECIDOS CRUS', 'revisor de tecidos crus', '761820', 0),
(499, 'TRABALHADOR POLIVALENTE DO CURTIMENTO DE COUROS E PELES', 'trabalhador polivalente do curtimento de couros e peles', '762005', 0),
(500, 'CLASSIFICADOR DE PELES', 'classificador de peles', '762105', 0),
(501, 'DESCARNADOR DE COUROS E PELES, À MAQUINA', 'descarnador de couros e peles, à maquina', '762110', 0),
(502, 'ESTIRADOR DE COUROS E PELES (PREPARAÇÃO)', 'estirador de couros e peles (preparacao)', '762115', 0),
(503, 'TÉCNICO GRÁFICO', 'tecnico grafico', '371310', 0),
(504, 'TÉCNICO EM PROGRAMAÇÃO VISUAL', 'tecnico em programacao visual', '371305', 0),
(505, 'RECREADOR DE ACANTONAMENTO', 'recreador de acantonamento', '371405', 0),
(506, 'RECREADOR', 'recreador', '371410', 0),
(507, 'DIRETOR DE FOTOGRAFIA', 'diretor de fotografia', '372105', 0),
(508, 'ILUMINADOR (TELEVISÃO)', 'iluminador (televisao)', '372110', 0),
(509, 'OPERADOR DE CÂMERA DE TELEVISÃO', 'operador de camera de televisao', '372115', 0),
(510, 'OPERADOR DE REDE DE TELEPROCESSAMENTO', 'operador de rede de teleprocessamento', '372205', 0),
(511, 'RADIOTELEGRAFISTA', 'radiotelegrafista', '372210', 0),
(512, 'OPERADOR DE ÁUDIO DE CONTINUIDADE (RÁDIO)', 'operador de audio de continuidade (radio)', '373105', 0),
(513, 'OPERADOR DE CENTRAL DE RÁDIO', 'operador de central de radio', '373110', 0),
(514, 'OPERADOR DE EXTERNA (RÁDIO)', 'operador de externa (radio)', '373115', 0),
(515, 'OPERADOR DE GRAVAÇÃO DE RÁDIO', 'operador de gravacao de radio', '373120', 0),
(516, 'OPERADOR DE TRANSMISSOR DE RÁDIO', 'operador de transmissor de radio', '373125', 0),
(517, 'TÉCNICO EM OPERAÇÃO DE EQUIPAMENTOS DE PRODUÇÃO PARA TELEVISÃO E PRODUTORAS DE VÍDEO', 'tecnico em operacao de equipamentos de producao para televisao e produtoras de video', '373205', 0),
(518, 'TÉCNICO EM OPERAÇÃO DE EQUIPAMENTO DE EXIBIÇÃO DE TELEVISÃO', 'tecnico em operacao de equipamento de exibicao de televisao', '373210', 0),
(519, 'TÉCNICO EM OPERAÇÃO DE EQUIPAMENTOS DE TRANSMISSÃO/RECEPÇÃO DE TELEVISÃO', 'tecnico em operacao de equipamentos de transmissao/recepcao de televisao', '373215', 0),
(520, 'SUPERVISOR TÉCNICO OPERACIONAL DE SISTEMAS DE TELEVISÃO E PRODUTORAS DE VÍDEO', 'supervisor tecnico operacional de sistemas de televisao e produtoras de video', '373220', 0),
(521, 'TÉCNICO EM GRAVAÇÃO DE ÁUDIO', 'tecnico em gravacao de audio', '374105', 0),
(522, 'TÉCNICO EM INSTALAÇÃO DE EQUIPAMENTOS DE ÁUDIO', 'tecnico em instalacao de equipamentos de audio', '374110', 0),
(523, 'TÉCNICO EM MASTERIZAÇÃO DE ÁUDIO', 'tecnico em masterizacao de audio', '374115', 0),
(524, 'PROJETISTA DE SOM', 'projetista de som', '374120', 0),
(525, 'TÉCNICO EM SONORIZAÇÃO', 'tecnico em sonorizacao', '374125', 0),
(526, 'TÉCNICO EM MIXAGEM DE ÁUDIO', 'tecnico em mixagem de audio', '374130', 0),
(527, 'PROJETISTA DE SISTEMAS DE ÁUDIO', 'projetista de sistemas de audio', '374135', 0),
(528, 'MICROFONISTA', 'microfonista', '374140', 0),
(529, 'DJ (DISC JOCKEY)', 'dj (disc jockey)', '374145', 0),
(530, 'CENOTÉCNICO (CINEMA, VÍDEO, TELEVISÃO, TEATRO E ESPETÁCULOS)', 'cenotecnico (cinema, video, televisao, teatro e espetaculos)', '374205', 0),
(531, 'MAQUINISTA DE CINEMA E VÍDEO', 'maquinista de cinema e video', '374210', 0),
(532, 'MAQUINISTA DE TEATRO E ESPETÁCULOS', 'maquinista de teatro e espetaculos', '374215', 0),
(533, 'OPERADOR DE PROJETOR CINEMATOGRÁFICO', 'operador de projetor cinematografico', '374305', 0),
(534, 'OPERADOR-MANTENEDOR DE PROJETOR CINEMATOGRÁFICO', 'operador-mantenedor de projetor cinematografico', '374310', 0),
(535, 'EDITOR DE TV E VÍDEO', 'editor de tv e video', '374405', 0),
(536, 'FINALIZADOR DE FILMES', 'finalizador de filmes', '374410', 0),
(537, 'FINALIZADOR DE VÍDEO', 'finalizador de video', '374415', 0),
(538, 'MONTADOR DE FILMES', 'montador de filmes', '374420', 0),
(539, 'DESIGNER DE INTERIORES', 'designer de interiores', '375105', 0),
(540, 'DESIGNER DE VITRINES', 'designer de vitrines', '375110', 0),
(541, 'VISUAL MERCHANDISER', 'visual merchandiser', '375115', 0),
(542, 'DECORADOR DE EVENTOS', 'decorador de eventos', '375120', 0),
(543, 'DANÇARINO TRADICIONAL', 'dancarino tradicional', '376105', 0),
(544, 'AFINADOR DE INSTRUMENTOS MUSICAIS', 'afinador de instrumentos musicais', '742105', 0),
(545, 'CONFECCIONADOR DE ACORDEÃO', 'confeccionador de acordeao', '742110', 0),
(546, 'CONFECCIONADOR DE INSTRUMENTOS DE CORDA', 'confeccionador de instrumentos de corda', '742115', 0),
(547, 'CONFECCIONADOR DE INSTRUMENTOS DE PERCUSSÃO (PELE, COURO OU PLÁSTICO)', 'confeccionador de instrumentos de percussao (pele, couro ou plastico)', '742120', 0),
(548, 'CONFECCIONADOR DE INSTRUMENTOS DE SOPRO (MADEIRA)', 'confeccionador de instrumentos de sopro (madeira)', '742125', 0),
(549, 'PRODUTOR NA OLERICULTURA DE RAÍZES, BULBOS E TUBÉRCULOS', 'produtor na olericultura de raizes, bulbos e tuberculos', '612310', 0),
(550, 'PRODUTOR NA OLERICULTURA DE TALOS, FOLHAS E FLORES', 'produtor na olericultura de talos, folhas e flores', '612315', 0),
(551, 'PRODUTOR NA OLERICULTURA DE FRUTOS E SEMENTES', 'produtor na olericultura de frutos e sementes', '612320', 0),
(552, 'PRODUTOR DE FLORES DE CORTE', 'produtor de flores de corte', '612405', 0),
(553, 'PRODUTOR DE FLORES EM VASO', 'produtor de flores em vaso', '612410', 0),
(554, 'PRODUTOR DE FORRAÇÕES', 'produtor de forracoes', '612415', 0),
(555, 'PRODUTOR DE PLANTAS ORNAMENTAIS', 'produtor de plantas ornamentais', '612420', 0),
(556, 'PRODUTOR DE ÁRVORES FRUTÍFERAS', 'produtor de arvores frutiferas', '612505', 0),
(557, 'PRODUTOR DE ESPÉCIES FRUTÍFERAS RASTEIRAS', 'produtor de especies frutiferas rasteiras', '612510', 0),
(558, 'PRODUTOR DE ESPÉCIES FRUTÍFERAS TREPADEIRAS', 'produtor de especies frutiferas trepadeiras', '612515', 0),
(559, 'PRODUTOR DE CACAU', 'produtor de cacau', '612610', 0),
(560, 'PRODUTOR DE ERVA-MATE', 'produtor de erva-mate', '612615', 0),
(561, 'PRODUTOR DE FUMO', 'produtor de fumo', '612620', 0),
(562, 'PRODUTOR DE GUARANÁ', 'produtor de guarana', '612625', 0),
(563, 'PRODUTOR DA CULTURA DE AMENDOIM', 'produtor da cultura de amendoim', '612705', 0),
(564, 'PRODUTOR DA CULTURA DE CANOLA', 'produtor da cultura de canola', '612710', 0),
(565, 'PRODUTOR DA CULTURA DE COCO-DA-BAIA', 'produtor da cultura de coco-da-baia', '612715', 0),
(566, 'PRODUTOR DA CULTURA DE DENDÊ', 'produtor da cultura de dende', '612720', 0),
(567, 'PRODUTOR DA CULTURA DE GIRASSOL', 'produtor da cultura de girassol', '612725', 0),
(568, 'PRODUTOR DA CULTURA DE LINHO', 'produtor da cultura de linho', '612730', 0),
(569, 'PRODUTOR DA CULTURA DE MAMONA', 'produtor da cultura de mamona', '612735', 0),
(570, 'PRODUTOR DA CULTURA DE SOJA', 'produtor da cultura de soja', '612740', 0),
(571, 'PRODUTOR DE ESPECIARIAS', 'produtor de especiarias', '612805', 0),
(572, 'OPERADOR DE TELEFÉRICO (PASSAGEIROS)', 'operador de teleferico (passageiros)', '782630', 0),
(573, 'PRODUTOR DE PLANTAS AROMÁTICAS E MEDICINAIS', 'produtor de plantas aromaticas e medicinais', '612810', 0),
(574, 'CRIADOR EM PECUÁRIA POLIVALENTE', 'criador em pecuaria polivalente', '613005', 0),
(575, 'CRIADOR DE ANIMAIS DOMÉSTICOS', 'criador de animais domesticos', '613010', 0),
(576, 'CRIADOR DE ASININOS E MUARES', 'criador de asininos e muares', '613105', 0),
(577, 'CRIADOR DE BOVINOS (CORTE)', 'criador de bovinos (corte)', '613110', 0),
(578, 'CRIADOR DE BOVINOS (LEITE)', 'criador de bovinos (leite)', '613115', 0),
(579, 'CRIADOR DE BUBALINOS (CORTE)', 'criador de bubalinos (corte)', '613120', 0),
(580, 'CRIADOR DE BUBALINOS (LEITE)', 'criador de bubalinos (leite)', '613125', 0),
(581, 'CRIADOR DE EQÜÍNOS', 'criador de eqüinos', '613130', 0),
(582, 'CRIADOR DE CAPRINOS', 'criador de caprinos', '613205', 0),
(583, 'CRIADOR DE OVINOS', 'criador de ovinos', '613210', 0),
(584, 'CRIADOR DE SUÍNOS', 'criador de suinos', '613215', 0),
(585, 'AVICULTOR', 'avicultor', '613305', 0),
(586, 'CUNICULTOR', 'cunicultor', '613310', 0),
(587, 'APICULTOR', 'apicultor', '613405', 0);
INSERT INTO `cbos` (`id`, `name`, `name_filter`, `code_2002`, `is_active`) VALUES
(588, 'CRIADOR DE ANIMAIS PRODUTORES DE VENENO', 'criador de animais produtores de veneno', '613410', 0),
(589, 'MINHOCULTOR', 'minhocultor', '613415', 0),
(590, 'SERICULTOR', 'sericultor', '613420', 0),
(591, 'SUPERVISOR DE EXPLORAÇÃO AGRÍCOLA', 'supervisor de exploracao agricola', '620105', 0),
(592, 'SUPERVISOR DE EXPLORAÇÃO AGROPECUÁRIA', 'supervisor de exploracao agropecuaria', '620110', 0),
(593, 'SUPERVISOR DE EXPLORAÇÃO PECUÁRIA', 'supervisor de exploracao pecuaria', '620115', 0),
(594, 'TRABALHADOR AGROPECUÁRIO EM GERAL', 'trabalhador agropecuario em geral', '621005', 0),
(595, 'CASEIRO (AGRICULTURA)', 'caseiro (agricultura)', '622005', 0),
(596, 'JARDINEIRO', 'jardineiro', '622010', 0),
(597, 'AUTOR-ROTEIRISTA', 'autor-roteirista', '261505', 0),
(598, 'CRÍTICO', 'critico', '261510', 0),
(599, 'ESCRITOR DE FICÇÃO', 'escritor de ficcao', '261515', 0),
(600, 'PREPARADOR DE ATLETA', 'preparador de atleta', '224115', 0),
(601, 'ESCRITOR DE NÃO FICÇÃO', 'escritor de nao ficcao', '261520', 0),
(602, 'POETA', 'poeta', '261525', 0),
(603, 'REDATOR DE TEXTOS TÉCNICOS', 'redator de textos tecnicos', '261530', 0),
(604, 'EDITOR DE JORNAL', 'editor de jornal', '261605', 0),
(605, 'EDITOR DE LIVRO', 'editor de livro', '261610', 0),
(606, 'EDITOR DE MÍDIA ELETRÔNICA', 'editor de midia eletronica', '261615', 0),
(607, 'FOTÓGRAFO', 'fotografo', '261805', 0),
(608, 'MESTRE SERRALHEIRO', 'mestre serralheiro', '720155', 0),
(609, 'DESENHISTA TÉCNICO', 'desenhista tecnico', '318005', 0),
(610, 'DESENHISTA COPISTA', 'desenhista copista', '318010', 0),
(611, 'FULONEIRO NO ACABAMENTO DE COUROS E PELES', 'fuloneiro no acabamento de couros e peles', '762310', 0),
(612, 'LIXADOR DE COUROS E PELES', 'lixador de couros e peles', '762315', 0),
(613, 'MATIZADOR DE COUROS E PELES', 'matizador de couros e peles', '762320', 0),
(614, 'OPERADOR DE MÁQUINAS DO ACABAMENTO DE COUROS E PELES', 'operador de maquinas do acabamento de couros e peles', '762325', 0),
(615, 'PRENSADOR DE COUROS E PELES', 'prensador de couros e peles', '762330', 0),
(616, 'PALECIONADOR DE COUROS E PELES', 'palecionador de couros e peles', '762335', 0),
(617, 'PREPARADOR DE COUROS CURTIDOS', 'preparador de couros curtidos', '762340', 0),
(618, 'VAQUEADOR DE COUROS E PELES', 'vaqueador de couros e peles', '762345', 0),
(619, 'ALFAIATE', 'alfaiate', '763005', 0),
(620, 'COSTUREIRA DE PEÇAS SOB ENCOMENDA', 'costureira de pecas sob encomenda', '763010', 0),
(621, 'COSTUREIRA DE REPARAÇÃO DE ROUPAS', 'costureira de reparacao de roupas', '763015', 0),
(622, 'COSTUREIRO DE ROUPA DE COURO E PELE', 'costureiro de roupa de couro e pele', '763020', 0),
(623, 'AUXILIAR DE CORTE (PREPARAÇÃO DA CONFECÇÃO DE ROUPAS)', 'auxiliar de corte (preparacao da confeccao de roupas)', '763105', 0),
(624, 'CORTADOR DE ROUPAS', 'cortador de roupas', '763110', 0),
(625, 'ENFESTADOR DE ROUPAS', 'enfestador de roupas', '763115', 0),
(626, 'RISCADOR DE ROUPAS', 'riscador de roupas', '763120', 0),
(627, 'AJUDANTE DE CONFECÇÃO', 'ajudante de confeccao', '763125', 0),
(628, 'COSTUREIRO DE ROUPAS DE COURO E PELE, A MÁQUINA NA CONFECÇÃO EM SÉRIE', 'costureiro de roupas de couro e pele, a maquina na confeccao em serie', '763205', 0),
(629, 'COSTUREIRO NA CONFECÇÃO EM SÉRIE', 'costureiro na confeccao em serie', '763210', 0),
(630, 'COSTUREIRO, A MÁQUINA NA CONFECÇÃO EM SÉRIE', 'costureiro, a maquina na confeccao em serie', '763215', 0),
(631, 'ARREMATADEIRA', 'arrematadeira', '763305', 0),
(632, 'BORDADOR, A MÁQUINA', 'bordador, a maquina', '763310', 0),
(633, 'MARCADOR DE PEÇAS CONFECCIONADAS PARA BORDAR', 'marcador de pecas confeccionadas para bordar', '763315', 0),
(634, 'OPERADOR DE MÁQUINA DE COSTURA DE ACABAMENTO', 'operador de maquina de costura de acabamento', '763320', 0),
(635, 'PASSADEIRA DE PEÇAS CONFECCIONADAS', 'passadeira de pecas confeccionadas', '763325', 0),
(636, 'TRABALHADOR POLIVALENTE DA CONFECÇÃO DE CALÇADOS', 'trabalhador polivalente da confeccao de calcados', '764005', 0),
(637, 'CORTADOR DE CALÇADOS, A MÁQUINA (EXCETO SOLAS E PALMILHAS)', 'cortador de calcados, a maquina (exceto solas e palmilhas)', '764105', 0),
(638, 'CORTADOR DE SOLAS E PALMILHAS, A MÁQUINA', 'cortador de solas e palmilhas, a maquina', '764110', 0),
(639, 'PREPARADOR DE CALÇADOS', 'preparador de calcados', '764115', 0),
(640, 'PREPARADOR DE SOLAS E PALMILHAS', 'preparador de solas e palmilhas', '764120', 0),
(641, 'COSTURADOR DE CALÇADOS, A MÁQUINA', 'costurador de calcados, a maquina', '764205', 0),
(642, 'MONTADOR DE CALÇADOS', 'montador de calcados', '764210', 0),
(643, 'ACABADOR DE CALÇADOS', 'acabador de calcados', '764305', 0),
(644, 'CONFECCIONADOR DE ARTEFATOS DE COURO (EXCETO SAPATOS)', 'confeccionador de artefatos de couro (exceto sapatos)', '765005', 0),
(645, 'MAQUINISTA DE TREM', 'maquinista de trem', '782610', 0),
(646, 'MAQUINISTA DE TREM METROPOLITANO', 'maquinista de trem metropolitano', '782615', 0),
(647, 'MOTORNEIRO', 'motorneiro', '782620', 0),
(648, 'AUXILIAR DE MAQUINISTA DE TREM', 'auxiliar de maquinista de trem', '782625', 0),
(649, 'MARINHEIRO DE CONVÉS (MARÍTIMO E FLUVIÁRIO)', 'marinheiro de conves (maritimo e fluviario)', '782705', 0),
(650, 'MARINHEIRO DE MÁQUINAS', 'marinheiro de maquinas', '782710', 0),
(651, 'MOÇO DE CONVÉS (MARÍTIMO E FLUVIÁRIO)', 'moco de conves (maritimo e fluviario)', '782715', 0),
(652, 'MOÇO DE MÁQUINAS (MARÍTIMO E FLUVIÁRIO)', 'moco de maquinas (maritimo e fluviario)', '782720', 0),
(653, 'MARINHEIRO DE ESPORTE E RECREIO', 'marinheiro de esporte e recreio', '782725', 0),
(654, 'CONDUTOR DE VEÍCULOS DE TRAÇÃO ANIMAL (RUAS E ESTRADAS)', 'condutor de veiculos de tracao animal (ruas e estradas)', '782805', 0),
(655, 'TROPEIRO', 'tropeiro', '782810', 0),
(656, 'SERRADOR DE MADEIRA (SERRA CIRCULAR MÚLTIPLA)', 'serrador de madeira (serra circular multipla)', '773125', 0),
(657, 'SERRADOR DE MADEIRA (SERRA DE FITA MÚLTIPLA)', 'serrador de madeira (serra de fita multipla)', '773130', 0),
(658, 'OPERADOR DE MÁQUINA INTERCALADORA E PLACAS (COMPENSADOS)', 'operador de maquina intercaladora e placas (compensados)', '773205', 0),
(659, 'PRENSISTA DE AGLOMERADOS', 'prensista de aglomerados', '773210', 0),
(660, 'PRENSISTA DE COMPENSADOS', 'prensista de compensados', '773215', 0),
(661, 'PREPARADOR DE AGLOMERANTES', 'preparador de aglomerantes', '773220', 0),
(662, 'OPERADOR DE DESEMPENADEIRA NA USINAGEM CONVENCIONAL DE MADEIRA', 'operador de desempenadeira na usinagem convencional de madeira', '773305', 0),
(663, 'OPERADOR DE ENTALHADEIRA (USINAGEM DE MADEIRA)', 'operador de entalhadeira (usinagem de madeira)', '773310', 0),
(664, 'OPERADOR DE FRESADORA (USINAGEM DE MADEIRA)', 'operador de fresadora (usinagem de madeira)', '773315', 0),
(665, 'OPERADOR DE LIXADEIRA (USINAGEM DE MADEIRA)', 'operador de lixadeira (usinagem de madeira)', '773320', 0),
(666, 'OPERADOR DE MÁQUINA DE USINAGEM MADEIRA, EM GERAL', 'operador de maquina de usinagem madeira, em geral', '773325', 0),
(667, 'OPERADOR DE MOLDURADORA (USINAGEM DE MADEIRA)', 'operador de molduradora (usinagem de madeira)', '773330', 0),
(668, 'OPERADOR DE PLAINA DESENGROSSADEIRA', 'operador de plaina desengrossadeira', '773335', 0),
(669, 'BORDADOR, A MÃO', 'bordador, a mao', '768205', 0),
(670, 'OPERADOR DE SERRAS (USINAGEM DE MADEIRA)', 'operador de serras (usinagem de madeira)', '773340', 0),
(671, 'OPERADOR DE TORNO AUTOMÁTICO (USINAGEM DE MADEIRA)', 'operador de torno automatico (usinagem de madeira)', '773345', 0),
(672, 'OPERADOR DE TUPIA (USINAGEM DE MADEIRA)', 'operador de tupia (usinagem de madeira)', '773350', 0),
(673, 'TORNEIRO NA USINAGEM CONVENCIONAL DE MADEIRA', 'torneiro na usinagem convencional de madeira', '773355', 0),
(674, 'OPERADOR DE MÁQUINA BORDATRIZ', 'operador de maquina bordatriz', '773405', 0),
(675, 'OPERADOR DE MÁQUINA DE CORTINA D#ÁGUA (PRODUÇÃO DE MÓVEIS)', 'operador de maquina de cortina d#agua (producao de moveis)', '773410', 0),
(676, 'OPERADOR DE MÁQUINA DE USINAGEM DE MADEIRA (PRODUÇÃO EM SÉRIE)', 'operador de maquina de usinagem de madeira (producao em serie)', '773415', 0),
(677, 'OPERADOR DE PRENSA DE ALTA FREQÜÊNCIA NA USINAGEM DE MADEIRA', 'operador de prensa de alta freqüencia na usinagem de madeira', '773420', 0),
(678, 'OPERADOR DE CENTRO DE USINAGEM DE MADEIRA (CNC)', 'operador de centro de usinagem de madeira (cnc)', '773505', 0),
(679, 'OPERADOR DE MÁQUINAS DE USINAR MADEIRA (CNC)', 'operador de maquinas de usinar madeira (cnc)', '773510', 0),
(680, 'MONTADOR DE MÓVEIS E ARTEFATOS DE MADEIRA', 'montador de moveis e artefatos de madeira', '774105', 0),
(681, 'ENTALHADOR DE MADEIRA', 'entalhador de madeira', '775105', 0),
(682, 'FOLHEADOR DE MÓVEIS DE MADEIRA', 'folheador de moveis de madeira', '775110', 0),
(683, 'LUSTRADOR DE PEÇAS DE MADEIRA', 'lustrador de pecas de madeira', '775115', 0),
(684, 'MARCHETEIRO', 'marcheteiro', '775120', 0),
(685, 'CESTEIRO', 'cesteiro', '776405', 0),
(686, 'CONFECCIONADOR DE ESCOVAS, PINCÉIS E PRODUTOS SIMILARES (A MÃO)', 'confeccionador de escovas, pinceis e produtos similares (a mao)', '776410', 0),
(687, 'ESTEIREIRO', 'esteireiro', '776425', 0),
(688, 'VASSOUREIRO', 'vassoureiro', '776430', 0),
(689, 'CONFECCIONADOR DE ESCOVAS, PINCÉIS E PRODUTOS SIMILARES (A MÁQUINA)', 'confeccionador de escovas, pinceis e produtos similares (a maquina)', '776415', 0),
(690, 'CONFECCIONADOR DE MÓVEIS DE VIME, JUNCO E BAMBU', 'confeccionador de moveis de vime, junco e bambu', '776420', 0),
(691, 'CARPINTEIRO NAVAL (CONSTRUÇÃO DE PEQUENAS EMBARCAÇÕES)', 'carpinteiro naval (construcao de pequenas embarcacoes)', '777105', 0),
(692, 'CARPINTEIRO NAVAL (EMBARCAÇÕES)', 'carpinteiro naval (embarcacoes)', '777110', 0),
(693, 'CARPINTEIRO NAVAL (ESTALEIROS)', 'carpinteiro naval (estaleiros)', '777115', 0),
(694, 'CARPINTEIRO DE CARRETAS', 'carpinteiro de carretas', '777205', 0),
(695, 'CARPINTEIRO DE CARROCERIAS', 'carpinteiro de carrocerias', '777210', 0),
(696, 'SUPERVISOR DE EMBALAGEM E ETIQUETAGEM', 'supervisor de embalagem e etiquetagem', '780105', 0),
(697, 'CONDUTOR DE PROCESSOS ROBOTIZADOS DE PINTURA', 'condutor de processos robotizados de pintura', '781105', 0),
(698, 'CONDUTOR DE PROCESSOS ROBOTIZADOS DE SOLDAGEM', 'condutor de processos robotizados de soldagem', '781110', 0),
(699, 'OPERADOR DE VEÍCULOS SUBAQUÁTICOS CONTROLADOS REMOTAMENTE', 'operador de veiculos subaquaticos controlados remotamente', '781305', 0),
(700, 'MERGULHADOR PROFISSIONAL (RASO E PROFUNDO)', 'mergulhador profissional (raso e profundo)', '781705', 0),
(701, 'OPERADOR DE DRAGA', 'operador de draga', '782105', 0),
(702, 'OPERADOR DE GUINDASTE (FIXO)', 'operador de guindaste (fixo)', '782110', 0),
(703, 'OPERADOR DE GUINDASTE MÓVEL', 'operador de guindaste movel', '782115', 0),
(704, 'OPERADOR DE MÁQUINA RODOFERROVIÁRIA', 'operador de maquina rodoferroviaria', '782120', 0),
(705, 'OPERADOR DE MONTA-CARGAS (CONSTRUÇÃO CIVIL)', 'operador de monta-cargas (construcao civil)', '782125', 0),
(706, 'OPERADOR DE PONTE ROLANTE', 'operador de ponte rolante', '782130', 0),
(707, 'OPERADOR DE PÓRTICO ROLANTE', 'operador de portico rolante', '782135', 0),
(708, 'OPERADOR DE TALHA ELÉTRICA', 'operador de talha eletrica', '782140', 0),
(709, 'SINALEIRO (PONTE-ROLANTE)', 'sinaleiro (ponte-rolante)', '782145', 0),
(710, 'GUINCHEIRO (CONSTRUÇÃO CIVIL)', 'guincheiro (construcao civil)', '782205', 0),
(711, 'OPERADOR DE DOCAGEM', 'operador de docagem', '782210', 0),
(712, 'OPERADOR DE EMPILHADEIRA', 'operador de empilhadeira', '782220', 0),
(713, 'MOTORISTA DE CARRO DE PASSEIO', 'motorista de carro de passeio', '782305', 0),
(714, 'MOTORISTA DE FURGÃO OU VEÍCULO SIMILAR', 'motorista de furgao ou veiculo similar', '782310', 0),
(715, 'MOTORISTA DE TÁXI', 'motorista de taxi', '782315', 0),
(716, 'MOTORISTA DE ÔNIBUS RODOVIÁRIO', 'motorista de onibus rodoviario', '782405', 0),
(717, 'MOTORISTA DE ÔNIBUS URBANO', 'motorista de onibus urbano', '782410', 0),
(718, 'MOTORISTA DE TRÓLEBUS', 'motorista de trolebus', '782415', 0),
(719, 'CAMINHONEIRO AUTÔNOMO (ROTAS REGIONAIS E INTERNACIONAIS)', 'caminhoneiro autonomo (rotas regionais e internacionais)', '782505', 0),
(720, 'MOTORISTA DE CAMINHÃO (ROTAS REGIONAIS E INTERNACIONAIS)', 'motorista de caminhao (rotas regionais e internacionais)', '782510', 0),
(721, 'MOTORISTA OPERACIONAL DE GUINCHO', 'motorista operacional de guincho', '782515', 0),
(722, 'OPERADOR DE TREM DE METRÔ', 'operador de trem de metro', '782605', 0),
(723, 'TRABALHADOR DA EXPLORAÇÃO DE CARNAÚBA', 'trabalhador da exploracao de carnauba', '632325', 0),
(724, 'TRABALHADOR DA EXPLORAÇÃO DE COCO-DA-PRAIA', 'trabalhador da exploracao de coco-da-praia', '632330', 0),
(725, 'TRABALHADOR DA EXPLORAÇÃO DE COPAÍBA', 'trabalhador da exploracao de copaiba', '632335', 0),
(726, 'TRABALHADOR DA PECUÁRIA (BOVINOS LEITE)', 'trabalhador da pecuaria (bovinos leite)', '623115', 0),
(727, 'TRABALHADOR DA PECUÁRIA (BUBALINOS)', 'trabalhador da pecuaria (bubalinos)', '623120', 0),
(728, 'TRABALHADOR DA PECUÁRIA (EQÜINOS)', 'trabalhador da pecuaria (eqüinos)', '623125', 0),
(729, 'TRABALHADOR DA CAPRINOCULTURA', 'trabalhador da caprinocultura', '623205', 0),
(730, 'TRABALHADOR DA OVINOCULTURA', 'trabalhador da ovinocultura', '623210', 0),
(731, 'TRABALHADOR DA SUINOCULTURA', 'trabalhador da suinocultura', '623215', 0),
(732, 'TRABALHADOR DA AVICULTURA DE CORTE', 'trabalhador da avicultura de corte', '623305', 0),
(733, 'OPERADOR DE INCUBADORA', 'operador de incubadora', '623315', 0),
(734, 'TRABALHADOR DA AVICULTURA DE POSTURA', 'trabalhador da avicultura de postura', '623310', 0),
(735, 'TRABALHADOR DA CUNICULTURA', 'trabalhador da cunicultura', '623320', 0),
(736, 'SEXADOR', 'sexador', '623325', 0),
(737, 'TRABALHADOR EM CRIATÓRIOS DE ANIMAIS PRODUTORES DE VENENO', 'trabalhador em criatorios de animais produtores de veneno', '623405', 0),
(738, 'TRABALHADOR NA APICULTURA', 'trabalhador na apicultura', '623410', 0),
(739, 'TRABALHADOR NA MINHOCULTURA', 'trabalhador na minhocultura', '623415', 0),
(740, 'TRABALHADOR NA SERICICULTURA', 'trabalhador na sericicultura', '623420', 0),
(741, 'SUPERVISOR DA AQÜICULTURA', 'supervisor da aqüicultura', '630105', 0),
(742, 'SUPERVISOR DA ÁREA FLORESTAL', 'supervisor da area florestal', '630110', 0),
(743, 'CATADOR DE CARANGUEJOS E SIRIS', 'catador de caranguejos e siris', '631005', 0),
(744, 'CATADOR DE MARISCOS', 'catador de mariscos', '631010', 0),
(745, 'PESCADOR ARTESANAL DE LAGOSTAS', 'pescador artesanal de lagostas', '631015', 0),
(746, 'MONTADOR DE EQUIPAMENTOS ELÉTRICOS (TRANSFORMADORES)', 'montador de equipamentos eletricos (transformadores)', '731160', 0),
(747, 'BOBINADOR ELETRICISTA, A MÃO', 'bobinador eletricista, a mao', '731165', 0),
(748, 'BOBINADOR ELETRICISTA, A MÁQUINA', 'bobinador eletricista, a maquina', '731170', 0),
(749, 'OPERADOR DE LINHA DE MONTAGEM (APARELHOS ELÉTRICOS)', 'operador de linha de montagem (aparelhos eletricos)', '731175', 0),
(750, 'OPERADOR DE LINHA DE MONTAGEM (APARELHOS ELETRÔNICOS)', 'operador de linha de montagem (aparelhos eletronicos)', '731180', 0),
(751, 'MONTADOR DE EQUIPAMENTOS ELETRÔNICOS (ESTAÇÃO DE RÁDIO, TV E EQUIPAMENTOS DE RADAR)', 'montador de equipamentos eletronicos (estacao de radio, tv e equipamentos de radar)', '731205', 0),
(752, 'INSTALADOR-REPARADOR DE EQUIPAMENTOS DE COMUTAÇÃO EM TELEFONIA', 'instalador-reparador de equipamentos de comutacao em telefonia', '731305', 0),
(753, 'INSTALADOR-REPARADOR DE EQUIPAMENTOS DE ENERGIA EM TELEFONIA', 'instalador-reparador de equipamentos de energia em telefonia', '731310', 0),
(754, 'INSTALADOR-REPARADOR DE EQUIPAMENTOS DE TRANSMISSÃO EM TELEFONIA', 'instalador-reparador de equipamentos de transmissao em telefonia', '731315', 0),
(755, 'INSTALADOR-REPARADOR DE LINHAS E APARELHOS DE TELECOMUNICAÇÕES', 'instalador-reparador de linhas e aparelhos de telecomunicacoes', '731320', 0),
(756, 'INSTALADOR-REPARADOR DE REDES E CABOS TELEFÔNICOS', 'instalador-reparador de redes e cabos telefonicos', '731325', 0),
(757, 'REPARADOR DE APARELHOS DE TELECOMUNICAÇÕES EM LABORATÓRIO', 'reparador de aparelhos de telecomunicacoes em laboratorio', '731330', 0),
(758, 'ELETRICISTA DE MANUTENÇÃO DE LINHAS ELÉTRICAS, TELEFÔNICAS E DE COMUNICAÇÃO DE DADOS', 'eletricista de manutencao de linhas eletricas, telefonicas e de comunicacao de dados', '732105', 0),
(759, 'EMENDADOR DE CABOS ELÉTRICOS E TELEFÔNICOS (AÉREOS E SUBTERRÂNEOS)', 'emendador de cabos eletricos e telefonicos (aereos e subterraneos)', '732110', 0),
(760, 'EXAMINADOR DE CABOS, LINHAS ELÉTRICAS E TELEFÔNICAS', 'examinador de cabos, linhas eletricas e telefonicas', '732115', 0),
(761, 'INSTALADOR DE LINHAS ELÉTRICAS DE ALTA E BAIXA-TENSÃO (REDE AÉREA E SUBTERRÂNEA)', 'instalador de linhas eletricas de alta e baixa-tensao (rede aerea e subterranea)', '732120', 0),
(762, 'INSTALADOR ELETRICISTA (TRAÇÃO DE VEÍCULOS)', 'instalador eletricista (tracao de veiculos)', '732125', 0),
(763, 'OPERADOR DE TIME DE MONTAGEM', 'operador de time de montagem', '725510', 0),
(764, 'INSTALADOR-REPARADOR DE REDES TELEFÔNICAS E DE COMUNICAÇÃO DE DADOS', 'instalador-reparador de redes telefonicas e de comunicacao de dados', '732130', 0),
(765, 'LIGADOR DE LINHAS TELEFÔNICAS', 'ligador de linhas telefonicas', '732135', 0),
(766, 'SUPERVISOR DA MECÂNICA DE PRECISÃO', 'supervisor da mecanica de precisao', '740105', 0),
(767, 'SUPERVISOR DE FABRICAÇÃO DE INSTRUMENTOS MUSICAIS', 'supervisor de fabricacao de instrumentos musicais', '740110', 0),
(768, 'AJUSTADOR DE INSTRUMENTOS DE PRECISÃO', 'ajustador de instrumentos de precisao', '741105', 0),
(769, 'MONTADOR DE INSTRUMENTOS DE ÓPTICA', 'montador de instrumentos de optica', '741110', 0),
(770, 'MONTADOR DE INSTRUMENTOS DE PRECISÃO', 'montador de instrumentos de precisao', '741115', 0),
(771, 'RELOJOEIRO (FABRICAÇÃO)', 'relojoeiro (fabricacao)', '741120', 0),
(772, 'RELOJOEIRO (REPARAÇÃO)', 'relojoeiro (reparacao)', '741125', 0),
(773, 'TRABALHADOR DO ACABAMENTO DE ARTEFATOS DE TECIDOS E COUROS', 'trabalhador do acabamento de artefatos de tecidos e couros', '765405', 0),
(774, 'COPIADOR DE CHAPA', 'copiador de chapa', '766105', 0),
(775, 'GRAVADOR DE MATRIZ PARA FLEXOGRAFIA (CLICHERISTA)', 'gravador de matriz para flexografia (clicherista)', '766115', 0),
(776, 'EDITOR DE TEXTO E IMAGEM', 'editor de texto e imagem', '766120', 0),
(777, 'MONTADOR DE FOTOLITO (ANALÓGICO E DIGITAL)', 'montador de fotolito (analogico e digital)', '766125', 0),
(778, 'GRAVADOR DE MATRIZ PARA ROTOGRAVURA (ELETROMECÂNICO E QUÍMICO)', 'gravador de matriz para rotogravura (eletromecanico e quimico)', '766130', 0),
(779, 'GRAVADOR DE MATRIZ CALCOGRÁFICA', 'gravador de matriz calcografica', '766135', 0),
(780, 'GRAVADOR DE MATRIZ SERIGRÁFICA', 'gravador de matriz serigrafica', '766140', 0),
(781, 'OPERADOR DE SISTEMAS DE PROVA (ANALÓGICO E DIGITAL)', 'operador de sistemas de prova (analogico e digital)', '766145', 0),
(782, 'OPERADOR DE PROCESSO DE TRATAMENTO DE IMAGEM', 'operador de processo de tratamento de imagem', '766150', 0),
(783, 'PROGRAMADOR VISUAL GRÁFICO', 'programador visual grafico', '766155', 0),
(784, 'IMPRESSOR (SERIGRAFIA)', 'impressor (serigrafia)', '766205', 0),
(785, 'IMPRESSOR CALCOGRÁFICO', 'impressor calcografico', '766210', 0),
(786, 'IMPRESSOR DE OFSETE (PLANO E ROTATIVO)', 'impressor de ofsete (plano e rotativo)', '766215', 0),
(787, 'IMPRESSOR DE ROTATIVA', 'impressor de rotativa', '766220', 0),
(788, 'IMPRESSOR DE ROTOGRAVURA', 'impressor de rotogravura', '766225', 0),
(789, 'IMPRESSOR DIGITAL', 'impressor digital', '766230', 0),
(790, 'MESTRE (INDÚSTRIA DE AUTOMOTORES E MATERIAL DE TRANSPORTES)', 'mestre (industria de automotores e material de transportes)', '720210', 0),
(791, 'MESTRE (INDÚSTRIA DE MÁQUINAS E OUTROS EQUIPAMENTOS MECÂNICOS)', 'mestre (industria de maquinas e outros equipamentos mecanicos)', '720215', 0),
(792, 'MESTRE DE CONSTRUÇÃO DE FORNOS', 'mestre de construcao de fornos', '720220', 0),
(793, 'FERRAMENTEIRO DE MANDRIS, CALIBRADORES E OUTROS DISPOSITIVOS', 'ferramenteiro de mandris, calibradores e outros dispositivos', '721110', 0),
(794, 'MODELADOR DE METAIS (FUNDIÇÃO)', 'modelador de metais (fundicao)', '721115', 0),
(795, 'OPERADOR DE MÁQUINA DE ELETROEROSÃO', 'operador de maquina de eletroerosao', '721205', 0),
(796, 'OPERADOR DE MÁQUINAS OPERATRIZES', 'operador de maquinas operatrizes', '721210', 0),
(797, 'OPERADOR DE MÁQUINAS-FERRAMENTA CONVENCIONAIS', 'operador de maquinas-ferramenta convencionais', '721215', 0),
(798, 'OPERADOR DE USINAGEM CONVENCIONAL POR ABRASÃO', 'operador de usinagem convencional por abrasao', '721220', 0),
(799, 'PREPARADOR DE MÁQUINAS-FERRAMENTA', 'preparador de maquinas-ferramenta', '721225', 0),
(800, 'AFIADOR DE CARDAS', 'afiador de cardas', '721305', 0),
(801, 'AFIADOR DE CUTELARIA', 'afiador de cutelaria', '721310', 0),
(802, 'AFIADOR DE FERRAMENTAS', 'afiador de ferramentas', '721315', 0),
(803, 'AFIADOR DE SERRAS', 'afiador de serras', '721320', 0),
(804, 'POLIDOR DE METAIS', 'polidor de metais', '721325', 0),
(805, 'PEDICURE', 'pedicure', '516140', 0),
(806, 'OPERADOR DE CENTRO DE USINAGEM COM COMANDO NUMÉRICO', 'operador de centro de usinagem com comando numerico', '721405', 0),
(807, 'OPERADOR DE FRESADORA COM COMANDO NUMÉRICO', 'operador de fresadora com comando numerico', '721410', 0),
(808, 'OPERADOR DE MANDRILADORA COM COMANDO NUMÉRICO', 'operador de mandriladora com comando numerico', '721415', 0),
(809, 'OPERADOR DE MÁQUINA ELETROEROSÃO, À FIO, COM COMANDO NUMÉRICO', 'operador de maquina eletroerosao, à fio, com comando numerico', '721420', 0),
(810, 'OPERADOR DE RETIFICADORA COM COMANDO NUMÉRICO', 'operador de retificadora com comando numerico', '721425', 0),
(811, 'OPERADOR DE TORNO COM COMANDO NUMÉRICO', 'operador de torno com comando numerico', '721430', 0),
(812, 'FORJADOR', 'forjador', '722105', 0),
(813, 'FORJADOR A MARTELO', 'forjador a martelo', '722110', 0),
(814, 'FORJADOR PRENSISTA', 'forjador prensista', '722115', 0),
(815, 'FUNDIDOR DE METAIS', 'fundidor de metais', '722205', 0),
(816, 'LINGOTADOR', 'lingotador', '722210', 0),
(817, 'OPERADOR DE ACABAMENTO DE PEÇAS FUNDIDAS', 'operador de acabamento de pecas fundidas', '722215', 0),
(818, 'OPERADOR DE MÁQUINA CENTRIFUGADORA DE FUNDIÇÃO', 'operador de maquina centrifugadora de fundicao', '722220', 0),
(819, 'OPERADOR DE MÁQUINA DE FUNDIR SOB PRESSÃO', 'operador de maquina de fundir sob pressao', '722225', 0),
(820, 'OPERADOR DE VAZAMENTO (LINGOTAMENTO)', 'operador de vazamento (lingotamento)', '722230', 0),
(821, 'PREPARADOR DE PANELAS (LINGOTAMENTO)', 'preparador de panelas (lingotamento)', '722235', 0),
(822, 'MACHEIRO, A MÃO', 'macheiro, a mao', '722305', 0),
(823, 'MACHEIRO, A MÁQUINA', 'macheiro, a maquina', '722310', 0),
(824, 'MOLDADOR, A MÃO', 'moldador, a mao', '722315', 0),
(825, 'MOLDADOR, A MÁQUINA', 'moldador, a maquina', '722320', 0),
(826, 'OPERADOR DE EQUIPAMENTOS DE PREPARAÇÃO DE AREIA', 'operador de equipamentos de preparacao de areia', '722325', 0),
(827, 'PESCADOR ARTESANAL DE PEIXES E CAMAROES', 'pescador artesanal de peixes e camaroes', '631020', 0),
(828, 'PESCADOR ARTESANAL DE ÁGUA DOCE', 'pescador artesanal de agua doce', '631105', 0),
(829, 'PESCADOR INDUSTRIAL', 'pescador industrial', '631205', 0),
(830, 'PESCADOR PROFISSIONAL', 'pescador profissional', '631210', 0),
(831, 'CRIADOR DE CAMAROES', 'criador de camaroes', '631305', 0),
(832, 'CRIADOR DE JACARÉS', 'criador de jacares', '631310', 0),
(833, 'CRIADOR DE MEXILHOES', 'criador de mexilhoes', '631315', 0),
(834, 'CRIADOR DE OSTRAS', 'criador de ostras', '631320', 0),
(835, 'CRIADOR DE PEIXES', 'criador de peixes', '631325', 0),
(836, 'CRIADOR DE QUELÔNIOS', 'criador de quelonios', '631330', 0),
(837, 'CRIADOR DE RAS', 'criador de ras', '631335', 0),
(838, 'GELADOR INDUSTRIAL', 'gelador industrial', '631405', 0),
(839, 'GELADOR PROFISSIONAL', 'gelador profissional', '631410', 0),
(840, 'MONTADOR DE MÁQUINAS TÊXTEIS', 'montador de maquinas texteis', '725220', 0),
(841, 'MONTADOR DE MÁQUINAS-FERRAMENTAS (USINAGEM DE METAIS)', 'montador de maquinas-ferramentas (usinagem de metais)', '725225', 0),
(842, 'MONTADOR DE EQUIPAMENTO DE LEVANTAMENTO', 'montador de equipamento de levantamento', '725305', 0),
(843, 'MONTADOR DE MÁQUINAS AGRÍCOLAS', 'montador de maquinas agricolas', '725310', 0),
(844, 'MONTADOR DE MÁQUINAS DE MINAS E PEDREIRAS', 'montador de maquinas de minas e pedreiras', '725315', 0),
(845, 'MONTADOR DE MÁQUINAS DE TERRAPLENAGEM', 'montador de maquinas de terraplenagem', '725320', 0),
(846, 'MECÂNICO MONTADOR DE MOTORES DE AERONAVES', 'mecanico montador de motores de aeronaves', '725405', 0),
(847, 'MECÂNICO MONTADOR DE MOTORES DE EMBARCAÇÕES', 'mecanico montador de motores de embarcacoes', '725410', 0),
(848, 'MECÂNICO MONTADOR DE MOTORES DE EXPLOSÃO E DIESEL', 'mecanico montador de motores de explosao e diesel', '725415', 0),
(849, 'MECÂNICO MONTADOR DE TURBOALIMENTADORES', 'mecanico montador de turboalimentadores', '725420', 0),
(850, 'MONTADOR DE VEÍCULOS (LINHA DE MONTAGEM)', 'montador de veiculos (linha de montagem)', '725505', 0),
(851, 'MONTADOR DE ESTRUTURAS DE AERONAVES', 'montador de estruturas de aeronaves', '725605', 0),
(852, 'MONTADOR DE SISTEMAS DE COMBUSTÍVEL DE AERONAVES', 'montador de sistemas de combustivel de aeronaves', '725610', 0),
(853, 'CHAPEADOR DE AERONAVES', 'chapeador de aeronaves', '724430', 0),
(854, 'MECÂNICO DE REFRIGERAÇÃO', 'mecanico de refrigeracao', '725705', 0),
(855, 'SUPERVISOR DE MONTAGEM E INSTALAÇÃO ELETROELETRÔNICA', 'supervisor de montagem e instalacao eletroeletronica', '730105', 0),
(856, 'MONTADOR DE EQUIPAMENTOS ELETRÔNICOS (APARELHOS MÉDICOS)', 'montador de equipamentos eletronicos (aparelhos medicos)', '731105', 0),
(857, 'MONTADOR DE EQUIPAMENTOS ELETRÔNICOS (COMPUTADORES E EQUIPAMENTOS AUXILIARES)', 'montador de equipamentos eletronicos (computadores e equipamentos auxiliares)', '731110', 0),
(858, 'MONTADOR DE EQUIPAMENTOS ELÉTRICOS (INSTRUMENTOS DE MEDIÇÃO)', 'montador de equipamentos eletricos (instrumentos de medicao)', '731115', 0),
(859, 'MONTADOR DE EQUIPAMENTOS ELÉTRICOS (APARELHOS ELETRODOMÉSTICOS)', 'montador de equipamentos eletricos (aparelhos eletrodomesticos)', '731120', 0),
(860, 'MONTADOR DE EQUIPAMENTOS ELÉTRICOS (CENTRAIS ELÉTRICAS)', 'montador de equipamentos eletricos (centrais eletricas)', '731125', 0),
(861, 'MONTADOR DE EQUIPAMENTOS ELÉTRICOS (MOTORES E DÍNAMOS)', 'montador de equipamentos eletricos (motores e dinamos)', '731130', 0),
(862, 'MONTADOR DE EQUIPAMENTOS ELÉTRICOS', 'montador de equipamentos eletricos', '731135', 0),
(863, 'MONTADOR DE EQUIPAMENTOS ELETRÔNICOS (INSTALAÇÕES DE SINALIZAÇÃO)', 'montador de equipamentos eletronicos (instalacoes de sinalizacao)', '731140', 0),
(864, 'MONTADOR DE EQUIPAMENTOS ELETRÔNICOS (MÁQUINAS INDUSTRIAIS)', 'montador de equipamentos eletronicos (maquinas industriais)', '731145', 0),
(865, 'MONTADOR DE EQUIPAMENTOS ELETRÔNICOS', 'montador de equipamentos eletronicos', '731150', 0),
(866, 'MONTADOR DE EQUIPAMENTOS ELÉTRICOS (ELEVADORES E EQUIPAMENTOS SIMILARES)', 'montador de equipamentos eletricos (elevadores e equipamentos similares)', '731155', 0),
(867, 'FULONEIRO', 'fuloneiro', '762120', 0),
(868, 'RACHADOR DE COUROS E PELES', 'rachador de couros e peles', '762125', 0),
(869, 'CURTIDOR (COUROS E PELES)', 'curtidor (couros e peles)', '762205', 0),
(870, 'CLASSIFICADOR DE COUROS', 'classificador de couros', '762210', 0),
(871, 'ENXUGADOR DE COUROS', 'enxugador de couros', '762215', 0),
(872, 'REBAIXADOR DE COUROS', 'rebaixador de couros', '762220', 0),
(873, 'ESTIRADOR DE COUROS E PELES (ACABAMENTO)', 'estirador de couros e peles (acabamento)', '762305', 0),
(874, 'METALIZADOR A PISTOLA', 'metalizador a pistola', '723220', 0),
(875, 'METALIZADOR (BANHO QUENTE)', 'metalizador (banho quente)', '723225', 0),
(876, 'OPERADOR DE MÁQUINA RECOBRIDORA DE ARAME', 'operador de maquina recobridora de arame', '723230', 0),
(877, 'OPERADOR DE ZINCAGEM (PROCESSO ELETROLÍTICO)', 'operador de zincagem (processo eletrolitico)', '723235', 0),
(878, 'OXIDADOR', 'oxidador', '723240', 0),
(879, 'OPERADOR DE EQUIPAMENTO DE SECAGEM DE PINTURA', 'operador de equipamento de secagem de pintura', '723305', 0),
(880, 'PINTOR A PINCEL E ROLO (EXCETO OBRAS E ESTRUTURAS METÁLICAS)', 'pintor a pincel e rolo (exceto obras e estruturas metalicas)', '723310', 0),
(881, 'PINTOR DE ESTRUTURAS METÁLICAS', 'pintor de estruturas metalicas', '723315', 0),
(882, 'PINTOR DE VEÍCULOS (FABRICAÇÃO)', 'pintor de veiculos (fabricacao)', '723320', 0),
(883, 'PINTOR POR IMERSÃO', 'pintor por imersao', '723325', 0),
(884, 'PINTOR, A PISTOLA (EXCETO OBRAS E ESTRUTURAS METÁLICAS)', 'pintor, a pistola (exceto obras e estruturas metalicas)', '723330', 0),
(885, 'ASSENTADOR DE CANALIZAÇÃO (EDIFICAÇÕES)', 'assentador de canalizacao (edificacoes)', '724105', 0),
(886, 'ENCANADOR', 'encanador', '724110', 0),
(887, 'INSTALADOR DE TUBULAÇÕES', 'instalador de tubulacoes', '724115', 0),
(888, 'INSTALADOR DE TUBULAÇÕES (AERONAVES)', 'instalador de tubulacoes (aeronaves)', '724120', 0),
(889, 'LUDOMOTRICISTA', 'ludomotricista', '224110', 0),
(890, 'INSTALADOR DE TUBULAÇÕES (EMBARCAÇÕES)', 'instalador de tubulacoes (embarcacoes)', '724125', 0),
(891, 'INSTALADOR DE TUBULAÇÕES DE GÁS COMBUSTÍVEL (PRODUÇÃO E DISTRIBUIÇÃO)', 'instalador de tubulacoes de gas combustivel (producao e distribuicao)', '724130', 0),
(892, 'INSTALADOR DE TUBULAÇÕES DE VAPOR (PRODUÇÃO E DISTRIBUIÇÃO)', 'instalador de tubulacoes de vapor (producao e distribuicao)', '724135', 0),
(893, 'MONTADOR DE ESTRUTURAS METÁLICAS', 'montador de estruturas metalicas', '724205', 0),
(894, 'MONTADOR DE ESTRUTURAS METÁLICAS DE EMBARCAÇÕES', 'montador de estruturas metalicas de embarcacoes', '724210', 0),
(895, 'REBITADOR A MARTELO PNEUMÁTICO', 'rebitador a martelo pneumatico', '724215', 0),
(896, 'PREPARADOR DE ESTRUTURAS METÁLICAS', 'preparador de estruturas metalicas', '724220', 0),
(897, 'RISCADOR DE ESTRUTURAS METÁLICAS', 'riscador de estruturas metalicas', '724225', 0),
(898, 'REBITADOR, A MÃO', 'rebitador, a mao', '724230', 0),
(899, 'BRASADOR', 'brasador', '724305', 0),
(900, 'OXICORTADOR A MÃO E A MÁQUINA', 'oxicortador a mao e a maquina', '724310', 0),
(901, 'SOLDADOR', 'soldador', '724315', 0),
(902, 'SOLDADOR A OXIGÁS', 'soldador a oxigas', '724320', 0),
(903, 'SOLDADOR ELÉTRICO', 'soldador eletrico', '724325', 0),
(904, 'CALDEIREIRO (CHAPAS DE COBRE)', 'caldeireiro (chapas de cobre)', '724405', 0),
(905, 'CALDEIREIRO (CHAPAS DE FERRO E AÇO)', 'caldeireiro (chapas de ferro e aco)', '724410', 0),
(906, 'CHAPEADOR', 'chapeador', '724415', 0),
(907, 'CHAPEADOR DE CARROCERIAS METÁLICAS (FABRICAÇÃO)', 'chapeador de carrocerias metalicas (fabricacao)', '724420', 0),
(908, 'CHAPEADOR NAVAL', 'chapeador naval', '724425', 0),
(909, 'FUNILEIRO INDUSTRIAL', 'funileiro industrial', '724435', 0),
(910, 'SERRALHEIRO', 'serralheiro', '724440', 0),
(911, 'OPERADOR DE MÁQUINA DE CILINDRAR CHAPAS', 'operador de maquina de cilindrar chapas', '724505', 0),
(912, 'OPERADOR DE MÁQUINA DE DOBRAR CHAPAS', 'operador de maquina de dobrar chapas', '724510', 0),
(913, 'PRENSISTA (OPERADOR DE PRENSA)', 'prensista (operador de prensa)', '724515', 0),
(914, 'OPERADOR DE LAÇOS DE CABOS DE AÇO', 'operador de lacos de cabos de aco', '724605', 0),
(915, 'TRANÇADOR DE CABOS DE AÇO', 'trancador de cabos de aco', '724610', 0),
(916, 'AJUSTADOR FERRAMENTEIRO', 'ajustador ferramenteiro', '725005', 0),
(917, 'AJUSTADOR MECÂNICO', 'ajustador mecanico', '725010', 0),
(918, 'AJUSTADOR MECÂNICO (USINAGEM EM BANCADA E EM MÁQUINAS-FERRAMENTAS)', 'ajustador mecanico (usinagem em bancada e em maquinas-ferramentas)', '725015', 0),
(919, 'AJUSTADOR MECÂNICO EM BANCADA', 'ajustador mecanico em bancada', '725020', 0),
(920, 'AJUSTADOR NAVAL (REPARO E CONSTRUÇÃO)', 'ajustador naval (reparo e construcao)', '725025', 0),
(921, 'MONTADOR DE MÁQUINAS, MOTORES E ACESSÓRIOS (MONTAGEM EM SÉRIE)', 'montador de maquinas, motores e acessorios (montagem em serie)', '725105', 0),
(922, 'MONTADOR DE MÁQUINAS', 'montador de maquinas', '725205', 0),
(923, 'MONTADOR DE MÁQUINAS GRÁFICAS', 'montador de maquinas graficas', '725210', 0),
(924, 'MONTADOR DE MÁQUINAS OPERATRIZES PARA MADEIRA', 'montador de maquinas operatrizes para madeira', '725215', 0),
(925, 'IMPRESSOR FLEXOGRÁFICO', 'impressor flexografico', '766235', 0),
(926, 'IMPRESSOR LETTERSET', 'impressor letterset', '766240', 0),
(927, 'IMPRESSOR TAMPOGRÁFICO', 'impressor tampografico', '766245', 0),
(928, 'IMPRESSOR TIPOGRÁFICO', 'impressor tipografico', '766250', 0),
(929, 'ACABADOR DE EMBALAGENS (FLEXÍVEIS E CARTOTÉCNICAS)', 'acabador de embalagens (flexiveis e cartotecnicas)', '766305', 0),
(930, 'IMPRESSOR DE CORTE E VINCO', 'impressor de corte e vinco', '766310', 0),
(931, 'OPERADOR DE ACABAMENTO (INDÚSTRIA GRÁFICA)', 'operador de acabamento (industria grafica)', '766315', 0),
(932, 'OPERADOR DE GUILHOTINA (CORTE DE PAPEL)', 'operador de guilhotina (corte de papel)', '766320', 0),
(933, 'PREPARADOR DE MATRIZES DE CORTE E VINCO', 'preparador de matrizes de corte e vinco', '766325', 0),
(934, 'LABORATORISTA FOTOGRÁFICO', 'laboratorista fotografico', '766405', 0),
(935, 'REVELADOR DE FILMES FOTOGRÁFICOS, EM PRETO E BRANCO', 'revelador de filmes fotograficos, em preto e branco', '766410', 0),
(936, 'REVELADOR DE FILMES FOTOGRÁFICOS, EM CORES', 'revelador de filmes fotograficos, em cores', '766415', 0),
(937, 'AUXILIAR DE RADIOLOGIA (REVELAÇÃO FOTOGRÁFICA)', 'auxiliar de radiologia (revelacao fotografica)', '766420', 0),
(938, 'TECELÃO (TEAR MANUAL)', 'tecelao (tear manual)', '768105', 0),
(939, 'TECELÃO DE TAPETES, A MÃO', 'tecelao de tapetes, a mao', '768110', 0),
(940, 'TRICOTEIRO, A MÃO', 'tricoteiro, a mao', '768115', 0),
(941, 'CHAPELEIRO (CHAPÉUS DE PALHA)', 'chapeleiro (chapeus de palha)', '768125', 0),
(942, 'CROCHETEIRO, A MÃO', 'crocheteiro, a mao', '768130', 0),
(943, 'CERZIDOR', 'cerzidor', '768210', 0),
(944, 'ARTÍFICE DO COURO', 'artifice do couro', '768305', 0),
(945, 'CORTADOR DE CALÇADOS, A MÃO (EXCETO SOLAS)', 'cortador de calcados, a mao (exceto solas)', '768310', 0),
(946, 'COSTURADOR DE ARTEFATOS DE COURO, A MÃO (EXCETO ROUPAS E CALÇADOS)', 'costurador de artefatos de couro, a mao (exceto roupas e calcados)', '768315', 0),
(947, 'SAPATEIRO (CALÇADOS SOB MEDIDA)', 'sapateiro (calcados sob medida)', '768320', 0),
(948, 'SELEIRO', 'seleiro', '768325', 0),
(949, 'TIPÓGRAFO', 'tipografo', '768605', 0),
(950, 'LINOTIPISTA', 'linotipista', '768610', 0),
(951, 'MONOTIPISTA', 'monotipista', '768615', 0),
(952, 'PAGINADOR', 'paginador', '768620', 0),
(953, 'PINTOR DE LETREIROS', 'pintor de letreiros', '768625', 0),
(954, 'CONFECCIONADOR DE CARIMBOS DE BORRACHA', 'confeccionador de carimbos de borracha', '768630', 0),
(955, 'GRAVADOR, A MÃO (ENCADERNAÇÃO)', 'gravador, a mao (encadernacao)', '768705', 0),
(956, 'RESTAURADOR DE LIVROS', 'restaurador de livros', '768710', 0),
(957, 'MESTRE (INDÚSTRIA DE MADEIRA E MOBILIÁRIO)', 'mestre (industria de madeira e mobiliario)', '770105', 0),
(958, 'MARCENEIRO', 'marceneiro', '771105', 0),
(959, 'MESTRE CARPINTEIRO', 'mestre carpinteiro', '770110', 0),
(960, 'MODELADOR DE MADEIRA', 'modelador de madeira', '771110', 0),
(961, 'MAQUETISTA NA MARCENARIA', 'maquetista na marcenaria', '771115', 0),
(962, 'TANOEIRO', 'tanoeiro', '771120', 0),
(963, 'CLASSIFICADOR DE MADEIRA', 'classificador de madeira', '772105', 0),
(964, 'IMPREGNADOR DE MADEIRA', 'impregnador de madeira', '772110', 0),
(965, 'SECADOR DE MADEIRA', 'secador de madeira', '772115', 0),
(966, 'CORTADOR DE LAMINADOS DE MADEIRA', 'cortador de laminados de madeira', '773105', 0),
(967, 'OPERADOR DE SERRAS NO DESDOBRAMENTO DE MADEIRA', 'operador de serras no desdobramento de madeira', '773110', 0),
(968, 'SERRADOR DE BORDAS NO DESDOBRAMENTO DE MADEIRA', 'serrador de bordas no desdobramento de madeira', '773115', 0),
(969, 'SERRADOR DE MADEIRA', 'serrador de madeira', '773120', 0),
(970, 'FISIOTERAPEUTA ACUPUNTURISTA', 'fisioterapeuta acupunturista', '223650', 0),
(971, 'NUTRICIONISTA', 'nutricionista', '223710', 0),
(972, 'FONOAUDIÓLOGO', 'fonoaudiologo', '223810', 0),
(973, 'FONOAUDIÓLOGO EM AUDIOLOGIA', 'fonoaudiologo em audiologia', '223820', 0),
(974, 'FONOAUDIÓLOGO EM DISFAGIA', 'fonoaudiologo em disfagia', '223825', 0),
(975, 'FONOAUDIÓLOGO EM MOTRICIDADE OROFACIAL', 'fonoaudiologo em motricidade orofacial', '223835', 0),
(976, 'FONOAUDIÓLOGO EM VOZ', 'fonoaudiologo em voz', '223845', 0),
(977, 'TERAPEUTA OCUPACIONAL', 'terapeuta ocupacional', '223905', 0),
(978, 'ORTOPTISTA', 'ortoptista', '223910', 0),
(979, 'AVALIADOR FÍSICO', 'avaliador fisico', '224105', 0),
(980, 'PREPARADOR FÍSICO', 'preparador fisico', '224120', 0),
(981, 'TÉCNICO DE DESPORTO INDIVIDUAL E COLETIVO (EXCETO FUTEBOL)', 'tecnico de desporto individual e coletivo (exceto futebol)', '224125', 0),
(982, 'TÉCNICO DE LABORATÓRIO E FISCALIZAÇÃO DESPORTIVA', 'tecnico de laboratorio e fiscalizacao desportiva', '224130', 0),
(983, 'TREINADOR PROFISSIONAL DE FUTEBOL', 'treinador profissional de futebol', '224135', 0),
(984, 'MÉDICO INFECTOLOGISTA', 'medico infectologista', '225103', 0),
(985, 'MÉDICO ACUPUNTURISTA', 'medico acupunturista', '225105', 0),
(986, 'MÉDICO LEGISTA', 'medico legista', '225106', 0),
(987, 'MÉDICO NEFROLOGISTA', 'medico nefrologista', '225109', 0),
(988, 'MÉDICO ALERGISTA E IMUNOLOGISTA', 'medico alergista e imunologista', '225110', 0),
(989, 'MÉDICO NEUROLOGISTA', 'medico neurologista', '225112', 0),
(990, 'MÉDICO ANGIOLOGISTA', 'medico angiologista', '225115', 0),
(991, 'MÉDICO NUTROLOGISTA', 'medico nutrologista', '225118', 0),
(992, 'MÉDICO CARDIOLOGISTA', 'medico cardiologista', '225120', 0),
(993, 'MÉDICO ONCOLOGISTA CLÍNICO', 'medico oncologista clinico', '225121', 0),
(994, 'MÉDICO CANCEROLOGISTA PEDIÁTRICO', 'medico cancerologista pediatrico', '225122', 0),
(995, 'MÉDICO PEDIATRA', 'medico pediatra', '225124', 0),
(996, 'MÉDICO CLÍNICO', 'medico clinico', '225125', 0),
(997, 'MÉDICO PNEUMOLOGISTA', 'medico pneumologista', '225127', 0),
(998, 'MÉDICO DE FAMÍLIA E COMUNIDADE', 'medico de familia e comunidade', '225130', 0),
(999, 'MÉDICO PSIQUIATRA', 'medico psiquiatra', '225133', 0),
(1000, 'MÉDICO DERMATOLOGISTA', 'medico dermatologista', '225135', 0),
(1001, 'MÉDICO REUMATOLOGISTA', 'medico reumatologista', '225136', 0),
(1002, 'MÉDICO SANITARISTA', 'medico sanitarista', '225139', 0),
(1003, 'MÉDICO DO TRABALHO', 'medico do trabalho', '225140', 0),
(1004, 'MÉDICO EM MEDICINA DE TRÁFEGO', 'medico em medicina de trafego', '225145', 0),
(1005, 'MÉDICO DA ESTRATÉGIA DE SAÚDE DA FAMÍLIA', 'medico da estrategia de saude da familia', '225142', 0),
(1006, 'MÉDICO ANATOMOPATOLOGISTA', 'medico anatomopatologista', '225148', 0),
(1007, 'MÉDICO EM MEDICINA INTENSIVA', 'medico em medicina intensiva', '225150', 0),
(1008, 'MÉDICO ANESTESIOLOGISTA', 'medico anestesiologista', '225151', 0),
(1009, 'MÉDICO ENDOCRINOLOGISTA E METABOLOGISTA', 'medico endocrinologista e metabologista', '225155', 0),
(1010, 'MÉDICO FISIATRA', 'medico fisiatra', '225160', 0),
(1011, 'MÉDICO GASTROENTEROLOGISTA', 'medico gastroenterologista', '225165', 0),
(1012, 'MÉDICO GENERALISTA', 'medico generalista', '225170', 0),
(1013, 'MÉDICO GENETICISTA', 'medico geneticista', '225175', 0),
(1014, 'MÉDICO GERIATRA', 'medico geriatra', '225180', 0),
(1015, 'MÉDICO HEMATOLOGISTA', 'medico hematologista', '225185', 0),
(1016, 'MÉDICO HOMEOPATA', 'medico homeopata', '225195', 0),
(1017, 'MÉDICO EM CIRURGIA VASCULAR', 'medico em cirurgia vascular', '225203', 0),
(1018, 'MÉDICO CIRURGIÃO CARDIOVASCULAR', 'medico cirurgiao cardiovascular', '225210', 0),
(1019, 'MÉDICO CIRURGIÃO DE CABEÇA E PESCOÇO', 'medico cirurgiao de cabeca e pescoco', '225215', 0),
(1020, 'MÉDICO CIRURGIÃO DO APARELHO DIGESTIVO', 'medico cirurgiao do aparelho digestivo', '225220', 0),
(1021, 'MÉDICO CIRURGIÃO GERAL', 'medico cirurgiao geral', '225225', 0),
(1022, 'PROFESSOR DE EDUCAÇÃO FÍSICA NO ENSINO MÉDIO', 'professor de educacao fisica no ensino medio', '232120', 0),
(1023, 'PROFESSOR DE FILOSOFIA NO ENSINO MÉDIO', 'professor de filosofia no ensino medio', '232125', 0),
(1024, 'PROFESSOR DE FÍSICA NO ENSINO MÉDIO', 'professor de fisica no ensino medio', '232130', 0),
(1025, 'PROFESSOR DE GEOGRAFIA NO ENSINO MÉDIO', 'professor de geografia no ensino medio', '232135', 0),
(1026, 'PROFESSOR DE HISTÓRIA NO ENSINO MÉDIO', 'professor de historia no ensino medio', '232140', 0),
(1027, 'PROFESSOR DE LÍNGUA E LITERATURA BRASILEIRA NO ENSINO MÉDIO', 'professor de lingua e literatura brasileira no ensino medio', '232145', 0),
(1028, 'INSTALADOR DE ISOLANTES ACÚSTICOS', 'instalador de isolantes acusticos', '715710', 0),
(1029, 'PROFESSOR DE LÍNGUA ESTRANGEIRA MODERNA NO ENSINO MÉDIO', 'professor de lingua estrangeira moderna no ensino medio', '232150', 0),
(1030, 'PROFESSOR DE MATEMÁTICA NO ENSINO MÉDIO', 'professor de matematica no ensino medio', '232155', 0),
(1031, 'PROFESSOR DE PSICOLOGIA NO ENSINO MÉDIO', 'professor de psicologia no ensino medio', '232160', 0),
(1032, 'PROEIRO', 'proeiro', '631415', 0),
(1033, 'REDEIRO (PESCA)', 'redeiro (pesca)', '631420', 0),
(1034, 'GUIA FLORESTAL', 'guia florestal', '632005', 0),
(1035, 'RAIZEIRO', 'raizeiro', '632010', 0),
(1036, 'VIVEIRISTA FLORESTAL', 'viveirista florestal', '632015', 0),
(1037, 'CLASSIFICADOR DE TORAS', 'classificador de toras', '632105', 0),
(1038, 'CUBADOR DE MADEIRA', 'cubador de madeira', '632110', 0),
(1039, 'IDENTIFICADOR FLORESTAL', 'identificador florestal', '632115', 0),
(1040, 'OPERADOR DE MOTOSSERRA', 'operador de motosserra', '632120', 0),
(1041, 'TRABALHADOR DE EXTRAÇÃO FLORESTAL, EM GERAL', 'trabalhador de extracao florestal, em geral', '632125', 0),
(1042, 'SERINGUEIRO', 'seringueiro', '632205', 0),
(1043, 'TRABALHADOR DA EXPLORAÇÃO DE ESPÉCIES PRODUTORAS DE GOMAS NÃO ELÁSTICAS', 'trabalhador da exploracao de especies produtoras de gomas nao elasticas', '632210', 0),
(1044, 'TRABALHADOR DA EXPLORAÇÃO DE RESINAS', 'trabalhador da exploracao de resinas', '632215', 0),
(1045, 'TRABALHADOR DA EXPLORAÇÃO DE ANDIROBA', 'trabalhador da exploracao de andiroba', '632305', 0),
(1046, 'TRABALHADOR DA EXPLORAÇÃO DE BABAÇU', 'trabalhador da exploracao de babacu', '632310', 0),
(1047, 'TRABALHADOR DA EXPLORAÇÃO DE BACABA', 'trabalhador da exploracao de bacaba', '632315', 0),
(1048, 'TRABALHADOR DA EXPLORAÇÃO DE BURITI', 'trabalhador da exploracao de buriti', '632320', 0),
(1049, 'TRABALHADOR DA EXPLORAÇÃO DE MALVA (PAINA)', 'trabalhador da exploracao de malva (paina)', '632340', 0),
(1050, 'TRABALHADOR DA EXPLORAÇÃO DE MURUMURU', 'trabalhador da exploracao de murumuru', '632345', 0),
(1051, 'TRABALHADOR DA EXPLORAÇÃO DE OITICICA', 'trabalhador da exploracao de oiticica', '632350', 0),
(1052, 'TRABALHADOR DA EXPLORAÇÃO DE OURICURI', 'trabalhador da exploracao de ouricuri', '632355', 0),
(1053, 'TRABALHADOR DA EXPLORAÇÃO DE PEQUI', 'trabalhador da exploracao de pequi', '632360', 0),
(1054, 'TRABALHADOR DA EXPLORAÇÃO DE PIAÇAVA', 'trabalhador da exploracao de piacava', '632365', 0),
(1055, 'TRABALHADOR DA EXPLORAÇÃO DE TUCUM', 'trabalhador da exploracao de tucum', '632370', 0),
(1056, 'MESTRE DE SIDERURGIA', 'mestre de siderurgia', '820105', 0),
(1057, 'TRABALHADOR DA EXPLORAÇÃO DE AÇAÍ', 'trabalhador da exploracao de acai', '632405', 0),
(1058, 'TRABALHADOR DA EXPLORAÇÃO DE CASTANHA', 'trabalhador da exploracao de castanha', '632410', 0),
(1059, 'TRABALHADOR DA EXPLORAÇÃO DE PINHÃO', 'trabalhador da exploracao de pinhao', '632415', 0),
(1060, 'TRABALHADOR DA EXPLORAÇÃO DE PUPUNHA', 'trabalhador da exploracao de pupunha', '632420', 0),
(1061, 'CARVOEIRO', 'carvoeiro', '632605', 0),
(1062, 'TRABALHADOR DA EXPLORAÇÃO DE ÁRVORES E ARBUSTOS PRODUTORES DE SUBSTÂNCIAS AROMÁT., MEDIC. E TÓXICAS', 'trabalhador da exploracao de arvores e arbustos produtores de substancias aromat., medic. e toxicas', '632505', 0),
(1063, 'TRABALHADOR DA EXPLORAÇÃO DE CIPÓS PRODUTORES DE SUBSTÂNCIAS AROMÁTICAS, MEDICINAIS E TÓXICAS', 'trabalhador da exploracao de cipos produtores de substancias aromaticas, medicinais e toxicas', '632510', 0),
(1064, 'TRABALHADOR DA EXPLORAÇÃO DE MADEIRAS TANANTES', 'trabalhador da exploracao de madeiras tanantes', '632515', 0),
(1065, 'TRABALHADOR DA EXPLORAÇÃO DE RAÍZES PRODUTORAS DE SUBSTÂNCIAS AROMÁTICAS, MEDICINAIS E TÓXICAS', 'trabalhador da exploracao de raizes produtoras de substancias aromaticas, medicinais e toxicas', '632520', 0),
(1066, 'TRABALHADOR DA EXTRAÇÃO DE SUBSTÂNCIAS AROMÁTICAS, MEDICINAIS E TÓXICAS, EM GERAL', 'trabalhador da extracao de substancias aromaticas, medicinais e toxicas, em geral', '632525', 0),
(1067, 'CARBONIZADOR', 'carbonizador', '632610', 0),
(1068, 'AJUDANTE DE CARVOARIA', 'ajudante de carvoaria', '632615', 0),
(1069, 'OPERADOR DE COLHEITADEIRA', 'operador de colheitadeira', '641005', 0),
(1070, 'OPERADOR DE MÁQUINAS DE BENEFICIAMENTO DE PRODUTOS AGRÍCOLAS', 'operador de maquinas de beneficiamento de produtos agricolas', '641010', 0),
(1071, 'TRATORISTA AGRÍCOLA', 'tratorista agricola', '641015', 0),
(1072, 'OPERADOR DE COLHEDOR FLORESTAL', 'operador de colhedor florestal', '642005', 0),
(1073, 'OPERADOR DE MÁQUINAS FLORESTAIS ESTÁTICAS', 'operador de maquinas florestais estaticas', '642010', 0),
(1074, 'OPERADOR DE TRATOR FLORESTAL', 'operador de trator florestal', '642015', 0),
(1075, 'TRABALHADOR NA OPERAÇÃO DE SISTEMA DE IRRIGAÇÃO LOCALIZADA (MICROASPERSÃO E GOTEJAMENTO)', 'trabalhador na operacao de sistema de irrigacao localizada (microaspersao e gotejamento)', '643005', 0),
(1076, 'TRABALHADOR NA OPERAÇÃO DE SISTEMA DE IRRIGAÇÃO POR ASPERSÃO (PIVÔ CENTRAL)', 'trabalhador na operacao de sistema de irrigacao por aspersao (pivo central)', '643010', 0),
(1077, 'TRABALHADOR NA OPERAÇÃO DE SISTEMAS CONVENCIONAIS DE IRRIGAÇÃO POR ASPERSÃO', 'trabalhador na operacao de sistemas convencionais de irrigacao por aspersao', '643015', 0),
(1078, 'TRABALHADOR NA OPERAÇÃO DE SISTEMAS DE IRRIGAÇÃO E ASPERSÃO (ALTO PROPELIDO)', 'trabalhador na operacao de sistemas de irrigacao e aspersao (alto propelido)', '643020', 0),
(1079, 'TRABALHADOR NA OPERAÇÃO DE SISTEMAS DE IRRIGAÇÃO POR SUPERFÍCIE E DRENAGEM', 'trabalhador na operacao de sistemas de irrigacao por superficie e drenagem', '643025', 0),
(1080, 'SUPERVISOR DE APOIO OPERACIONAL NA MINERAÇÃO', 'supervisor de apoio operacional na mineracao', '710105', 0),
(1081, 'SUPERVISOR DE EXTRAÇÃO DE SAL', 'supervisor de extracao de sal', '710110', 0),
(1082, 'SUPERVISOR DE PERFURAÇÃO E DESMONTE', 'supervisor de perfuracao e desmonte', '710115', 0),
(1083, 'SUPERVISOR DE PRODUÇÃO NA MINERAÇÃO', 'supervisor de producao na mineracao', '710120', 0),
(1084, 'SUPERVISOR DE TRANSPORTE NA MINERAÇÃO', 'supervisor de transporte na mineracao', '710125', 0),
(1085, 'MESTRE (CONSTRUÇÃO CIVIL)', 'mestre (construcao civil)', '710205', 0),
(1086, 'MESTRE DE LINHAS (FERROVIAS)', 'mestre de linhas (ferrovias)', '710210', 0),
(1087, 'INSPETOR DE TERRAPLENAGEM', 'inspetor de terraplenagem', '710215', 0),
(1088, 'SUPERVISOR DE USINA DE CONCRETO', 'supervisor de usina de concreto', '710220', 0),
(1089, 'FISCAL DE PÁTIO DE USINA DE CONCRETO', 'fiscal de patio de usina de concreto', '710225', 0),
(1090, 'AMOSTRADOR DE MINÉRIOS', 'amostrador de minerios', '711105', 0),
(1091, 'CANTEIRO', 'canteiro', '711110', 0),
(1092, 'DESTROÇADOR DE PEDRA', 'destrocador de pedra', '711115', 0),
(1093, 'DETONADOR', 'detonador', '711120', 0),
(1094, 'ESCORADOR DE MINAS', 'escorador de minas', '711125', 0),
(1095, 'MINEIRO', 'mineiro', '711130', 0),
(1096, 'OPERADOR DE CAMINHÃO (MINAS E PEDREIRAS)', 'operador de caminhao (minas e pedreiras)', '711205', 0),
(1097, 'OPERADOR DE CARREGADEIRA', 'operador de carregadeira', '711210', 0),
(1098, 'OPERADOR DE SCHUTTHECAR', 'operador de schutthecar', '711240', 0),
(1099, 'OPERADOR DE MÁQUINA CORTADORA (MINAS E PEDREIRAS)', 'operador de maquina cortadora (minas e pedreiras)', '711215', 0),
(1100, 'OPERADOR DE MÁQUINA DE EXTRAÇÃO CONTÍNUA (MINAS DE CARVÃO)', 'operador de maquina de extracao continua (minas de carvao)', '711220', 0),
(1101, 'OPERADOR DE MÁQUINA PERFURADORA (MINAS E PEDREIRAS)', 'operador de maquina perfuradora (minas e pedreiras)', '711225', 0),
(1102, 'OPERADOR DE MÁQUINA PERFURATRIZ', 'operador de maquina perfuratriz', '711230', 0),
(1103, 'OPERADOR DE MOTONIVELADORA (EXTRAÇÃO DE MINERAIS SÓLIDOS)', 'operador de motoniveladora (extracao de minerais solidos)', '711235', 0),
(1104, 'OPERADOR DE TRATOR (MINAS E PEDREIRAS)', 'operador de trator (minas e pedreiras)', '711245', 0),
(1105, 'ELETRICISTA DE INSTALAÇÕES (EDIFÍCIOS)', 'eletricista de instalacoes (edificios)', '715610', 0),
(1106, 'ELETRICISTA DE INSTALAÇÕES', 'eletricista de instalacoes', '715615', 0),
(1107, 'APLICADOR DE ASFALTO IMPERMEABILIZANTE (COBERTURAS)', 'aplicador de asfalto impermeabilizante (coberturas)', '715705', 0),
(1108, 'INSTALADOR DE ISOLANTES TÉRMICOS (REFRIGERAÇÃO E CLIMATIZAÇÃO)', 'instalador de isolantes termicos (refrigeracao e climatizacao)', '715715', 0),
(1109, 'INSTALADOR DE ISOLANTES TÉRMICOS DE CALDEIRA E TUBULAÇÕES', 'instalador de isolantes termicos de caldeira e tubulacoes', '715720', 0),
(1110, 'INSTALADOR DE MATERIAL ISOLANTE, A MÃO (EDIFICAÇÕES)', 'instalador de material isolante, a mao (edificacoes)', '715725', 0),
(1111, 'INSTALADOR DE MATERIAL ISOLANTE, A MÁQUINA (EDIFICAÇÕES)', 'instalador de material isolante, a maquina (edificacoes)', '715730', 0),
(1112, 'ACABADOR DE SUPERFÍCIES DE CONCRETO', 'acabador de superficies de concreto', '716105', 0),
(1113, 'REVESTIDOR DE SUPERFÍCIES DE CONCRETO', 'revestidor de superficies de concreto', '716110', 0),
(1114, 'TELHADOR (TELHAS DE ARGILA E MATERIAS SIMILARES)', 'telhador (telhas de argila e materias similares)', '716205', 0),
(1115, 'TELHADOR (TELHAS DE CIMENTO-AMIANTO)', 'telhador (telhas de cimento-amianto)', '716210', 0),
(1116, 'TELHADOR (TELHAS METÁLICAS)', 'telhador (telhas metalicas)', '716215', 0),
(1117, 'TELHADOR (TELHAS PLÁTICAS)', 'telhador (telhas platicas)', '716220', 0),
(1118, 'VIDRACEIRO', 'vidraceiro', '716305', 0),
(1119, 'VIDRACEIRO (EDIFICAÇÕES)', 'vidraceiro (edificacoes)', '716310', 0),
(1120, 'VIDRACEIRO (VITRAIS)', 'vidraceiro (vitrais)', '716315', 0),
(1121, 'GESSEIRO', 'gesseiro', '716405', 0),
(1122, 'ASSOALHADOR', 'assoalhador', '716505', 0),
(1123, 'LADRILHEIRO', 'ladrilheiro', '716510', 0),
(1124, 'PASTILHEIRO', 'pastilheiro', '716515', 0),
(1125, 'LUSTRADOR DE PISO', 'lustrador de piso', '716520', 0),
(1126, 'MARMORISTA (CONSTRUÇÃO)', 'marmorista (construcao)', '716525', 0),
(1127, 'MOSAÍSTA', 'mosaista', '716530', 0),
(1128, 'TAQUEIRO', 'taqueiro', '716535', 0),
(1129, 'CALAFETADOR', 'calafetador', '716605', 0),
(1130, 'PINTOR DE OBRAS', 'pintor de obras', '716610', 0),
(1131, 'REVESTIDOR DE INTERIORES (PAPEL, MATERIAL PLÁSTICO E EMBORRACHADOS)', 'revestidor de interiores (papel, material plastico e emborrachados)', '716615', 0),
(1132, 'DEMOLIDOR DE EDIFICAÇÕES', 'demolidor de edificacoes', '717005', 0);
INSERT INTO `cbos` (`id`, `name`, `name_filter`, `code_2002`, `is_active`) VALUES
(1133, 'OPERADOR DE MARTELETE', 'operador de martelete', '717010', 0),
(1134, 'POCEIRO (EDIFICAÇÕES)', 'poceiro (edificacoes)', '717015', 0),
(1135, 'SERVENTE DE OBRAS', 'servente de obras', '717020', 0),
(1136, 'VIBRADORISTA', 'vibradorista', '717025', 0),
(1137, 'MESTRE (AFIADOR DE FERRAMENTAS)', 'mestre (afiador de ferramentas)', '720105', 0),
(1138, 'MESTRE DE CALDEIRARIA', 'mestre de caldeiraria', '720110', 0),
(1139, 'MESTRE DE FERRAMENTARIA', 'mestre de ferramentaria', '720115', 0),
(1140, 'MESTRE DE FORJARIA', 'mestre de forjaria', '720120', 0),
(1141, 'MESTRE DE FUNDIÇÃO', 'mestre de fundicao', '720125', 0),
(1142, 'MESTRE DE GALVANOPLASTIA', 'mestre de galvanoplastia', '720130', 0),
(1143, 'MESTRE DE PINTURA (TRATAMENTO DE SUPERFÍCIES)', 'mestre de pintura (tratamento de superficies)', '720135', 0),
(1144, 'MESTRE DE SOLDAGEM', 'mestre de soldagem', '720140', 0),
(1145, 'MESTRE DE TREFILAÇÃO DE METAIS', 'mestre de trefilacao de metais', '720145', 0),
(1146, 'MESTRE DE USINAGEM', 'mestre de usinagem', '720150', 0),
(1147, 'FERRAMENTEIRO', 'ferramenteiro', '721105', 0),
(1148, 'OPERADOR DE FILTRO-ESTEIRA (MINERAÇÃO)', 'operador de filtro-esteira (mineracao)', '811325', 0),
(1149, 'OPERADOR DE FILTRO-PRENSA (TRATAMENTOS QUÍMICOS E AFINS)', 'operador de filtro-prensa (tratamentos quimicos e afins)', '811330', 0),
(1150, 'OPERADOR DE FILTROS DE PARAFINA (TRATAMENTOS QUÍMICOS E AFINS)', 'operador de filtros de parafina (tratamentos quimicos e afins)', '811335', 0),
(1151, 'DESTILADOR DE MADEIRA', 'destilador de madeira', '811405', 0),
(1152, 'DESTILADOR DE PRODUTOS QUÍMICOS (EXCETO PETRÓLEO)', 'destilador de produtos quimicos (exceto petroleo)', '811410', 0),
(1153, 'OPERADOR DE ALAMBIQUE DE FUNCIONAMENTO CONTÍNUO (PRODUTOS QUÍMICOS, EXCETO PETRÓLEO)', 'operador de alambique de funcionamento continuo (produtos quimicos, exceto petroleo)', '811415', 0),
(1154, 'ENFERMEIRO OBSTÉTRICO', 'enfermeiro obstetrico', '223545', 0),
(1155, 'OPERADOR DE APARELHO DE REAÇÃO E CONVERSÃO (PRODUTOS QUÍMICOS, EXCETO PETRÓLEO)', 'operador de aparelho de reacao e conversao (produtos quimicos, exceto petroleo)', '811420', 0),
(1156, 'OPERADOR DE EQUIPAMENTO DE DESTILAÇÃO DE ÁLCOOL', 'operador de equipamento de destilacao de alcool', '811425', 0),
(1157, 'OPERADOR DE EVAPORADOR NA DESTILAÇÃO', 'operador de evaporador na destilacao', '811430', 0),
(1158, 'OPERADOR DE PAINEL DE CONTROLE (REFINAÇÃO DE PETRÓLEO)', 'operador de painel de controle (refinacao de petroleo)', '811505', 0),
(1159, 'OPERADOR DE TRANSFERÊNCIA E ESTOCAGEM - NA REFINAÇÃO DO PETRÓLEO', 'operador de transferencia e estocagem - na refinacao do petroleo', '811510', 0),
(1160, 'OPERADOR DE BRITADOR DE COQUE', 'operador de britador de coque', '811605', 0),
(1161, 'OPERADOR DE CARRO DE APAGAMENTO E COQUE', 'operador de carro de apagamento e coque', '811610', 0),
(1162, 'OPERADOR DE DESTILAÇÃO E SUBPRODUTOS DE COQUE', 'operador de destilacao e subprodutos de coque', '811615', 0),
(1163, 'OPERADOR DE ENFORNAMENTO E DESENFORNAMENTO DE COQUE', 'operador de enfornamento e desenfornamento de coque', '811620', 0),
(1164, 'OPERADOR DE EXAUSTOR (COQUERIA)', 'operador de exaustor (coqueria)', '811625', 0),
(1165, 'OPERADOR DE PAINEL DE CONTROLE', 'operador de painel de controle', '811630', 0),
(1166, 'OPERADOR DE PRESERVAÇÃO E CONTROLE TÉRMICO', 'operador de preservacao e controle termico', '811635', 0),
(1167, 'OPERADOR DE REATOR DE COQUE DE PETRÓLEO', 'operador de reator de coque de petroleo', '811640', 0),
(1168, 'OPERADOR DE REFRIGERAÇÃO (COQUERIA)', 'operador de refrigeracao (coqueria)', '811645', 0),
(1169, 'OPERADOR DE SISTEMA DE REVERSÃO (COQUERIA)', 'operador de sistema de reversao (coqueria)', '811650', 0),
(1170, 'BAMBURISTA', 'bamburista', '811705', 0),
(1171, 'CALANDRISTA DE BORRACHA', 'calandrista de borracha', '811710', 0),
(1172, 'CONFECCIONADOR DE PNEUMÁTICOS', 'confeccionador de pneumaticos', '811715', 0),
(1173, 'CONFECCIONADOR DE VELAS POR IMERSÃO', 'confeccionador de velas por imersao', '811725', 0),
(1174, 'CONFECCIONADOR DE VELAS POR MOLDAGEM', 'confeccionador de velas por moldagem', '811735', 0),
(1175, 'LAMINADOR DE PLÁSTICO', 'laminador de plastico', '811745', 0),
(1176, 'MOLDADOR DE BORRACHA POR COMPRESSÃO', 'moldador de borracha por compressao', '811750', 0),
(1177, 'MOLDADOR DE PLÁSTICO POR COMPRESSÃO', 'moldador de plastico por compressao', '811760', 0),
(1178, 'MOLDADOR DE PLÁSTICO POR INJEÇÃO', 'moldador de plastico por injecao', '811770', 0),
(1179, 'TREFILADOR DE BORRACHA', 'trefilador de borracha', '811775', 0),
(1180, 'OPERADOR DE MÁQUINA DE PRODUTOS FARMACÊUTICOS', 'operador de maquina de produtos farmaceuticos', '811805', 0),
(1181, 'DRAGEADOR (MEDICAMENTOS)', 'drageador (medicamentos)', '811810', 0),
(1182, 'OPERADOR DE MÁQUINA DE FABRICAÇÃO DE COSMÉTICOS', 'operador de maquina de fabricacao de cosmeticos', '811815', 0),
(1183, 'OPERADOR DE MÁQUINA DE FABRICAÇÃO DE PRODUTOS DE HIGIENE E LIMPEZA (SABÃO, SABONETE, DETERGENTE, ABSORVENTE, FRALDAS COTONETES E OUTROS)', 'operador de maquina de fabricacao de produtos de higiene e limpeza (sabao, sabonete, detergente, absorvente, fraldas cotonetes e outros)', '811820', 0),
(1184, 'PIROTÉCNICO', 'pirotecnico', '812105', 0),
(1185, 'ATOR', 'ator', '262505', 0),
(1186, 'TRABALHADOR DA FABRICAÇÃO DE MUNIÇÃO E EXPLOSIVOS', 'trabalhador da fabricacao de municao e explosivos', '812110', 0),
(1187, 'CILINDRISTA (PETROQUÍMICA E AFINS)', 'cilindrista (petroquimica e afins)', '813105', 0),
(1188, 'OPERADOR DE CALANDRA (QUÍMICA, PETROQUÍMICA E AFINS)', 'operador de calandra (quimica, petroquimica e afins)', '813110', 0),
(1189, 'OPERADOR DE EXTRUSORA (QUÍMICA, PETROQUÍMICA E AFINS)', 'operador de extrusora (quimica, petroquimica e afins)', '813115', 0),
(1190, 'OPERADOR DE PROCESSO (QUÍMICA, PETROQUÍMICA E AFINS)', 'operador de processo (quimica, petroquimica e afins)', '813120', 0),
(1191, 'ENFERMEIRO PSIQUIÁTRICO', 'enfermeiro psiquiatrico', '223550', 0),
(1192, 'OPERADOR DE SONDA DE PERCUSSÃO', 'operador de sonda de percussao', '711305', 0),
(1193, 'OPERADOR DE SONDA ROTATIVA', 'operador de sonda rotativa', '711310', 0),
(1194, 'SONDADOR (POÇOS DE PETRÓLEO E GÁS)', 'sondador (pocos de petroleo e gas)', '711315', 0),
(1195, 'SONDADOR DE POÇOS (EXCETO DE PETRÓLEO E GÁS)', 'sondador de pocos (exceto de petroleo e gas)', '711320', 0),
(1196, 'PLATAFORMISTA (PETRÓLEO)', 'plataformista (petroleo)', '711325', 0),
(1197, 'TORRISTA (PETRÓLEO)', 'torrista (petroleo)', '711330', 0),
(1198, 'GARIMPEIRO', 'garimpeiro', '711405', 0),
(1199, 'OPERADOR DE SALINA (SAL MARINHO)', 'operador de salina (sal marinho)', '711410', 0),
(1200, 'MOLEIRO DE MINÉRIOS', 'moleiro de minerios', '712105', 0),
(1201, 'OPERADOR DE APARELHO DE FLOTAÇÃO', 'operador de aparelho de flotacao', '712110', 0),
(1202, 'OPERADOR DE APARELHO DE PRECIPITAÇÃO (MINAS DE OURO OU PRATA)', 'operador de aparelho de precipitacao (minas de ouro ou prata)', '712115', 0),
(1203, 'OPERADOR DE BRITADOR DE MANDÍBULAS', 'operador de britador de mandibulas', '712120', 0),
(1204, 'OPERADOR DE ESPESSADOR', 'operador de espessador', '712125', 0),
(1205, 'OPERADOR DE JIG (MINAS)', 'operador de jig (minas)', '712130', 0),
(1206, 'OPERADOR DE PENEIRAS HIDRÁULICAS', 'operador de peneiras hidraulicas', '712135', 0),
(1207, 'CORTADOR DE PEDRAS', 'cortador de pedras', '712205', 0),
(1208, 'GRAVADOR DE INSCRIÇÕES EM PEDRA', 'gravador de inscricoes em pedra', '712210', 0),
(1209, 'GRAVADOR DE RELEVOS EM PEDRA', 'gravador de relevos em pedra', '712215', 0),
(1210, 'POLIDOR DE PEDRAS', 'polidor de pedras', '712220', 0),
(1211, 'TORNEIRO (LAVRA DE PEDRA)', 'torneiro (lavra de pedra)', '712225', 0),
(1212, 'TRAÇADOR DE PEDRAS', 'tracador de pedras', '712230', 0),
(1213, 'OPERADOR DE BATE-ESTACAS', 'operador de bate-estacas', '715105', 0),
(1214, 'OPERADOR DE COMPACTADORA DE SOLOS', 'operador de compactadora de solos', '715110', 0),
(1215, 'OPERADOR DE ESCAVADEIRA', 'operador de escavadeira', '715115', 0),
(1216, 'OPERADOR DE MÁQUINA DE ABRIR VALAS', 'operador de maquina de abrir valas', '715120', 0),
(1217, 'OPERADOR DE MÁQUINAS DE CONSTRUÇÃO CIVIL E MINERAÇÃO', 'operador de maquinas de construcao civil e mineracao', '715125', 0),
(1218, 'OPERADOR DE MOTONIVELADORA', 'operador de motoniveladora', '715130', 0),
(1219, 'OPERADOR DE PÁ CARREGADEIRA', 'operador de pa carregadeira', '715135', 0),
(1220, 'OPERADOR DE PAVIMENTADORA (ASFALTO, CONCRETO E MATERIAIS SIMILARES)', 'operador de pavimentadora (asfalto, concreto e materiais similares)', '715140', 0),
(1221, 'OPERADOR DE TRATOR DE LÂMINA', 'operador de trator de lamina', '715145', 0),
(1222, 'CALCETEIRO', 'calceteiro', '715205', 0),
(1223, 'PEDREIRO', 'pedreiro', '715210', 0),
(1224, 'PEDREIRO (CHAMINÉS INDUSTRIAIS)', 'pedreiro (chamines industriais)', '715215', 0),
(1225, 'PEDREIRO (MATERIAL REFRATÁRIO)', 'pedreiro (material refratario)', '715220', 0),
(1226, 'PEDREIRO (MINERAÇÃO)', 'pedreiro (mineracao)', '715225', 0),
(1227, 'PEDREIRO DE EDIFICAÇÕES', 'pedreiro de edificacoes', '715230', 0),
(1228, 'ARMADOR DE ESTRUTURA DE CONCRETO', 'armador de estrutura de concreto', '715305', 0),
(1229, 'MOLDADOR DE CORPOS DE PROVA EM USINAS DE CONCRETO', 'moldador de corpos de prova em usinas de concreto', '715310', 0),
(1230, 'ARMADOR DE ESTRUTURA DE CONCRETO ARMADO', 'armador de estrutura de concreto armado', '715315', 0),
(1231, 'OPERADOR DE BETONEIRA', 'operador de betoneira', '715405', 0),
(1232, 'OPERADOR DE BOMBA DE CONCRETO', 'operador de bomba de concreto', '715410', 0),
(1233, 'OPERADOR DE CENTRAL DE CONCRETO', 'operador de central de concreto', '715415', 0),
(1234, 'CARPINTEIRO', 'carpinteiro', '715505', 0),
(1235, 'CARPINTEIRO (ESQUADRIAS)', 'carpinteiro (esquadrias)', '715510', 0),
(1236, 'CARPINTEIRO (CENÁRIOS)', 'carpinteiro (cenarios)', '715515', 0),
(1237, 'CARPINTEIRO (MINERAÇÃO)', 'carpinteiro (mineracao)', '715520', 0),
(1238, 'CARPINTEIRO DE OBRAS', 'carpinteiro de obras', '715525', 0),
(1239, 'CARPINTEIRO (TELHADOS)', 'carpinteiro (telhados)', '715530', 0),
(1240, 'CARPINTEIRO DE FÔRMAS PARA CONCRETO', 'carpinteiro de formas para concreto', '715535', 0),
(1241, 'CARPINTEIRO DE OBRAS CIVIS DE ARTE (PONTES, TÚNEIS, BARRAGENS)', 'carpinteiro de obras civis de arte (pontes, tuneis, barragens)', '715540', 0),
(1242, 'MONTADOR DE ANDAIMES (EDIFICAÇÕES)', 'montador de andaimes (edificacoes)', '715545', 0),
(1243, 'ELETRICISTA DE INSTALAÇÕES (CENÁRIOS)', 'eletricista de instalacoes (cenarios)', '715605', 0),
(1244, 'MÉDICO CIRURGIÃO PEDIÁTRICO', 'medico cirurgiao pediatrico', '225230', 0),
(1245, 'MÉDICO CIRURGIÃO PLÁSTICO', 'medico cirurgiao plastico', '225235', 0),
(1246, 'MÉDICO CIRURGIÃO TORÁCICO', 'medico cirurgiao toracico', '225240', 0),
(1247, 'MÉDICO GINECOLOGISTA E OBSTETRA', 'medico ginecologista e obstetra', '225250', 0),
(1248, 'MÉDICO MASTOLOGISTA', 'medico mastologista', '225255', 0),
(1249, 'MÉDICO NEUROCIRURGIÃO', 'medico neurocirurgiao', '225260', 0),
(1250, 'MÉDICO OFTALMOLOGISTA', 'medico oftalmologista', '225265', 0),
(1251, 'MÉDICO ORTOPEDISTA E TRAUMATOLOGISTA', 'medico ortopedista e traumatologista', '225270', 0),
(1252, 'MÉDICO OTORRINOLARINGOLOGISTA', 'medico otorrinolaringologista', '225275', 0),
(1253, 'MÉDICO COLOPROCTOLOGISTA', 'medico coloproctologista', '225280', 0),
(1254, 'MÉDICO UROLOGISTA', 'medico urologista', '225285', 0),
(1255, 'MÉDICO CANCEROLOGISTA CIRURGÍCO', 'medico cancerologista cirurgico', '225290', 0),
(1256, 'MÉDICO CIRURGIÃO DA MÃO', 'medico cirurgiao da mao', '225295', 0),
(1257, 'MÉDICO CITOPATOLOGISTA', 'medico citopatologista', '225305', 0),
(1258, 'MÉDICO EM ENDOSCOPIA', 'medico em endoscopia', '225310', 0),
(1259, 'MÉDICO EM MEDICINA NUCLEAR', 'medico em medicina nuclear', '225315', 0),
(1260, 'MÉDICO EM RADIOLOGIA E DIAGNÓSTICO POR IMAGEM', 'medico em radiologia e diagnostico por imagem', '225320', 0),
(1261, 'MÉDICO PATOLOGISTA', 'medico patologista', '225325', 0),
(1262, 'MÉDICO RADIOTERAPEUTA', 'medico radioterapeuta', '225330', 0),
(1263, 'MÉDICO PATOLOGISTA CLÍNICO / MEDICINA LABORATORIAL', 'medico patologista clinico / medicina laboratorial', '225335', 0),
(1264, 'MÉDICO HEMOTERAPEUTA', 'medico hemoterapeuta', '225340', 0),
(1265, 'MÉDICO HIPERBARISTA', 'medico hiperbarista', '225345', 0),
(1266, 'MÉDICO NEUROFISIOLOGISTA CLÍNICO', 'medico neurofisiologista clinico', '225350', 0),
(1267, 'MUSICOTERAPEUTA', 'musicoterapeuta', '226305', 0),
(1268, 'PROFESSOR DE NÍVEL SUPERIOR NA EDUCAÇÃO INFANTIL (QUATRO A SEIS ANOS)', 'professor de nivel superior na educacao infantil (quatro a seis anos)', '231105', 0),
(1269, 'PROFESSOR DE NÍVEL SUPERIOR NA EDUCAÇÃO INFANTIL (ZERO A TRÊS ANOS)', 'professor de nivel superior na educacao infantil (zero a tres anos)', '231110', 0),
(1270, 'PROFESSOR DA EDUCAÇÃO DE JOVENS E ADULTOS DO ENSINO FUNDAMENTAL (PRIMEIRA A QUARTA SÉRIE)', 'professor da educacao de jovens e adultos do ensino fundamental (primeira a quarta serie)', '231205', 0),
(1271, 'PROFESSOR DE NÍVEL SUPERIOR DO ENSINO FUNDAMENTAL (PRIMEIRA A QUARTA SÉRIE)', 'professor de nivel superior do ensino fundamental (primeira a quarta serie)', '231210', 0),
(1272, 'PROFESSOR DE CIÊNCIAS EXATAS E NATURAIS DO ENSINO FUNDAMENTAL', 'professor de ciencias exatas e naturais do ensino fundamental', '231305', 0),
(1273, 'NEUROPSICÓLOGO', 'neuropsicologo', '251545', 0),
(1274, 'PROFESSOR DE EDUCAÇÃO ARTÍSTICA DO ENSINO FUNDAMENTAL', 'professor de educacao artistica do ensino fundamental', '231310', 0),
(1275, 'PROFESSOR DE EDUCAÇÃO FÍSICA DO ENSINO FUNDAMENTAL', 'professor de educacao fisica do ensino fundamental', '231315', 0),
(1276, 'PROFESSOR DE GEOGRAFIA DO ENSINO FUNDAMENTAL', 'professor de geografia do ensino fundamental', '231320', 0),
(1277, 'PROFESSOR DE HISTÓRIA DO ENSINO FUNDAMENTAL', 'professor de historia do ensino fundamental', '231325', 0),
(1278, 'ARTETERAPEUTA', 'arteterapeuta', '226310', 0),
(1279, 'QUIROPRAXISTA', 'quiropraxista', '226105', 0),
(1280, 'OSTEOPATA', 'osteopata', '226110', 0),
(1281, 'PROFESSOR DE LÍNGUA ESTRANGEIRA MODERNA DO ENSINO FUNDAMENTAL', 'professor de lingua estrangeira moderna do ensino fundamental', '231330', 0),
(1282, 'PROFESSOR DE LÍNGUA PORTUGUESA DO ENSINO FUNDAMENTAL', 'professor de lingua portuguesa do ensino fundamental', '231335', 0),
(1283, 'PROFESSOR DE MATEMÁTICA DO ENSINO FUNDAMENTAL', 'professor de matematica do ensino fundamental', '231340', 0),
(1284, 'PROFESSOR DE ARTES NO ENSINO MÉDIO', 'professor de artes no ensino medio', '232105', 0),
(1285, 'PROFESSOR DE BIOLOGIA NO ENSINO MÉDIO', 'professor de biologia no ensino medio', '232110', 0),
(1286, 'PROFESSOR DE DISCIPLINAS PEDAGÓGICAS NO ENSINO MÉDIO', 'professor de disciplinas pedagogicas no ensino medio', '232115', 0),
(1287, 'OPERADOR DE MÁQUINA DE MOLDAR AUTOMATIZADA', 'operador de maquina de moldar automatizada', '722330', 0),
(1288, 'CABLEADOR', 'cableador', '722405', 0),
(1289, 'ESTIRADOR DE TUBOS DE METAL SEM COSTURA', 'estirador de tubos de metal sem costura', '722410', 0),
(1290, 'TREFILADOR DE METAIS, A MÁQUINA', 'trefilador de metais, a maquina', '722415', 0),
(1291, 'CEMENTADOR DE METAIS', 'cementador de metais', '723105', 0),
(1292, 'NORMALIZADOR DE METAIS E DE COMPÓSITOS', 'normalizador de metais e de compositos', '723110', 0),
(1293, 'OPERADOR DE EQUIPAMENTO PARA RESFRIAMENTO', 'operador de equipamento para resfriamento', '723115', 0),
(1294, 'OPERADOR DE FORNO DE TRATAMENTO TÉRMICO DE METAIS', 'operador de forno de tratamento termico de metais', '723120', 0),
(1295, 'TEMPERADOR DE METAIS E DE COMPÓSITOS', 'temperador de metais e de compositos', '723125', 0),
(1296, 'DECAPADOR', 'decapador', '723205', 0),
(1297, 'FOSFATIZADOR', 'fosfatizador', '723210', 0),
(1298, 'GALVANIZADOR', 'galvanizador', '723215', 0),
(1299, 'FORNEIRO E OPERADOR (FORNO ELÉTRICO)', 'forneiro e operador (forno eletrico)', '821215', 0),
(1300, 'FORNEIRO E OPERADOR (REFINO DE METAIS NÃO-FERROSOS)', 'forneiro e operador (refino de metais nao-ferrosos)', '821220', 0),
(1301, 'FORNEIRO E OPERADOR DE FORNO DE REDUÇÃO DIRETA', 'forneiro e operador de forno de reducao direta', '821225', 0),
(1302, 'OPERADOR DE ACIARIA (BASCULAMENTO DE CONVERTEDOR)', 'operador de aciaria (basculamento de convertedor)', '821230', 0),
(1303, 'OPERADOR DE ACIARIA (DESSULFURAÇÃO DE GUSA)', 'operador de aciaria (dessulfuracao de gusa)', '821235', 0),
(1304, 'OPERADOR DE ACIARIA (RECEBIMENTO DE GUSA)', 'operador de aciaria (recebimento de gusa)', '821240', 0),
(1305, 'OPERADOR DE ÁREA DE CORRIDA', 'operador de area de corrida', '821245', 0),
(1306, 'OPERADOR DE DESGASEIFICAÇÃO', 'operador de desgaseificacao', '821250', 0),
(1307, 'SOPRADOR DE CONVERTEDOR', 'soprador de convertedor', '821255', 0),
(1308, 'OPERADOR DE LAMINADOR', 'operador de laminador', '821305', 0),
(1309, 'OPERADOR DE LAMINADOR DE BARRAS A FRIO', 'operador de laminador de barras a frio', '821310', 0),
(1310, 'FARMACÊUTICO INDUSTRIAL', 'farmaceutico industrial', '223435', 0),
(1311, 'FARMACÊUTICO TOXICOLOGISTA', 'farmaceutico toxicologista', '223440', 0),
(1312, 'ENFERMEIRO ESTOMATERAPEUTA', 'enfermeiro estomaterapeuta', '2235C3', 0),
(1313, 'ENFERMEIRO', 'enfermeiro', '223505', 0),
(1314, 'ENFERMEIRO DE BORDO', 'enfermeiro de bordo', '223515', 0),
(1315, 'ENFERMEIRO DE CENTRO CIRÚRGICO', 'enfermeiro de centro cirurgico', '223520', 0),
(1316, 'ENFERMEIRO DE TERAPIA INTENSIVA', 'enfermeiro de terapia intensiva', '223525', 0),
(1317, 'ENFERMEIRO DO TRABALHO', 'enfermeiro do trabalho', '223530', 0),
(1318, 'ENFERMEIRO NEFROLOGISTA', 'enfermeiro nefrologista', '223535', 0),
(1319, 'DIETISTA', 'dietista', '223705', 0),
(1320, 'ENFERMEIRO NEONATOLOGISTA', 'enfermeiro neonatologista', '223540', 0),
(1321, 'ENFERMEIRO AUDITOR', 'enfermeiro auditor', '223510', 0),
(1322, 'ENFERMEIRO PUERICULTOR E PEDIÁTRICO', 'enfermeiro puericultor e pediatrico', '223555', 0),
(1323, 'ENFERMEIRO SANITARISTA', 'enfermeiro sanitarista', '223560', 0),
(1324, 'ENFERMEIRO DA ESTRATÉGIA DE SAÚDE DA FAMÍLIA', 'enfermeiro da estrategia de saude da familia', '223565', 0),
(1325, 'PERFUSIONISTA', 'perfusionista', '223570', 0),
(1326, 'TÉCNICO EM ORIENTAÇÃO E MOBILIDADE DE CEGOS E DEFICIENTES VISUAIS', 'tecnico em orientacao e mobilidade de cegos e deficientes visuais', '2236I1', 1),
(1327, 'FISIOTERAPEUTA GERAL', 'fisioterapeuta geral', '223605', 0),
(1328, 'FISIOTERAPEUTA RESPIRATÓRIA', 'fisioterapeuta respiratoria', '223625', 0),
(1329, 'FISIOTERAPEUTA OSTEOPATA', 'fisioterapeuta osteopata', '223640', 0),
(1330, 'FISIOTERAPEUTA QUIROPRAXISTA', 'fisioterapeuta quiropraxista', '223645', 0),
(1331, 'OPERADOR DE LAVAGEM E DEPURAÇÃO DE PASTA PARA FABRICAÇÃO DE PAPEL', 'operador de lavagem e depuracao de pasta para fabricacao de papel', '831120', 0),
(1332, 'OPERADOR DE MÁQUINA DE SECAR CELULOSE', 'operador de maquina de secar celulose', '831125', 0),
(1333, 'CALANDRISTA DE PAPEL', 'calandrista de papel', '832105', 0),
(1334, 'OPERADOR DE CORTADEIRA DE PAPEL', 'operador de cortadeira de papel', '832110', 0),
(1335, 'OPERADOR DE MÁQUINA DE FABRICAR PAPEL (FASE ÚMIDA)', 'operador de maquina de fabricar papel (fase umida)', '832115', 0),
(1336, 'OPERADOR DE MÁQUINA DE FABRICAR PAPEL (FASE SECA)', 'operador de maquina de fabricar papel (fase seca)', '832120', 0),
(1337, 'OPERADOR DE MÁQUINA DE FABRICAR PAPEL E PAPELÃO', 'operador de maquina de fabricar papel e papelao', '832125', 0),
(1338, 'OPERADOR DE REBOBINADEIRA NA FABRICAÇÃO DE PAPEL E PAPELÃO', 'operador de rebobinadeira na fabricacao de papel e papelao', '832135', 0),
(1339, 'CARTONAGEIRO, A MÁQUINA', 'cartonageiro, a maquina', '833105', 0),
(1340, 'CONFECCIONADOR DE BOLSAS, SACOS E SACOLAS E PAPEL, A MÁQUINA', 'confeccionador de bolsas, sacos e sacolas e papel, a maquina', '833110', 0),
(1341, 'CONFECCIONADOR DE SACOS DE CELOFANE, A MÁQUINA', 'confeccionador de sacos de celofane, a maquina', '833115', 0),
(1342, 'OPERADOR DE MÁQUINA DE CORTAR E DOBRAR PAPELÃO', 'operador de maquina de cortar e dobrar papelao', '833120', 0),
(1343, 'OPERADOR DE PRENSA DE EMBUTIR PAPELÃO', 'operador de prensa de embutir papelao', '833125', 0),
(1344, 'CARTONAGEIRO, A MÃO (CAIXAS DE PAPELÃO)', 'cartonageiro, a mao (caixas de papelao)', '833205', 0),
(1345, 'SUPERVISOR DE PRODUÇÃO DA INDÚSTRIA ALIMENTÍCIA', 'supervisor de producao da industria alimenticia', '840105', 0),
(1346, 'SUPERVISOR DA INDÚSTRIA DE BEBIDAS', 'supervisor da industria de bebidas', '840110', 0),
(1347, 'SUPERVISOR DA INDÚSTRIA DE FUMO', 'supervisor da industria de fumo', '840115', 0),
(1348, 'CHEFE DE CONFEITARIA', 'chefe de confeitaria', '840120', 0),
(1349, 'MOLEIRO DE CEREAIS (EXCETO ARROZ)', 'moleiro de cereais (exceto arroz)', '841105', 0),
(1350, 'MOLEIRO DE ESPECIARIAS', 'moleiro de especiarias', '841110', 0),
(1351, 'OPERADOR DE PROCESSO DE MOAGEM', 'operador de processo de moagem', '841115', 0),
(1352, 'REFINADOR DE SAL', 'refinador de sal', '841210', 0),
(1353, 'OPERADOR DE CRISTALIZAÇÃO NA REFINAÇÃO DE AÇUCAR', 'operador de cristalizacao na refinacao de acucar', '841305', 0),
(1354, 'OPERADOR DE EQUIPAMENTOS DE REFINAÇÃO DE AÇÚCAR (PROCESSO CONTÍNUO)', 'operador de equipamentos de refinacao de acucar (processo continuo)', '841310', 0),
(1355, 'OPERADOR DE MOENDA NA FABRICAÇÃO DE AÇÚCAR', 'operador de moenda na fabricacao de acucar', '841315', 0),
(1356, 'OPERADOR DE TRATAMENTO DE CALDA NA REFINAÇÃO DE AÇÚCAR', 'operador de tratamento de calda na refinacao de acucar', '841320', 0),
(1357, 'COZINHADOR (CONSERVAÇÃO DE ALIMENTOS)', 'cozinhador (conservacao de alimentos)', '841408', 0),
(1358, 'COZINHADOR DE CARNES', 'cozinhador de carnes', '841416', 0),
(1359, 'COZINHADOR DE FRUTAS E LEGUMES', 'cozinhador de frutas e legumes', '841420', 0),
(1360, 'COZINHADOR DE PESCADO', 'cozinhador de pescado', '841428', 0),
(1361, 'DESIDRATADOR DE ALIMENTOS', 'desidratador de alimentos', '841432', 0),
(1362, 'ESTERILIZADOR DE ALIMENTOS', 'esterilizador de alimentos', '841440', 0),
(1363, 'HIDROGENADOR DE ÓLEOS E GORDURAS', 'hidrogenador de oleos e gorduras', '841444', 0),
(1364, 'LAGAREIRO', 'lagareiro', '841448', 0),
(1365, 'OPERADOR DE CÂMARAS FRIAS', 'operador de camaras frias', '841456', 0),
(1366, 'OPERADOR DE PREPARAÇÃO DE GRÃOS VEGETAIS (ÓLEOS E GORDURAS)', 'operador de preparacao de graos vegetais (oleos e gorduras)', '841460', 0),
(1367, 'PRENSADOR DE FRUTAS (EXCETO OLEAGINOSAS)', 'prensador de frutas (exceto oleaginosas)', '841464', 0),
(1368, 'PREPARADOR DE RAÇÕES', 'preparador de racoes', '841468', 0),
(1369, 'REFINADOR DE ÓLEO E GORDURA', 'refinador de oleo e gordura', '841472', 0),
(1370, 'TRABALHADOR DE FABRICAÇÃO DE MARGARINA', 'trabalhador de fabricacao de margarina', '841476', 0),
(1371, 'TRABALHADOR DE PREPARAÇÃO DE PESCADOS (LIMPEZA)', 'trabalhador de preparacao de pescados (limpeza)', '841484', 0),
(1372, 'TRABALHADOR DE TRATAMENTO DO LEITE E FABRICAÇÃO DE LATICÍNIOS E AFINS', 'trabalhador de tratamento do leite e fabricacao de laticinios e afins', '841505', 0),
(1373, 'MISTURADOR DE CAFÉ', 'misturador de cafe', '841605', 0),
(1374, 'TORRADOR DE CAFÉ', 'torrador de cafe', '841610', 0),
(1375, 'MOEDOR DE CAFÉ', 'moedor de cafe', '841615', 0),
(1376, 'OPERADOR DE EXTRAÇÃO DE CAFÉ SOLÚVEL', 'operador de extracao de cafe soluvel', '841620', 0),
(1377, 'TORRADOR DE CACAU', 'torrador de cacau', '841625', 0),
(1378, 'MISTURADOR DE CHÁ OU MATE', 'misturador de cha ou mate', '841630', 0),
(1379, 'ALAMBIQUEIRO', 'alambiqueiro', '841705', 0),
(1380, 'FILTRADOR DE CERVEJA', 'filtrador de cerveja', '841710', 0),
(1381, 'FERMENTADOR', 'fermentador', '841715', 0),
(1382, 'TRABALHADOR DE FABRICAÇÃO DE VINHOS', 'trabalhador de fabricacao de vinhos', '841720', 0),
(1383, 'MALTEIRO (GERMINAÇÃO)', 'malteiro (germinacao)', '841725', 0),
(1384, 'COZINHADOR DE MALTE', 'cozinhador de malte', '841730', 0),
(1385, 'DESSECADOR DE MALTE', 'dessecador de malte', '841735', 0),
(1386, 'VINAGREIRO', 'vinagreiro', '841740', 0),
(1387, 'XAROPEIRO', 'xaropeiro', '841745', 0),
(1388, 'OPERADOR DE FORNO (FABRICAÇÃO DE PAES, BISCOITOS E SIMILARES)', 'operador de forno (fabricacao de paes, biscoitos e similares)', '841805', 0),
(1389, 'OPERADOR DE MÁQUINAS DE FABRICAÇÃO DE DOCES, SALGADOS E MASSAS ALIMENTÍCIAS', 'operador de maquinas de fabricacao de doces, salgados e massas alimenticias', '841810', 0),
(1390, 'OPERADOR DE MÁQUINAS DE FABRICAÇÃO DE CHOCOLATES E ACHOCOLATADOS', 'operador de maquinas de fabricacao de chocolates e achocolatados', '841815', 0),
(1391, 'PREPARADOR DE MELADO E ESSÊNCIA DE FUMO', 'preparador de melado e essencia de fumo', '842105', 0),
(1392, 'PROCESSADOR DE FUMO', 'processador de fumo', '842110', 0),
(1393, 'CLASSIFICADOR DE FUMO', 'classificador de fumo', '842115', 0),
(1394, 'AUXILIAR DE PROCESSAMENTO DE FUMO', 'auxiliar de processamento de fumo', '842120', 0),
(1395, 'OPERADOR DE MÁQUINA DE FABRICAR CIGARROS', 'operador de maquina de fabricar cigarros', '842125', 0),
(1396, 'OPERADOR DE MÁQUINA DE PREPARAÇÃO DE MATÉRIA PRIMA PARA PRODUÇÃO DE CIGARROS', 'operador de maquina de preparacao de materia prima para producao de cigarros', '842135', 0),
(1397, 'PREPARADOR DE FUMO NA FABRICAÇÃO DE CHARUTOS', 'preparador de fumo na fabricacao de charutos', '842205', 0),
(1398, 'OPERADOR DE MÁQUINA DE FABRICAR CHARUTOS E CIGARRILHAS', 'operador de maquina de fabricar charutos e cigarrilhas', '842210', 0),
(1399, 'CLASSIFICADOR DE CHARUTOS', 'classificador de charutos', '842215', 0),
(1400, 'CORTADOR DE CHARUTOS', 'cortador de charutos', '842220', 0),
(1401, 'CELOFANISTA NA FABRICAÇÃO DE CHARUTOS', 'celofanista na fabricacao de charutos', '842225', 0),
(1402, 'CHARUTEIRO A MÃO', 'charuteiro a mao', '842230', 0),
(1403, 'DEGUSTADOR DE CHARUTOS', 'degustador de charutos', '842235', 0),
(1404, 'DEFUMADOR DE CARNES E PESCADOS', 'defumador de carnes e pescados', '848105', 0),
(1405, 'SALGADOR DE ALIMENTOS', 'salgador de alimentos', '848110', 0),
(1406, 'SALSICHEIRO (FABRICAÇÃO DE LINGÜIÇA, SALSICHA E PRODUTOS SIMILARES)', 'salsicheiro (fabricacao de lingüica, salsicha e produtos similares)', '848115', 0),
(1407, 'PASTEURIZADOR', 'pasteurizador', '848205', 0),
(1408, 'PADEIRO', 'padeiro', '848305', 0),
(1409, 'CONFEITEIRO', 'confeiteiro', '848310', 0),
(1410, 'QUEIJEIRO NA FABRICAÇÃO DE LATICÍNIO', 'queijeiro na fabricacao de laticinio', '848210', 0),
(1411, 'MANTEIGUEIRO NA FABRICAÇÃO DE LATICÍNIO', 'manteigueiro na fabricacao de laticinio', '848215', 0),
(1412, 'MASSEIRO (MASSAS ALIMENTÍCIAS)', 'masseiro (massas alimenticias)', '848315', 0),
(1413, 'TRABALHADOR DE FABRICAÇÃO DE SORVETE', 'trabalhador de fabricacao de sorvete', '848325', 0),
(1414, 'DEGUSTADOR DE CAFÉ', 'degustador de cafe', '848405', 0),
(1415, 'DEGUSTADOR DE CHÁ', 'degustador de cha', '848410', 0),
(1416, 'DEGUSTADOR DE DERIVADOS DE CACAU', 'degustador de derivados de cacau', '848415', 0),
(1417, 'DEGUSTADOR DE VINHOS OU LICORES', 'degustador de vinhos ou licores', '848420', 0),
(1418, 'CLASSIFICADOR DE GRÃOS', 'classificador de graos', '848425', 0),
(1419, 'ABATEDOR', 'abatedor', '848505', 0),
(1420, 'AÇOUGUEIRO', 'acougueiro', '848510', 0),
(1421, 'DESOSSADOR', 'desossador', '848515', 0),
(1422, 'MAGAREFE', 'magarefe', '848520', 0),
(1423, 'RETALHADOR DE CARNE', 'retalhador de carne', '848525', 0),
(1424, 'TRABALHADOR DO BENEFICIAMENTO DE FUMO', 'trabalhador do beneficiamento de fumo', '848605', 0),
(1425, 'PROFESSOR DE DIREITO DO ENSINO SUPERIOR', 'professor de direito do ensino superior', '234730', 0),
(1426, 'PROFESSOR DE FILOSOFIA DO ENSINO SUPERIOR', 'professor de filosofia do ensino superior', '234735', 0),
(1427, 'PROFESSOR DE GEOGRAFIA DO ENSINO SUPERIOR', 'professor de geografia do ensino superior', '234740', 0),
(1428, 'PROFESSOR DE HISTÓRIA DO ENSINO SUPERIOR', 'professor de historia do ensino superior', '234745', 0),
(1429, 'PROFESSOR DE JORNALISMO', 'professor de jornalismo', '234750', 0),
(1430, 'PROFESSOR DE MUSEOLOGIA DO ENSINO SUPERIOR', 'professor de museologia do ensino superior', '234755', 0),
(1431, 'PROFESSOR DE PSICOLOGIA DO ENSINO SUPERIOR', 'professor de psicologia do ensino superior', '234760', 0),
(1432, 'PROFESSOR DE SERVIÇO SOCIAL DO ENSINO SUPERIOR', 'professor de servico social do ensino superior', '234765', 0),
(1433, 'PROFESSOR DE SOCIOLOGIA DO ENSINO SUPERIOR', 'professor de sociologia do ensino superior', '234770', 0),
(1434, 'PROFESSOR DE ECONOMIA', 'professor de economia', '234805', 0),
(1435, 'PROFESSOR DE ADMINISTRAÇÃO', 'professor de administracao', '234810', 0),
(1436, 'PROFESSOR DE CONTABILIDADE', 'professor de contabilidade', '234815', 0),
(1437, 'PROFESSOR DE ARTES DO ESPETÁCULO NO ENSINO SUPERIOR', 'professor de artes do espetaculo no ensino superior', '234905', 0),
(1438, 'PROFESSOR DE ARTES VISUAIS NO ENSINO SUPERIOR (ARTES PLÁSTICAS E MULTIMÍDIA)', 'professor de artes visuais no ensino superior (artes plasticas e multimidia)', '234910', 0),
(1439, 'PROFESSOR DE MÚSICA NO ENSINO SUPERIOR', 'professor de musica no ensino superior', '234915', 0),
(1440, 'PROFESSOR DE ALUNOS COM DEFICIÊNCIA AUDITIVA E SURDOS', 'professor de alunos com deficiencia auditiva e surdos', '239205', 0),
(1441, 'PROFESSOR DE ALUNOS COM DEFICIÊNCIA FÍSICA', 'professor de alunos com deficiencia fisica', '239210', 0),
(1442, 'PROFESSOR DE ALUNOS COM DEFICIÊNCIA MENTAL', 'professor de alunos com deficiencia mental', '239215', 0),
(1443, 'PROFESSOR DE ALUNOS COM DEFICIÊNCIA MÚLTIPLA', 'professor de alunos com deficiencia multipla', '239220', 0),
(1444, 'PROFESSOR DE ALUNOS COM DEFICIÊNCIA VISUAL', 'professor de alunos com deficiencia visual', '239225', 0),
(1445, 'COORDENADOR PEDAGÓGICO', 'coordenador pedagogico', '239405', 0),
(1446, 'ORIENTADOR EDUCACIONAL', 'orientador educacional', '239410', 0),
(1447, 'PEDAGOGO', 'pedagogo', '239415', 0),
(1448, 'PROFESSOR DE LÍNGUA INGLESA', 'professor de lingua inglesa', '234616', 0),
(1449, 'PROFESSOR DE TÉCNICAS E RECURSOS AUDIOVISUAIS', 'professor de tecnicas e recursos audiovisuais', '239420', 0),
(1450, 'PSICOPEDAGOGO', 'psicopedagogo', '239425', 0),
(1451, 'SUPERVISOR DE ENSINO', 'supervisor de ensino', '239430', 0),
(1452, 'DESIGNER EDUCACIONAL', 'designer educacional', '239435', 0),
(1453, 'ADVOGADO', 'advogado', '241005', 1),
(1454, 'ADVOGADO DE EMPRESA', 'advogado de empresa', '241010', 0),
(1455, 'ADVOGADO (DIREITO CIVIL)', 'advogado (direito civil)', '241015', 0),
(1456, 'ADVOGADO (DIREITO PÚBLICO)', 'advogado (direito publico)', '241020', 0),
(1457, 'ADVOGADO (DIREITO PENAL)', 'advogado (direito penal)', '241025', 0),
(1458, 'ADVOGADO (ÁREAS ESPECIAIS)', 'advogado (areas especiais)', '241030', 0),
(1459, 'ADVOGADO (DIREITO DO TRABALHO)', 'advogado (direito do trabalho)', '241035', 0),
(1460, 'OPERADOR DE LAMINADOR DE BARRAS A QUENTE', 'operador de laminador de barras a quente', '821315', 0),
(1461, 'OPERADOR DE LAMINADOR DE METAIS NÃO-FERROSOS', 'operador de laminador de metais nao-ferrosos', '821320', 0),
(1462, 'OPERADOR DE LAMINADOR DE TUBOS', 'operador de laminador de tubos', '821325', 0),
(1463, 'OPERADOR DE MONTAGEM DE CILINDROS E MANCAIS', 'operador de montagem de cilindros e mancais', '821330', 0),
(1464, 'RECUPERADOR DE GUIAS E CILINDROS', 'recuperador de guias e cilindros', '821335', 0),
(1465, 'ENCARREGADO DE ACABAMENTO DE CHAPAS E METAIS (TÊMPERA)', 'encarregado de acabamento de chapas e metais (tempera)', '821405', 0),
(1466, 'ESCARFADOR', 'escarfador', '821410', 0),
(1467, 'MARCADOR DE PRODUTOS (SIDERÚRGICO E METALÚRGICO)', 'marcador de produtos (siderurgico e metalurgico)', '821415', 0),
(1468, 'OPERADOR DE BOBINADEIRA DE TIRAS A QUENTE, NO ACABAMENTO DE CHAPAS E METAIS', 'operador de bobinadeira de tiras a quente, no acabamento de chapas e metais', '821420', 0),
(1469, 'OPERADOR DE CABINE DE LAMINAÇÃO (FIO-MÁQUINA)', 'operador de cabine de laminacao (fio-maquina)', '821425', 0),
(1470, 'OPERADOR DE ESCÓRIA E SUCATA', 'operador de escoria e sucata', '821430', 0),
(1471, 'OPERADOR DE JATO ABRASIVO', 'operador de jato abrasivo', '821435', 0),
(1472, 'OPERADOR DE TESOURA MECÂNICA E MÁQUINA DE CORTE, NO ACABAMENTO DE CHAPAS E METAIS', 'operador de tesoura mecanica e maquina de corte, no acabamento de chapas e metais', '821440', 0),
(1473, 'PREPARADOR DE SUCATA E APARAS', 'preparador de sucata e aparas', '821445', 0),
(1474, 'REBARBADOR DE METAL', 'rebarbador de metal', '821450', 0),
(1475, 'FORNEIRO DE CUBILÔ', 'forneiro de cubilo', '822105', 0),
(1476, 'FORNEIRO DE FORNO-POÇO', 'forneiro de forno-poco', '822110', 0),
(1477, 'FORNEIRO DE FUNDIÇÃO (FORNO DE REDUÇÃO)', 'forneiro de fundicao (forno de reducao)', '822115', 0),
(1478, 'FORNEIRO DE REAQUECIMENTO E TRATAMENTO TÉRMICO NA METALURGIA', 'forneiro de reaquecimento e tratamento termico na metalurgia', '822120', 0),
(1479, 'FORNEIRO DE REVÉRBERO', 'forneiro de reverbero', '822125', 0),
(1480, 'PREPARADOR DE MASSA (FABRICAÇÃO DE ABRASIVOS)', 'preparador de massa (fabricacao de abrasivos)', '823105', 0),
(1481, 'PREPARADOR DE MASSA (FABRICAÇÃO DE VIDRO)', 'preparador de massa (fabricacao de vidro)', '823110', 0),
(1482, 'PREPARADOR DE MASSA DE ARGILA', 'preparador de massa de argila', '823115', 0),
(1483, 'PREPARADOR DE BARBOTINA', 'preparador de barbotina', '823120', 0),
(1484, 'PREPARADOR DE ESMALTES (CERÂMICA)', 'preparador de esmaltes (ceramica)', '823125', 0),
(1485, 'PREPARADOR DE ADITIVOS', 'preparador de aditivos', '823130', 0),
(1486, 'OPERADOR DE ATOMIZADOR', 'operador de atomizador', '823135', 0),
(1487, 'EXTRUSOR DE FIOS OU FIBRAS DE VIDRO', 'extrusor de fios ou fibras de vidro', '823210', 0),
(1488, 'PROFESSOR DE QUÍMICA NO ENSINO MÉDIO', 'professor de quimica no ensino medio', '232165', 0),
(1489, 'PROFESSOR DE SOCIOLOGIA NO ENSINO MÉDIO', 'professor de sociologia no ensino medio', '232170', 0),
(1490, 'PROFESSOR DA ÁREA DE MEIO AMBIENTE', 'professor da area de meio ambiente', '233105', 0),
(1491, 'PROFESSOR DE DESENHO TÉCNICO', 'professor de desenho tecnico', '233110', 0),
(1492, 'PROFESSOR DE TÉCNICAS AGRÍCOLAS', 'professor de tecnicas agricolas', '233115', 0),
(1493, 'PROFESSOR DE TÉCNICAS COMERCIAIS E SECRETARIAIS', 'professor de tecnicas comerciais e secretariais', '233120', 0),
(1494, 'PROFESSOR DE TÉCNICAS DE ENFERMAGEM', 'professor de tecnicas de enfermagem', '233125', 0),
(1495, 'PROFESSOR DE TÉCNICAS INDUSTRIAIS', 'professor de tecnicas industriais', '233130', 0),
(1496, 'PROFESSOR DE TECNOLOGIA E CÁLCULO TÉCNICO', 'professor de tecnologia e calculo tecnico', '233135', 0),
(1497, 'PSICÓLOGO DO TRABALHO', 'psicologo do trabalho', '251540', 0),
(1498, 'PSICANALISTA', 'psicanalista', '251550', 0),
(1499, 'PSICÓLOGO ACUPUNTURISTA', 'psicologo acupunturista', '251555', 0),
(1500, 'ASSISTENTE SOCIAL', 'assistente social', '251605', 1),
(1501, 'ECONOMISTA DOMÉSTICO', 'economista domestico', '251610', 0),
(1502, 'ADMINISTRADOR', 'administrador', '252105', 0),
(1503, 'AUDITOR (CONTADORES E AFINS)', 'auditor (contadores e afins)', '252205', 0),
(1504, 'CONTADOR', 'contador', '252210', 0),
(1505, 'PERITO CONTÁBIL', 'perito contabil', '252215', 0),
(1506, 'SECRETÁRIA EXECUTIVA', 'secretaria executiva', '252305', 1),
(1507, 'SECRETÁRIO BILÍNGÜE', 'secretario bilingüe', '252310', 0),
(1508, 'SECRETÁRIA TRILÍNGÜE', 'secretaria trilingüe', '252315', 0),
(1509, 'TECNÓLOGO EM SECRETARIADO ESCOLAR', 'tecnologo em secretariado escolar', '252320', 0),
(1510, 'ANALISTA DE RECURSOS HUMANOS', 'analista de recursos humanos', '252405', 0),
(1511, 'ANALISTA DE CÂMBIO', 'analista de cambio', '252510', 0),
(1512, 'ANALISTA DE CRÉDITO RURAL', 'analista de credito rural', '252530', 0),
(1513, 'ADMINISTRADOR DE FUNDOS E CARTEIRAS DE INVESTIMENTO', 'administrador de fundos e carteiras de investimento', '252505', 0),
(1514, 'ANALISTA DE COBRANÇA (INSTITUIÇÕES FINANCEIRAS)', 'analista de cobranca (instituicoes financeiras)', '252515', 0),
(1515, 'ANALISTA DE CRÉDITO (INSTITUIÇÕES FINANCEIRAS)', 'analista de credito (instituicoes financeiras)', '252525', 0),
(1516, 'ANALISTA DE LEASING', 'analista de leasing', '252535', 0),
(1517, 'ANALISTA DE PRODUTOS BANCÁRIOS', 'analista de produtos bancarios', '252540', 0),
(1518, 'SUPERVISOR DE MANUTENÇÃO ELETROMECÂNICA (UTILIDADES)', 'supervisor de manutencao eletromecanica (utilidades)', '860105', 0),
(1519, 'SUPERVISOR DE OPERAÇÃO DE FLUIDOS (DISTRIBUIÇÃO, CAPTAÇÃO, TRATAMENTO DE ÁGUA, GASES, VAPOR)', 'supervisor de operacao de fluidos (distribuicao, captacao, tratamento de agua, gases, vapor)', '860110', 0),
(1520, 'SUPERVISOR DE OPERAÇÃO ELÉTRICA (GERAÇÃO, TRANSMISSÃO E DISTRIBUIÇÃO DE ENERGIA ELÉTRICA)', 'supervisor de operacao eletrica (geracao, transmissao e distribuicao de energia eletrica)', '860115', 0),
(1521, 'OPERADOR DE CENTRAL HIDRELÉTRICA', 'operador de central hidreletrica', '861105', 0),
(1522, 'OPERADOR DE QUADRO DE DISTRIBUIÇÃO DE ENERGIA ELÉTRICA', 'operador de quadro de distribuicao de energia eletrica', '861110', 0),
(1523, 'OPERADOR DE CENTRAL TERMOELÉTRICA', 'operador de central termoeletrica', '861115', 0),
(1524, 'OPERADOR DE REATOR NUCLEAR', 'operador de reator nuclear', '861120', 0),
(1525, 'OPERADOR DE SUBESTAÇÃO', 'operador de subestacao', '861205', 0),
(1526, 'FOGUISTA (LOCOMOTIVAS A VAPOR)', 'foguista (locomotivas a vapor)', '862105', 0),
(1527, 'MAQUINISTA DE EMBARCAÇÕES', 'maquinista de embarcacoes', '862110', 0),
(1528, 'OPERADOR DE BATERIA DE GÁS DE HULHA', 'operador de bateria de gas de hulha', '862115', 0),
(1529, 'OPERADOR DE CALDEIRA', 'operador de caldeira', '862120', 0),
(1530, 'OPERADOR DE COMPRESSOR DE AR', 'operador de compressor de ar', '862130', 0),
(1531, 'OPERADOR DE ESTAÇÃO DE BOMBEAMENTO', 'operador de estacao de bombeamento', '862140', 0),
(1532, 'OPERADOR DE MÁQUINAS FIXAS, EM GERAL', 'operador de maquinas fixas, em geral', '862150', 0),
(1533, 'PROFESSOR DE LÍNGUA ALEMA', 'professor de lingua alema', '234604', 0),
(1534, 'PROFESSOR DE LÍNGUA ITALIANA', 'professor de lingua italiana', '234608', 0),
(1535, 'PROFESSOR DE LÍNGUA FRANCESA', 'professor de lingua francesa', '234612', 0),
(1536, 'PROFESSOR DE LÍNGUA ESPANHOLA', 'professor de lingua espanhola', '234620', 0),
(1537, 'PROFESSOR DE LÍNGUA PORTUGUESA', 'professor de lingua portuguesa', '234624', 0),
(1538, 'PROFESSOR DE LITERATURA BRASILEIRA', 'professor de literatura brasileira', '234628', 0),
(1539, 'PROFESSOR DE LITERATURA PORTUGUESA', 'professor de literatura portuguesa', '234632', 0),
(1540, 'PROFESSOR DE LITERATURA ALEMA', 'professor de literatura alema', '234636', 0),
(1541, 'PROFESSOR DE LITERATURA COMPARADA', 'professor de literatura comparada', '234640', 0),
(1542, 'PROFESSOR DE LITERATURA ESPANHOLA', 'professor de literatura espanhola', '234644', 0),
(1543, 'PROFESSOR DE LITERATURA FRANCESA', 'professor de literatura francesa', '234648', 0),
(1544, 'PROFESSOR DE LITERATURA INGLESA', 'professor de literatura inglesa', '234652', 0),
(1545, 'PROFESSOR DE LITERATURA ITALIANA', 'professor de literatura italiana', '234656', 0),
(1546, 'PROFESSOR DE LITERATURA DE LÍNGUAS ESTRANGEIRAS MODERNAS', 'professor de literatura de linguas estrangeiras modernas', '234660', 0),
(1547, 'PROFESSOR DE OUTRAS LÍNGUAS E LITERATURAS', 'professor de outras linguas e literaturas', '234664', 0),
(1548, 'PROFESSOR DE SEMIÓTICA', 'professor de semiotica', '234680', 0),
(1549, 'CUMIM', 'cumim', '513415', 0),
(1550, 'PROFESSOR DE LÍNGUAS ESTRANGEIRAS MODERNAS', 'professor de linguas estrangeiras modernas', '234668', 0),
(1551, 'PROFESSOR DE LINGÜÍSTICA E LINGÜÍSTICA APLICADA', 'professor de lingüistica e lingüistica aplicada', '234672', 0),
(1552, 'PROFESSOR DE FILOLOGIA E CRÍTICA TEXTUAL', 'professor de filologia e critica textual', '234676', 0),
(1553, 'PROFESSOR DE TEORIA DA LITERATURA', 'professor de teoria da literatura', '234684', 0),
(1554, 'PROFESSOR DE ANTROPOLOGIA DO ENSINO SUPERIOR', 'professor de antropologia do ensino superior', '234705', 0),
(1555, 'PROFESSOR DE ARQUIVOLOGIA DO ENSINO SUPERIOR', 'professor de arquivologia do ensino superior', '234710', 0),
(1556, 'PROFESSOR DE BIBLIOTECONOMIA DO ENSIO SUPERIOR', 'professor de biblioteconomia do ensio superior', '234715', 0),
(1557, 'PROFESSOR DE CIÊNCIA POLÍTICA DO ENSINO SUPERIOR', 'professor de ciencia politica do ensino superior', '234720', 0),
(1558, 'PROFESSOR DE COMUNICAÇÃO SOCIAL DO ENSINO SUPERIOR', 'professor de comunicacao social do ensino superior', '234725', 0),
(1559, 'OPERADOR DE PRODUÇÃO (QUÍMICA, PETROQUÍMICA E AFINS)', 'operador de producao (quimica, petroquimica e afins)', '813125', 0),
(1560, 'TÉCNICO DE OPERAÇÃO (QUÍMICA, PETROQUÍMICA E AFINS)', 'tecnico de operacao (quimica, petroquimica e afins)', '813130', 0),
(1561, 'ASSISTENTE DE LABORATÓRIO INDUSTRIAL', 'assistente de laboratorio industrial', '818105', 0),
(1562, 'AUXILIAR DE LABORATÓRIO DE ANÁLISES FÍSICO-QUÍMICAS', 'auxiliar de laboratorio de analises fisico-quimicas', '818110', 0),
(1563, 'MESTRE DE ACIARIA', 'mestre de aciaria', '820110', 0),
(1564, 'MESTRE DE ALTO-FORNO', 'mestre de alto-forno', '820115', 0),
(1565, 'MESTRE DE FORNO ELÉTRICO', 'mestre de forno eletrico', '820120', 0),
(1566, 'MESTRE DE LAMINAÇÃO', 'mestre de laminacao', '820125', 0),
(1567, 'SUPERVISOR DE FABRICAÇÃO DE PRODUTOS CERÂMICOS, PORCELANATOS E AFINS', 'supervisor de fabricacao de produtos ceramicos, porcelanatos e afins', '820205', 0),
(1568, 'SUPERVISOR DE FABRICAÇÃO DE PRODUTOS DE VIDRO', 'supervisor de fabricacao de produtos de vidro', '820210', 0),
(1569, 'OPERADOR DE CENTRO DE CONTROLE', 'operador de centro de controle', '821105', 0),
(1570, 'OPERADOR DE MÁQUINA DE SINTERIZAR', 'operador de maquina de sinterizar', '821110', 0),
(1571, 'FORNEIRO E OPERADOR (ALTO-FORNO)', 'forneiro e operador (alto-forno)', '821205', 0),
(1572, 'FORNEIRO E OPERADOR (CONVERSOR A OXIGÊNIO)', 'forneiro e operador (conversor a oxigenio)', '821210', 0),
(1573, 'DIRETOR DE REDAÇÃO', 'diretor de redacao', '261115', 0),
(1574, 'JORNALISTA', 'jornalista', '261125', 0),
(1575, 'PRODUTOR DE TEXTO', 'produtor de texto', '261130', 0),
(1576, 'REPÓRTER (EXCLUSIVE RÁDIO E TELEVISÃO)', 'reporter (exclusive radio e televisao)', '261135', 0),
(1577, 'REVISOR DE TEXTO', 'revisor de texto', '261140', 0),
(1578, 'BIBLIOTECÁRIO', 'bibliotecario', '261205', 0),
(1579, 'DOCUMENTALISTA', 'documentalista', '261210', 0),
(1580, 'ANALISTA DE INFORMAÇÕES (PESQUISADOR DE INFORMAÇÕES DE REDE)', 'analista de informacoes (pesquisador de informacoes de rede)', '261215', 0),
(1581, 'ARQUIVISTA', 'arquivista', '261305', 0),
(1582, 'MUSEÓLOGO', 'museologo', '261310', 0),
(1583, 'FILÓLOGO', 'filologo', '261405', 0),
(1584, 'INTÉRPRETE', 'interprete', '261410', 0),
(1585, 'LINGÜISTA', 'lingüista', '261415', 0),
(1586, 'TRADUTOR', 'tradutor', '261420', 0),
(1587, 'INSTRUTOR DE APRENDIZAGEM E TREINAMENTO AGROPECUÁRIO', 'instrutor de aprendizagem e treinamento agropecuario', '233205', 0),
(1588, 'INSTRUTOR DE APRENDIZAGEM E TREINAMENTO INDUSTRIAL', 'instrutor de aprendizagem e treinamento industrial', '233210', 0),
(1589, 'PROFESSOR DE APRENDIZAGEM E TREINAMENTO COMERCIAL', 'professor de aprendizagem e treinamento comercial', '233215', 0),
(1590, 'PROFESSOR INSTRUTOR DE ENSINO E APRENDIZAGEM AGROFLORESTAL', 'professor instrutor de ensino e aprendizagem agroflorestal', '233220', 0),
(1591, 'PROFESSOR INSTRUTOR DE ENSINO E APRENDIZAGEM EM SERVIÇOS', 'professor instrutor de ensino e aprendizagem em servicos', '233225', 0),
(1592, 'PROFESSOR DE MATEMÁTICA APLICADA (NO ENSINO SUPERIOR)', 'professor de matematica aplicada (no ensino superior)', '234105', 0),
(1593, 'PROFESSOR DE MATEMÁTICA PURA (NO ENSINO SUPERIOR)', 'professor de matematica pura (no ensino superior)', '234110', 0),
(1594, 'SENADOR', 'senador', '111105', 0),
(1595, 'PROFESSOR DE ESTATÍSTICA (NO ENSINO SUPERIOR)', 'professor de estatistica (no ensino superior)', '234115', 0),
(1596, 'PROFESSOR DE COMPUTAÇÃO (NO ENSINO SUPERIOR)', 'professor de computacao (no ensino superior)', '234120', 0),
(1597, 'MÉDICO RESIDENTE', 'medico residente', '2231F9', 0),
(1598, 'PROFESSOR DE PESQUISA OPERACIONAL (NO ENSINO SUPERIOR)', 'professor de pesquisa operacional (no ensino superior)', '234125', 0),
(1599, 'PROFESSOR DE FÍSICA (ENSINO SUPERIOR)', 'professor de fisica (ensino superior)', '234205', 0),
(1600, 'PROFESSOR DE QUÍMICA (ENSINO SUPERIOR)', 'professor de quimica (ensino superior)', '234210', 0),
(1601, 'PROFESSOR DE ASTRONOMIA (ENSINO SUPERIOR)', 'professor de astronomia (ensino superior)', '234215', 0),
(1602, 'PROFESSOR DE ARQUITETURA', 'professor de arquitetura', '234305', 0),
(1603, 'PROFESSOR DE ENGENHARIA', 'professor de engenharia', '234310', 0),
(1604, 'PROFESSOR DE GEOFÍSICA', 'professor de geofisica', '234315', 0),
(1605, 'PROFESSOR DE GEOLOGIA', 'professor de geologia', '234320', 0),
(1606, 'PROFESSOR DE CIÊNCIAS BIOLÓGICAS DO ENSINO SUPERIOR', 'professor de ciencias biologicas do ensino superior', '234405', 0),
(1607, 'PROFESSOR DE EDUCAÇÃO FÍSICA NO ENSINO SUPERIOR', 'professor de educacao fisica no ensino superior', '234410', 0),
(1608, 'PROFESSOR DE ENFERMAGEM DO ENSINO SUPERIOR', 'professor de enfermagem do ensino superior', '234415', 0),
(1609, 'PROFESSOR DE FARMÁCIA E BIOQUÍMICA', 'professor de farmacia e bioquimica', '234420', 0),
(1610, 'PROFESSOR DE FISIOTERAPIA', 'professor de fisioterapia', '234425', 0),
(1611, 'PROFESSOR DE FONOAUDIOLOGIA', 'professor de fonoaudiologia', '234430', 0),
(1612, 'PROFESSOR DE MEDICINA', 'professor de medicina', '234435', 0),
(1613, 'PROFESSOR DE MEDICINA VETERINÁRIA', 'professor de medicina veterinaria', '234440', 0),
(1614, 'PROFESSOR DE NUTRIÇÃO', 'professor de nutricao', '234445', 0),
(1615, 'PROFESSOR DE ODONTOLOGIA', 'professor de odontologia', '234450', 0),
(1616, 'PROFESSOR DE TERAPIA OCUPACIONAL', 'professor de terapia ocupacional', '234455', 0),
(1617, 'PROFESSOR DE ZOOTECNIA DO ENSINO SUPERIOR', 'professor de zootecnia do ensino superior', '234460', 0),
(1618, 'PROFESSOR DE ENSINO SUPERIOR NA ÁREA DE DIDÁTICA', 'professor de ensino superior na area de didatica', '234505', 0),
(1619, 'PROFESSOR DE ENSINO SUPERIOR NA ÁREA DE ORIENTAÇÃO EDUCACIONAL', 'professor de ensino superior na area de orientacao educacional', '234510', 0),
(1620, 'TÉCNICO DE PAINEL DE CONTROLE', 'tecnico de painel de controle', '391220', 0),
(1621, 'PROFESSOR DE ENSINO SUPERIOR NA ÁREA DE PESQUISA EDUCACIONAL', 'professor de ensino superior na area de pesquisa educacional', '234515', 0),
(1622, 'PROFESSOR DE ENSINO SUPERIOR NA ÁREA DE PRÁTICA DE ENSINO', 'professor de ensino superior na area de pratica de ensino', '234520', 0),
(1623, 'FORNEIRO NA FUNDIÇÃO DE VIDRO', 'forneiro na fundicao de vidro', '823215', 0),
(1624, 'FORNEIRO NO RECOZIMENTO DE VIDRO', 'forneiro no recozimento de vidro', '823220', 0),
(1625, 'MOLDADOR DE ABRASIVOS NA FABRICAÇÃO DE CERÂMICA, VIDRO E PORCELANA', 'moldador de abrasivos na fabricacao de ceramica, vidro e porcelana', '823230', 0),
(1626, 'OPERADOR DE BANHO METÁLICO DE VIDRO POR FLUTUAÇÃO', 'operador de banho metalico de vidro por flutuacao', '823235', 0),
(1627, 'OPERADOR DE MÁQUINA DE SOPRAR VIDRO', 'operador de maquina de soprar vidro', '823240', 0),
(1628, 'OPERADOR DE MÁQUINA EXTRUSORA DE VARETAS E TUBOS DE VIDRO', 'operador de maquina extrusora de varetas e tubos de vidro', '823245', 0),
(1629, 'OPERADOR DE PRENSA DE MOLDAR VIDRO', 'operador de prensa de moldar vidro', '823250', 0),
(1630, 'TEMPERADOR DE VIDRO', 'temperador de vidro', '823255', 0),
(1631, 'TRABALHADOR NA FABRICAÇÃO DE PRODUTOS ABRASIVOS', 'trabalhador na fabricacao de produtos abrasivos', '823265', 0),
(1632, 'CLASSIFICADOR E EMPILHADOR DE TIJOLOS REFRATÁRIOS', 'classificador e empilhador de tijolos refratarios', '823305', 0),
(1633, 'FORNEIRO (MATERIAIS DE CONSTRUÇÃO)', 'forneiro (materiais de construcao)', '823315', 0),
(1634, 'TRABALHADOR DA ELABORAÇÃO DE PRÉ-FABRICADOS (CIMENTO AMIANTO)', 'trabalhador da elaboracao de pre-fabricados (cimento amianto)', '823320', 0),
(1635, 'MOEDOR DE SAL', 'moedor de sal', '841205', 0),
(1636, 'TRABALHADOR DA ELABORAÇÃO DE PRÉ-FABRICADOS (CONCRETO ARMADO)', 'trabalhador da elaboracao de pre-fabricados (concreto armado)', '823325', 0),
(1637, 'TRABALHADOR DA FABRICAÇÃO DE PEDRAS ARTIFICIAIS', 'trabalhador da fabricacao de pedras artificiais', '823330', 0),
(1638, 'OLEIRO (FABRICAÇÃO DE TELHAS)', 'oleiro (fabricacao de telhas)', '828105', 0),
(1639, 'OLEIRO (FABRICAÇÃO DE TIJOLOS)', 'oleiro (fabricacao de tijolos)', '828110', 0),
(1640, 'MESTRE (INDÚSTRIA DE CELULOSE, PAPEL E PAPELÃO)', 'mestre (industria de celulose, papel e papelao)', '830105', 0),
(1641, 'CILINDREIRO NA PREPARAÇÃO DE PASTA PARA FABRICAÇÃO DE PAPEL', 'cilindreiro na preparacao de pasta para fabricacao de papel', '831105', 0),
(1642, 'OPERADOR DE BRANQUEADOR DE PASTA PARA FABRICAÇÃO DE PAPEL', 'operador de branqueador de pasta para fabricacao de papel', '831110', 0),
(1643, 'OPERADOR DE DIGESTOR DE PASTA PARA FABRICAÇÃO DE PAPEL', 'operador de digestor de pasta para fabricacao de papel', '831115', 0),
(1644, 'ARBITRO DE BASQUETE', 'arbitro de basquete', '377215', 0),
(1645, 'ARBITRO DE FUTEBOL', 'arbitro de futebol', '377220', 0),
(1646, 'ARBITRO DE FUTEBOL DE SALÃO', 'arbitro de futebol de salao', '377225', 0),
(1647, 'ARBITRO DE JUDÔ', 'arbitro de judo', '377230', 0),
(1648, 'ARBITRO DE KARATÊ', 'arbitro de karate', '377235', 0),
(1649, 'ARBITRO DE POLÓ AQUÁTICO', 'arbitro de polo aquatico', '377240', 0),
(1650, 'ARBITRO DE VÔLEI', 'arbitro de volei', '377245', 0),
(1651, 'CRONOANALISTA', 'cronoanalista', '391105', 0),
(1652, 'CRONOMETRISTA', 'cronometrista', '391110', 0),
(1653, 'CONTROLADOR DE ENTRADA E SAÍDA', 'controlador de entrada e saida', '391115', 0),
(1654, 'PLANEJISTA', 'planejista', '391120', 0),
(1655, 'TÉCNICO DE PLANEJAMENTO DE PRODUÇÃO', 'tecnico de planejamento de producao', '391125', 0),
(1656, 'TÉCNICO DE PLANEJAMENTO E PROGRAMAÇÃO DA MANUTENÇÃO', 'tecnico de planejamento e programacao da manutencao', '391130', 0),
(1657, 'TÉCNICO DE MATÉRIA-PRIMA E MATERIAL', 'tecnico de materia-prima e material', '391135', 0),
(1658, 'INSPETOR DE QUALIDADE', 'inspetor de qualidade', '391205', 0),
(1659, 'TÉCNICO DE GARANTIA DA QUALIDADE', 'tecnico de garantia da qualidade', '391210', 0),
(1660, 'OPERADOR DE INSPEÇÃO DE QUALIDADE', 'operador de inspecao de qualidade', '391215', 0),
(1661, 'ESCOLHEDOR DE PAPEL', 'escolhedor de papel', '391225', 0),
(1662, 'TÉCNICO OPERACIONAL DE SERVIÇOS DE CORREIOS', 'tecnico operacional de servicos de correios', '391230', 0),
(1663, 'TÉCNICO DE APOIO EM PESQUISA E DESENVOLVIMENTO (EXCETO AGROPECUÁRIO E FLORESTAL)', 'tecnico de apoio em pesquisa e desenvolvimento (exceto agropecuario e florestal)', '395105', 0),
(1664, 'TÉCNICO DE APOIO EM PESQUISA E DESENVOLVIMENTO AGROPECUÁRIO FLORESTAL', 'tecnico de apoio em pesquisa e desenvolvimento agropecuario florestal', '395110', 0),
(1665, 'SUPERVISOR ADMINISTRATIVO', 'supervisor administrativo', '410105', 0),
(1666, 'SUPERVISOR DE ALMOXARIFADO', 'supervisor de almoxarifado', '410205', 0),
(1667, 'SUPERVISOR DE CÂMBIO', 'supervisor de cambio', '410210', 0);
INSERT INTO `cbos` (`id`, `name`, `name_filter`, `code_2002`, `is_active`) VALUES
(1668, 'SUPERVISOR DE CONTAS A PAGAR', 'supervisor de contas a pagar', '410215', 0),
(1669, 'SUPERVISOR DE CONTROLE PATRIMONIAL', 'supervisor de controle patrimonial', '410220', 0),
(1670, 'SUPERVISOR DE CRÉDITO E COBRANÇA', 'supervisor de credito e cobranca', '410225', 0),
(1671, 'SUPERVISOR DE ORÇAMENTO', 'supervisor de orcamento', '410230', 0),
(1672, 'SUPERVISOR DE TESOURARIA', 'supervisor de tesouraria', '410235', 0),
(1673, 'AUXILIAR DE ESCRITÓRIO, EM GERAL', 'auxiliar de escritorio, em geral', '411005', 0),
(1674, 'ASSISTENTE ADMINISTRATIVO', 'assistente administrativo', '411010', 1),
(1675, 'ATENDENTE DE JUDICIÁRIO', 'atendente de judiciario', '411015', 0),
(1676, 'AUXILIAR DE JUDICIÁRIO', 'auxiliar de judiciario', '411020', 0),
(1677, 'AUXILIAR DE CARTÓRIO', 'auxiliar de cartorio', '411025', 0),
(1678, 'AUXILIAR DE PESSOAL', 'auxiliar de pessoal', '411030', 0),
(1679, 'AUXILIAR DE ESTATÍSTICA', 'auxiliar de estatistica', '411035', 0),
(1680, 'AUXILIAR DE SEGUROS', 'auxiliar de seguros', '411040', 0),
(1681, 'DATILÓGRAFO', 'datilografo', '412105', 0),
(1682, 'AUXILIAR DE SERVIÇOS DE IMPORTAÇÃO E EXPORTAÇÃO', 'auxiliar de servicos de importacao e exportacao', '411045', 0),
(1683, 'AGENTE DE MICROCRÉDITO', 'agente de microcredito', '411050', 0),
(1684, 'DIGITADOR', 'digitador', '412110', 0),
(1685, 'OPERADOR DE MENSAGENS DE TELECOMUNICAÇÕES (CORREIOS)', 'operador de mensagens de telecomunicacoes (correios)', '412115', 0),
(1686, 'SUPERVISOR DE DIGITAÇÃO E OPERAÇÃO', 'supervisor de digitacao e operacao', '412120', 0),
(1687, 'CONTÍNUO', 'continuo', '412205', 0),
(1688, 'ANALISTA DE FOLHA DE PAGAMENTO', 'analista de folha de pagamento', '413105', 0),
(1689, 'AUXILIAR DE CONTABILIDADE', 'auxiliar de contabilidade', '413110', 0),
(1690, 'AUXILIAR DE FATURAMENTO', 'auxiliar de faturamento', '413115', 0),
(1691, 'ATENDENTE DE AGÊNCIA', 'atendente de agencia', '413205', 0),
(1692, 'CAIXA DE BANCO', 'caixa de banco', '413210', 0),
(1693, 'COMPENSADOR DE BANCO', 'compensador de banco', '413215', 0),
(1694, 'CONFERENTE DE SERVIÇOS BANCÁRIOS', 'conferente de servicos bancarios', '413220', 0),
(1695, 'ESCRITURÁRIO DE BANCO', 'escriturario de banco', '413225', 0),
(1696, 'OPERADOR DE COBRANÇA BANCÁRIA', 'operador de cobranca bancaria', '413230', 0),
(1697, 'ALMOXARIFE', 'almoxarife', '414105', 0),
(1698, 'ARMAZENISTA', 'armazenista', '414110', 0),
(1699, 'BALANCEIRO', 'balanceiro', '414115', 0),
(1700, 'APONTADOR DE MÃO-DE-OBRA', 'apontador de mao-de-obra', '414205', 0),
(1701, 'SUPERVISOR DE VIGILANTES', 'supervisor de vigilantes', '510310', 0),
(1702, 'COMISSÁRIO DE VÔO', 'comissario de voo', '511105', 0),
(1703, 'COMISSÁRIO DE TREM', 'comissario de trem', '511110', 0),
(1704, 'TAIFEIRO (EXCETO MILITARES)', 'taifeiro (exceto militares)', '511115', 0),
(1705, 'FISCAL DE TRANSPORTES COLETIVOS (EXCETO TREM)', 'fiscal de transportes coletivos (exceto trem)', '511205', 0),
(1706, 'DESPACHANTE DE TRANSPORTES COLETIVOS (EXCETO TREM)', 'despachante de transportes coletivos (exceto trem)', '511210', 0),
(1707, 'COBRADOR DE TRANSPORTES COLETIVOS (EXCETO TREM)', 'cobrador de transportes coletivos (exceto trem)', '511215', 0),
(1708, 'BILHETEIRO (ESTAÇÕES DE METRÔ, FERROVIÁRIAS E ASSEMELHADAS)', 'bilheteiro (estacoes de metro, ferroviarias e assemelhadas)', '511220', 0),
(1709, 'GUIA DE TURISMO', 'guia de turismo', '511405', 0),
(1710, 'EMPREGADO DOMÉSTICO NOS SERVIÇOS GERAIS', 'empregado domestico nos servicos gerais', '512105', 0),
(1711, 'EMPREGADO DOMÉSTICO ARRUMADOR', 'empregado domestico arrumador', '512110', 0),
(1712, 'EMPREGADO DOMÉSTICO FAXINEIRO', 'empregado domestico faxineiro', '512115', 0),
(1713, 'EMPREGADO DOMÉSTICO DIARISTA', 'empregado domestico diarista', '512120', 0),
(1714, 'MORDOMO DE RESIDÊNCIA', 'mordomo de residencia', '513105', 0),
(1715, 'MORDOMO DE HOTELARIA', 'mordomo de hotelaria', '513110', 0),
(1716, 'GOVERNANTA DE HOTELARIA', 'governanta de hotelaria', '513115', 0),
(1717, 'COZINHEIRO GERAL', 'cozinheiro geral', '513205', 0),
(1718, 'COZINHEIRO DO SERVIÇO DOMÉSTICO', 'cozinheiro do servico domestico', '513210', 0),
(1719, 'COZINHEIRO INDUSTRIAL', 'cozinheiro industrial', '513215', 0),
(1720, 'COZINHEIRO DE HOSPITAL', 'cozinheiro de hospital', '513220', 0),
(1721, 'COZINHEIRO DE EMBARCAÇÕES', 'cozinheiro de embarcacoes', '513225', 0),
(1722, 'CAMAREIRA DE TEATRO', 'camareira de teatro', '513305', 0),
(1723, 'CAMAREIRA DE TELEVISÃO', 'camareira de televisao', '513310', 0),
(1724, 'CAMAREIRO DE HOTEL', 'camareiro de hotel', '513315', 0),
(1725, 'CAMAREIRO DE EMBARCAÇÕES', 'camareiro de embarcacoes', '513320', 0),
(1726, 'GUARDA-ROUPEIRA DE CINEMA', 'guarda-roupeira de cinema', '513325', 0),
(1727, 'GARÇOM', 'garcom', '513405', 0),
(1728, 'OPERADOR DE UTILIDADE (PRODUÇÃO E DISTRIBUIÇÃO DE VAPOR, GÁS, ÓLEO, COMBUSTÍVEL, ENERGIA, OXIGÊNIO)', 'operador de utilidade (producao e distribuicao de vapor, gas, oleo, combustivel, energia, oxigenio)', '862155', 0),
(1729, 'OPERADOR DE ESTAÇÃO DE CAPTAÇÃO, TRATAMENTO E DISTRIBUIÇÃO DE ÁGUA', 'operador de estacao de captacao, tratamento e distribuicao de agua', '862205', 0),
(1730, 'OPERADOR DE ESTAÇÃO DE TRATAMENTO DE ÁGUA E EFLUENTES', 'operador de estacao de tratamento de agua e efluentes', '862305', 0),
(1731, 'OPERADOR DE FORNO DE INCINERAÇÃO NO TRATAMENTO DE ÁGUA, EFLUENTES E RESÍDUOS INDUSTRIAIS', 'operador de forno de incineracao no tratamento de agua, efluentes e residuos industriais', '862310', 0),
(1732, 'OPERADOR DE INSTALAÇÃO DE EXTRAÇÃO, PROCESSAMENTO, ENVASAMENTO E DISTRIBUIÇÃO DE GASES', 'operador de instalacao de extracao, processamento, envasamento e distribuicao de gases', '862405', 0),
(1733, 'OPERADOR DE INSTALAÇÃO DE REFRIGERAÇÃO', 'operador de instalacao de refrigeracao', '862505', 0),
(1734, 'OPERADOR DE REFRIGERAÇÃO COM AMÔNIA', 'operador de refrigeracao com amonia', '862510', 0),
(1735, 'OPERADOR DE INSTALAÇÃO DE AR-CONDICIONADO', 'operador de instalacao de ar-condicionado', '862515', 0),
(1736, 'ENCARREGADO DE MANUTENÇÃO MECÂNICA DE SISTEMAS OPERACIONAIS', 'encarregado de manutencao mecanica de sistemas operacionais', '910105', 0),
(1737, 'SUPERVISOR DE MANUTENÇÃO DE APARELHOS TÉRMICOS, DE CLIMATIZAÇÃO E DE REFRIGERAÇÃO', 'supervisor de manutencao de aparelhos termicos, de climatizacao e de refrigeracao', '910110', 0),
(1738, 'SUPERVISOR DE MANUTENÇÃO DE BOMBAS, MOTORES, COMPRESSORES E EQUIPAMENTOS DE TRANSMISSÃO', 'supervisor de manutencao de bombas, motores, compressores e equipamentos de transmissao', '910115', 0),
(1739, 'SUPERVISOR DE MANUTENÇÃO DE MÁQUINAS GRÁFICAS', 'supervisor de manutencao de maquinas graficas', '910120', 0),
(1740, 'SUPERVISOR DE MANUTENÇÃO DE MÁQUINAS INDUSTRIAIS TÊXTEIS', 'supervisor de manutencao de maquinas industriais texteis', '910125', 0),
(1741, 'SUPERVISOR DE MANUTENÇÃO DE MÁQUINAS OPERATRIZES E DE USINAGEM', 'supervisor de manutencao de maquinas operatrizes e de usinagem', '910130', 0),
(1742, 'SUPERVISOR DA MANUTENÇÃO E REPARAÇÃO DE VEÍCULOS LEVES', 'supervisor da manutencao e reparacao de veiculos leves', '910205', 0),
(1743, 'SUPERVISOR DA MANUTENÇÃO E REPARAÇÃO DE VEÍCULOS PESADOS', 'supervisor da manutencao e reparacao de veiculos pesados', '910210', 0),
(1744, 'SUPERVISOR DE REPAROS LINHAS FÉRREAS', 'supervisor de reparos linhas ferreas', '910905', 0),
(1745, 'SUPERVISOR DE MANUTENÇÃO DE VIAS FÉRREAS', 'supervisor de manutencao de vias ferreas', '910910', 0),
(1746, 'MECÂNICO DE MANUTENÇÃO DE BOMBA INJETORA (EXCETO DE VEÍCULOS AUTOMOTORES)', 'mecanico de manutencao de bomba injetora (exceto de veiculos automotores)', '911105', 0),
(1747, 'MECÂNICO DE MANUTENÇÃO DE BOMBAS', 'mecanico de manutencao de bombas', '911110', 0),
(1748, 'MECÂNICO DE MANUTENÇÃO DE COMPRESSORES DE AR', 'mecanico de manutencao de compressores de ar', '911115', 0),
(1749, 'MECÂNICO DE MANUTENÇÃO DE MOTORES DIESEL (EXCETO DE VEÍCULOS AUTOMOTORES)', 'mecanico de manutencao de motores diesel (exceto de veiculos automotores)', '911120', 0),
(1750, 'MECÂNICO DE MANUTENÇÃO DE REDUTORES', 'mecanico de manutencao de redutores', '911125', 0),
(1751, 'MECÂNICO DE MANUTENÇÃO DE TURBINAS (EXCETO DE AERONAVES)', 'mecanico de manutencao de turbinas (exceto de aeronaves)', '911130', 0),
(1752, 'MECÂNICO DE MANUTENÇÃO DE TURBOCOMPRESSORES', 'mecanico de manutencao de turbocompressores', '911135', 0),
(1753, 'MECÂNICO DE MANUTENÇÃO E INSTALAÇÃO DE APARELHOS DE CLIMATIZAÇÃO E REFRIGERAÇÃO', 'mecanico de manutencao e instalacao de aparelhos de climatizacao e refrigeracao', '911205', 0),
(1754, 'MECÂNICO DE MANUTENÇÃO DE MÁQUINAS, EM GERAL', 'mecanico de manutencao de maquinas, em geral', '911305', 0),
(1755, 'MECÂNICO DE MANUTENÇÃO DE MÁQUINAS GRÁFICAS', 'mecanico de manutencao de maquinas graficas', '911310', 0),
(1756, 'MECÂNICO DE MANUTENÇÃO DE MÁQUINAS OPERATRIZES (LAVRA DE MADEIRA)', 'mecanico de manutencao de maquinas operatrizes (lavra de madeira)', '911315', 0),
(1757, 'MECÂNICO DE MANUTENÇÃO DE MÁQUINAS TÊXTEIS', 'mecanico de manutencao de maquinas texteis', '911320', 0),
(1758, 'MECÂNICO DE MANUTENÇÃO DE MÁQUINAS-FERRAMENTAS (USINAGEM DE METAIS)', 'mecanico de manutencao de maquinas-ferramentas (usinagem de metais)', '911325', 0),
(1759, 'MECÂNICO DE MANUTENÇÃO DE APARELHOS DE LEVANTAMENTO', 'mecanico de manutencao de aparelhos de levantamento', '913105', 0),
(1760, 'MECÂNICO DE MANUTENÇÃO DE EQUIPAMENTO DE MINERAÇÃO', 'mecanico de manutencao de equipamento de mineracao', '913110', 0),
(1761, 'MECÂNICO DE MANUTENÇÃO DE MÁQUINAS AGRÍCOLAS', 'mecanico de manutencao de maquinas agricolas', '913115', 0),
(1762, 'MECÂNICO DE MANUTENÇÃO DE MÁQUINAS DE CONSTRUÇÃO E TERRAPLENAGEM', 'mecanico de manutencao de maquinas de construcao e terraplenagem', '913120', 0),
(1763, 'MECÂNICO DE MANUTENÇÃO DE AERONAVES, EM GERAL', 'mecanico de manutencao de aeronaves, em geral', '914105', 0),
(1764, 'MECÂNICO DE MANUTENÇÃO DE SISTEMA HIDRÁULICO DE AERONAVES (SERVIÇOS DE PISTA E HANGAR)', 'mecanico de manutencao de sistema hidraulico de aeronaves (servicos de pista e hangar)', '914110', 0),
(1765, 'BALANCEADOR', 'balanceador', '992110', 0),
(1766, 'MECÂNICO DE MANUTENÇÃO DE MOTORES E EQUIPAMENTOS NAVAIS', 'mecanico de manutencao de motores e equipamentos navais', '914205', 0),
(1767, 'MECÂNICO DE MANUTENÇÃO DE VEÍCULOS FERROVIÁRIOS', 'mecanico de manutencao de veiculos ferroviarios', '914305', 0),
(1768, 'MECÂNICO DE MANUTENÇÃO DE AUTOMÓVEIS, MOTOCICLETAS E VEÍCULOS SIMILARES', 'mecanico de manutencao de automoveis, motocicletas e veiculos similares', '914405', 0),
(1769, 'MECÂNICO DE MANUTENÇÃO DE EMPILHADEIRAS E OUTROS VEÍCULOS DE CARGAS LEVES', 'mecanico de manutencao de empilhadeiras e outros veiculos de cargas leves', '914410', 0),
(1770, 'OPERADOR ELETROMECÂNICO', 'operador eletromecanico', '954125', 0),
(1771, 'REPARADOR DE APARELHOS ELETRODOMÉSTICOS (EXCETO IMAGEM E SOM)', 'reparador de aparelhos eletrodomesticos (exceto imagem e som)', '954205', 0),
(1772, 'REPARADOR DE RÁDIO, TV E SOM', 'reparador de radio, tv e som', '954210', 0),
(1773, 'REPARADOR DE EQUIPAMENTOS DE ESCRITÓRIO', 'reparador de equipamentos de escritorio', '954305', 0),
(1774, 'CONSERVADOR DE VIA PERMANENTE (TRILHOS)', 'conservador de via permanente (trilhos)', '991105', 0),
(1775, 'CHEFE DE PORTARIA DE HOTEL', 'chefe de portaria de hotel', '510120', 0),
(1776, 'INSPETOR DE VIA PERMANENTE (TRILHOS)', 'inspetor de via permanente (trilhos)', '991110', 0),
(1777, 'OPERADOR DE MÁQUINAS ESPECIAIS EM CONSERVAÇÃO DE VIA PERMANENTE (TRILHOS)', 'operador de maquinas especiais em conservacao de via permanente (trilhos)', '991115', 0),
(1778, 'SOLDADOR ALUMINOTÉRMICO EM CONSERVAÇÃO DE TRILHOS', 'soldador aluminotermico em conservacao de trilhos', '991120', 0),
(1779, 'MANTENEDOR DE EQUIPAMENTOS DE PARQUES DE DIVERSÕES E SIMILARES', 'mantenedor de equipamentos de parques de diversoes e similares', '991205', 0),
(1780, 'FUNILEIRO DE VEÍCULOS (REPARAÇÃO)', 'funileiro de veiculos (reparacao)', '991305', 0),
(1781, 'MONTADOR DE VEÍCULOS (REPARAÇÃO)', 'montador de veiculos (reparacao)', '991310', 0),
(1782, 'PINTOR DE VEÍCULOS (REPARAÇÃO)', 'pintor de veiculos (reparacao)', '991315', 0),
(1783, 'BORRACHEIRO', 'borracheiro', '992115', 0),
(1784, 'LAVADOR DE PEÇAS', 'lavador de pecas', '992120', 0),
(1785, 'ENCARREGADO GERAL DE OPERAÇÕES DE CONSERVAÇÃO DE VIAS PERMANENTES (EXCETO TRILHOS)', 'encarregado geral de operacoes de conservacao de vias permanentes (exceto trilhos)', '992205', 0),
(1786, 'LOCALIZADOR (COBRADOR)', 'localizador (cobrador)', '421315', 0),
(1787, 'ENCARREGADO DE EQUIPE DE CONSERVAÇÃO DE VIAS PERMANENTES (EXCETO TRILHOS)', 'encarregado de equipe de conservacao de vias permanentes (exceto trilhos)', '992210', 0),
(1788, 'OPERADOR DE CEIFADEIRA NA CONSERVAÇÃO DE VIAS PERMANENTES', 'operador de ceifadeira na conservacao de vias permanentes', '992215', 0),
(1789, 'PEDREIRO DE CONSERVAÇÃO DE VIAS PERMANENTES (EXCETO TRILHOS)', 'pedreiro de conservacao de vias permanentes (exceto trilhos)', '992220', 0),
(1790, 'AUXILIAR GERAL DE CONSERVAÇÃO DE VIAS PERMANENTES (EXCETO TRILHOS)', 'auxiliar geral de conservacao de vias permanentes (exceto trilhos)', '992225', 0),
(1791, 'ELETRICISTA DE INSTALAÇÕES (AERONAVES)', 'eletricista de instalacoes (aeronaves)', '953105', 0),
(1792, 'TRABALHADOR DA FABRICAÇÃO DE RESINAS E VERNIZES', 'trabalhador da fabricacao de resinas e vernizes', '811125', 0),
(1793, 'TRABALHADOR DE FABRICAÇÃO DE TINTAS', 'trabalhador de fabricacao de tintas', '811130', 0),
(1794, 'OPERADOR DE CALCINAÇÃO (TRATAMENTO QUÍMICO E AFINS)', 'operador de calcinacao (tratamento quimico e afins)', '811205', 0),
(1795, 'OPERADOR DE TRATAMENTO QUÍMICO DE MATERIAIS RADIOATIVOS', 'operador de tratamento quimico de materiais radioativos', '811215', 0),
(1796, 'OPERADOR DE CENTRIFUGADORA (TRATAMENTOS QUÍMICOS E AFINS)', 'operador de centrifugadora (tratamentos quimicos e afins)', '811305', 0),
(1797, 'OPERADOR DE EXPLORAÇÃO DE PETRÓLEO', 'operador de exploracao de petroleo', '811310', 0),
(1798, 'OPERADOR DE FILTRO DE SECAGEM (MINERAÇÃO)', 'operador de filtro de secagem (mineracao)', '811315', 0),
(1799, 'OPERADOR DE FILTRO DE TAMBOR ROTATIVO (TRATAMENTOS QUÍMICOS E AFINS)', 'operador de filtro de tambor rotativo (tratamentos quimicos e afins)', '811320', 0),
(1800, 'EDITOR', 'editor', '261120', 0),
(1801, 'ENGENHEIRO QUÍMICO (MINERAÇÃO, METALURGIA, SIDERURGIA, CIMENTEIRA E CERÂMICA)', 'engenheiro quimico (mineracao, metalurgia, siderurgia, cimenteira e ceramica)', '214515', 0),
(1802, 'ENGENHEIRO QUÍMICO (PETRÓLEO E BORRACHA)', 'engenheiro quimico (petroleo e borracha)', '214525', 0),
(1803, 'ENGENHEIRO QUÍMICO (UTILIDADES E MEIO AMBIENTE)', 'engenheiro quimico (utilidades e meio ambiente)', '214530', 0),
(1804, 'TECNÓLOGO EM PRODUÇÃO SULCROALCOOLEIRA', 'tecnologo em producao sulcroalcooleira', '214535', 0),
(1805, 'ENGENHEIRO DE MATERIAIS', 'engenheiro de materiais', '214605', 0),
(1806, 'ENGENHEIRO METALURGISTA', 'engenheiro metalurgista', '214610', 0),
(1807, 'TECNÓLOGO EM METALURGIA', 'tecnologo em metalurgia', '214615', 0),
(1808, 'ENGENHEIRO DE MINAS', 'engenheiro de minas', '214705', 0),
(1809, 'ENGENHEIRO DE MINAS (BENEFICIAMENTO)', 'engenheiro de minas (beneficiamento)', '214710', 0),
(1810, 'ENGENHEIRO DE MINAS (LAVRA A CÉU ABERTO)', 'engenheiro de minas (lavra a ceu aberto)', '214715', 0),
(1811, 'ENGENHEIRO DE MINAS (LAVRA SUBTERRÂNEA)', 'engenheiro de minas (lavra subterranea)', '214720', 0),
(1812, 'ENGENHEIRO DE MINAS (PESQUISA MINERAL)', 'engenheiro de minas (pesquisa mineral)', '214725', 0),
(1813, 'ENGENHEIRO DE MINAS (PLANEJAMENTO)', 'engenheiro de minas (planejamento)', '214730', 0),
(1814, 'ENGENHEIRO DE MINAS (PROCESSO)', 'engenheiro de minas (processo)', '214735', 0),
(1815, 'ENGENHEIRO DE MINAS (PROJETO)', 'engenheiro de minas (projeto)', '214740', 0),
(1816, 'TECNÓLOGO EM PETRÓLEO E GÁS', 'tecnologo em petroleo e gas', '214745', 0),
(1817, 'TECNÓLOGO EM ROCHAS ORNAMENTAIS', 'tecnologo em rochas ornamentais', '214750', 0),
(1818, 'ENGENHEIRO AGRIMENSOR', 'engenheiro agrimensor', '214805', 0),
(1819, 'ENGENHEIRO CARTÓGRAFO', 'engenheiro cartografo', '214810', 0),
(1820, 'ENGENHEIRO DE PRODUÇÃO', 'engenheiro de producao', '214905', 0),
(1821, 'ENGENHEIRO DE CONTROLE DE QUALIDADE', 'engenheiro de controle de qualidade', '214910', 0),
(1822, 'ENGENHEIRO DE SEGURANÇA DO TRABALHO', 'engenheiro de seguranca do trabalho', '214915', 0),
(1823, 'ENGENHEIRO DE RISCOS', 'engenheiro de riscos', '214920', 0),
(1824, 'ENGENHEIRO DE TEMPOS E MOVIMENTOS', 'engenheiro de tempos e movimentos', '214925', 0),
(1825, 'TECNÓLOGO EM PRODUÇÃO INDUSTRIAL', 'tecnologo em producao industrial', '214930', 0),
(1826, 'TECNÓLOGO EM SEGURANÇA DO TRABALHO', 'tecnologo em seguranca do trabalho', '214935', 0),
(1827, 'AGENTE DE MANOBRA E DOCAGEM', 'agente de manobra e docagem', '215105', 0),
(1828, 'CAPITÃO DE MANOBRA DA MARINHA MERCANTE', 'capitao de manobra da marinha mercante', '215110', 0),
(1829, 'COMANDANTE DA MARINHA MERCANTE', 'comandante da marinha mercante', '215115', 0),
(1830, 'COORDENADOR DE OPERAÇÕES DE COMBATE À POLUIÇÃO NO MEIO AQUAVIÁRIO', 'coordenador de operacoes de combate à poluicao no meio aquaviario', '215120', 0),
(1831, 'IMEDIATO DA MARINHA MERCANTE', 'imediato da marinha mercante', '215125', 0),
(1832, 'INSPETOR DE TERMINAL', 'inspetor de terminal', '215130', 0),
(1833, 'INSPETOR NAVAL', 'inspetor naval', '215135', 0),
(1834, 'OFICIAL DE QUARTO DE NAVEGAÇÃO DA MARINHA MERCANTE', 'oficial de quarto de navegacao da marinha mercante', '215140', 0),
(1835, 'PRÁTICO DE PORTOS DA MARINHA MERCANTE', 'pratico de portos da marinha mercante', '215145', 0),
(1836, 'VISTORIADOR NAVAL', 'vistoriador naval', '215150', 0),
(1837, 'OFICIAL SUPERIOR DE MÁQUINAS DA MARINHA MERCANTE', 'oficial superior de maquinas da marinha mercante', '215205', 0),
(1838, 'PRIMEIRO OFICIAL DE MÁQUINAS DA MARINHA MERCANTE', 'primeiro oficial de maquinas da marinha mercante', '215210', 0),
(1839, 'SEGUNDO OFICIAL DE MÁQUINAS DA MARINHA MERCANTE', 'segundo oficial de maquinas da marinha mercante', '215215', 0),
(1840, 'SUPERINTENDENTE TÉCNICO NO TRANSPORTE AQUAVIÁRIO', 'superintendente tecnico no transporte aquaviario', '215220', 0),
(1841, 'PILOTO DE AERONAVES', 'piloto de aeronaves', '215305', 0),
(1842, 'PILOTO DE ENSAIOS EM VÔO', 'piloto de ensaios em voo', '215310', 0),
(1843, 'INSTRUTOR DE VÔO', 'instrutor de voo', '215315', 0),
(1844, 'BIÓLOGO', 'biologo', '221105', 0),
(1845, 'BIOMÉDICO', 'biomedico', '221205', 0),
(1846, 'ENGENHEIRO AGRÍCOLA', 'engenheiro agricola', '222105', 0),
(1847, 'ENGENHEIRO AGRÔNOMO', 'engenheiro agronomo', '222110', 0),
(1848, 'ENGENHEIRO DE PESCA', 'engenheiro de pesca', '222115', 0),
(1849, 'ENGENHEIRO FLORESTAL', 'engenheiro florestal', '222120', 0),
(1850, 'ENGENHEIRO DE ALIMENTOS', 'engenheiro de alimentos', '222205', 0),
(1851, 'TECNÓLOGO EM ALIMENTOS', 'tecnologo em alimentos', '222215', 0),
(1852, 'MÉDICO BRONCOESOFALOGISTA', 'medico broncoesofalogista', '2231A1', 0),
(1853, 'SUSHIMAN', 'sushiman', '513615', 0),
(1854, 'MÉDICO CARDIOLOGISTA INTERVENCIONISTA', 'medico cardiologista intervencionista', '2231G1', 0),
(1855, 'MÉDICO EM ELETROENCEFALOGRAFIA', 'medico em eletroencefalografia', '223119', 0),
(1856, 'MECÂNICO DE MANUTENÇÃO DE MOTOCICLETAS', 'mecanico de manutencao de motocicletas', '914415', 0),
(1857, 'CHEFE DE BAR', 'chefe de bar', '510130', 0),
(1858, 'MAÎTRE', 'maître', '510135', 0),
(1859, 'MECÂNICO DE MANUTENÇÃO DE TRATORES', 'mecanico de manutencao de tratores', '914420', 0),
(1860, 'MECÂNICO DE VEÍCULOS AUTOMOTORES A DIESEL (EXCETO TRATORES)', 'mecanico de veiculos automotores a diesel (exceto tratores)', '914425', 0),
(1861, 'TÉCNICO EM MANUTENÇÃO DE INSTRUMENTOS DE MEDIÇÃO E PRECISÃO', 'tecnico em manutencao de instrumentos de medicao e precisao', '915105', 0),
(1862, 'TÉCNICO EM MANUTENÇÃO DE HIDRÔMETROS', 'tecnico em manutencao de hidrometros', '915110', 0),
(1863, 'TÉCNICO EM MANUTENÇÃO DE BALANÇAS', 'tecnico em manutencao de balancas', '915115', 0),
(1864, 'RESTAURADOR DE INSTRUMENTOS MUSICAIS (EXCETO CORDAS ARCADAS)', 'restaurador de instrumentos musicais (exceto cordas arcadas)', '915205', 0),
(1865, 'REPARADOR DE INSTRUMENTOS MUSICAIS', 'reparador de instrumentos musicais', '915210', 0),
(1866, 'LUTHIER (RESTAURAÇÃO DE CORDAS ARCADAS)', 'luthier (restauracao de cordas arcadas)', '915215', 0),
(1867, 'TÉCNICO EM MANUTENÇÃO DE EQUIPAMENTOS E INSTRUMENTOS MÉDICO-HOSPITALARES', 'tecnico em manutencao de equipamentos e instrumentos medico-hospitalares', '915305', 0),
(1868, 'REPARADOR DE EQUIPAMENTOS FOTOGRÁFICOS', 'reparador de equipamentos fotograficos', '915405', 0),
(1869, 'LUBRIFICADOR INDUSTRIAL', 'lubrificador industrial', '919105', 0),
(1870, 'LUBRIFICADOR DE VEÍCULOS AUTOMOTORES (EXCETO EMBARCAÇÕES)', 'lubrificador de veiculos automotores (exceto embarcacoes)', '919110', 0),
(1871, 'LUBRIFICADOR DE EMBARCAÇÕES', 'lubrificador de embarcacoes', '919115', 0),
(1872, 'MECÂNICO DE MANUTENÇÃO DE MÁQUINAS CORTADORAS DE GRAMA, ROÇADEIRAS, MOTOSSERRAS E SIMILARES', 'mecanico de manutencao de maquinas cortadoras de grama, rocadeiras, motosserras e similares', '919205', 0),
(1873, 'MECÂNICO DE MANUTENÇÃO DE APARELHOS ESPORTIVOS E DE GINÁSTICA', 'mecanico de manutencao de aparelhos esportivos e de ginastica', '919305', 0),
(1874, 'MECÂNICO DE MANUTENÇÃO DE BICICLETAS E VEÍCULOS SIMILARES', 'mecanico de manutencao de bicicletas e veiculos similares', '919310', 0),
(1875, 'MONTADOR DE BICICLETAS', 'montador de bicicletas', '919315', 0),
(1876, 'SUPERVISOR DE MANUTENÇÃO ELÉTRICA DE ALTA TENSÃO INDUSTRIAL', 'supervisor de manutencao eletrica de alta tensao industrial', '950105', 0),
(1877, 'SUPERVISOR DE MANUTENÇÃO ELETROMECÂNICA INDUSTRIAL, COMERCIAL E PREDIAL', 'supervisor de manutencao eletromecanica industrial, comercial e predial', '950110', 0),
(1878, 'ENCARREGADO DE MANUTENÇÃO ELÉTRICA DE VEÍCULOS', 'encarregado de manutencao eletrica de veiculos', '950205', 0),
(1879, 'SUPERVISOR DE MANUTENÇÃO ELETROMECÂNICA', 'supervisor de manutencao eletromecanica', '950305', 0),
(1880, 'ELETRICISTA DE MANUTENÇÃO ELETROELETRÔNICA', 'eletricista de manutencao eletroeletronica', '951105', 0),
(1881, 'INSTALADOR DE SISTEMAS ELETROELETRÔNICOS DE SEGURANÇA', 'instalador de sistemas eletroeletronicos de seguranca', '951305', 0),
(1882, 'MANTENEDOR DE SISTEMAS ELETROELETRÔNICOS DE SEGURANÇA', 'mantenedor de sistemas eletroeletronicos de seguranca', '951310', 0),
(1883, 'ELETRICISTA DE INSTALAÇÕES (EMBARCAÇÕES)', 'eletricista de instalacoes (embarcacoes)', '953110', 0),
(1884, 'ELETROMECÂNICO DE MANUTENÇÃO DE ELEVADORES', 'eletromecanico de manutencao de elevadores', '954105', 0),
(1885, 'ALINHADOR DE PNEUS', 'alinhador de pneus', '992105', 0),
(1886, 'ELETRICISTA DE INSTALAÇÕES (VEÍCULOS AUTOMOTORES E MÁQUINAS OPERATRIZES, EXCETO AERONAVES E EMBARCAÇÕES)', 'eletricista de instalacoes (veiculos automotores e maquinas operatrizes, exceto aeronaves e embarcacoes)', '953115', 0),
(1887, 'ELETROMECÂNICO DE MANUTENÇÃO DE ESCADAS ROLANTES', 'eletromecanico de manutencao de escadas rolantes', '954110', 0),
(1888, 'ELETROMECÂNICO DE MANUTENÇÃO DE PORTAS AUTOMÁTICAS', 'eletromecanico de manutencao de portas automaticas', '954115', 0),
(1889, 'MECÂNICO DE MANUTENÇÃO DE INSTALAÇÕES MECÂNICAS DE EDIFÍCIOS', 'mecanico de manutencao de instalacoes mecanicas de edificios', '954120', 0),
(1890, 'APONTADOR DE PRODUÇÃO', 'apontador de producao', '414210', 0),
(1891, 'CONFERENTE DE CARGA E DESCARGA', 'conferente de carga e descarga', '414215', 0),
(1892, 'ARQUIVISTA DE DOCUMENTOS', 'arquivista de documentos', '415105', 0),
(1893, 'CODIFICADOR DE DADOS', 'codificador de dados', '415115', 0),
(1894, 'FITOTECÁRIO', 'fitotecario', '415120', 0),
(1895, 'KARDEXISTA', 'kardexista', '415125', 0),
(1896, 'OPERADOR DE MÁQUINA COPIADORA (EXCETO OPERADOR DE GRÁFICA RÁPIDA)', 'operador de maquina copiadora (exceto operador de grafica rapida)', '415130', 0),
(1897, 'CARTEIRO', 'carteiro', '415205', 0),
(1898, 'OPERADOR DE TRIAGEM E TRANSBORDO', 'operador de triagem e transbordo', '415210', 0),
(1899, 'SUPERVISOR DE CAIXAS E BILHETEIROS (EXCETO CAIXA DE BANCO)', 'supervisor de caixas e bilheteiros (exceto caixa de banco)', '420105', 0),
(1900, 'SUPERVISOR DE COBRANÇA', 'supervisor de cobranca', '420110', 0),
(1901, 'SUPERVISOR DE COLETADORES DE APOSTAS E DE JOGOS', 'supervisor de coletadores de apostas e de jogos', '420115', 0),
(1902, 'SUPERVISOR DE ENTREVISTADORES E RECENSEADORES', 'supervisor de entrevistadores e recenseadores', '420120', 0),
(1903, 'SUPERVISOR DE RECEPCIONISTAS', 'supervisor de recepcionistas', '420125', 0),
(1904, 'SUPERVISOR DE TELEFONISTAS', 'supervisor de telefonistas', '420130', 0),
(1905, 'SUPERVISOR DE TELEMARKETING E ATENDIMENTO', 'supervisor de telemarketing e atendimento', '420135', 0),
(1906, 'ATENDENTE COMERCIAL (AGÊNCIA POSTAL)', 'atendente comercial (agencia postal)', '421105', 0),
(1907, 'BILHETEIRO DE TRANSPORTES COLETIVOS', 'bilheteiro de transportes coletivos', '421110', 0),
(1908, 'BILHETEIRO NO SERVIÇO DE DIVERSÕES', 'bilheteiro no servico de diversoes', '421115', 0),
(1909, 'EMISSOR DE PASSAGENS', 'emissor de passagens', '421120', 0),
(1910, 'OPERADOR DE CAIXA', 'operador de caixa', '421125', 0),
(1911, 'RECEBEDOR DE APOSTAS (LOTERIA)', 'recebedor de apostas (loteria)', '421205', 0),
(1912, 'RECEBEDOR DE APOSTAS (TURFE)', 'recebedor de apostas (turfe)', '421210', 0),
(1913, 'COBRADOR EXTERNO', 'cobrador externo', '421305', 0),
(1914, 'COBRADOR INTERNO', 'cobrador interno', '421310', 0),
(1915, 'RECEPCIONISTA DE CONSULTÓRIO MÉDICO OU DENTÁRIO', 'recepcionista de consultorio medico ou dentario', '422110', 0),
(1916, 'RECEPCIONISTA DE SEGURO SAÚDE', 'recepcionista de seguro saude', '422115', 0),
(1917, 'RECEPCIONISTA DE HOTEL', 'recepcionista de hotel', '422120', 0),
(1918, 'RECEPCIONISTA DE BANCO', 'recepcionista de banco', '422125', 0),
(1919, 'OPERADOR DE TELEMARKETING ATIVO', 'operador de telemarketing ativo', '422305', 0),
(1920, 'OPERADOR DE TELEMARKETING RECEPTIVO', 'operador de telemarketing receptivo', '422315', 0),
(1921, 'OPERADOR DE TELEMARKETING ATIVO E RECEPTIVO', 'operador de telemarketing ativo e receptivo', '422310', 0),
(1922, 'OPERADOR DE TELEMARKETING TÉCNICO', 'operador de telemarketing tecnico', '422320', 0),
(1923, 'DESPACHANTE DOCUMENTALISTA', 'despachante documentalista', '423105', 0),
(1924, 'DESPACHANTE DE TRÂNSITO', 'despachante de transito', '423110', 0),
(1925, 'ENTREVISTADOR CENSITÁRIO E DE PESQUISAS AMOSTRAIS', 'entrevistador censitario e de pesquisas amostrais', '424105', 0),
(1926, 'ENTREVISTADOR DE PESQUISA DE OPINIÃO E MÍDIA', 'entrevistador de pesquisa de opiniao e midia', '424110', 0),
(1927, 'ENTREVISTADOR DE PESQUISAS DE MERCADO', 'entrevistador de pesquisas de mercado', '424115', 0),
(1928, 'ENTREVISTADOR DE PREÇOS', 'entrevistador de precos', '424120', 0),
(1929, 'ESCRITURÁRIO EM ESTATÍSTICA', 'escriturario em estatistica', '424125', 0),
(1930, 'SUPERVISOR DE TRANSPORTES', 'supervisor de transportes', '510105', 0),
(1931, 'ADMINISTRADOR DE EDIFÍCIOS', 'administrador de edificios', '510110', 0),
(1932, 'SUPERVISOR DE ANDAR', 'supervisor de andar', '510115', 0),
(1933, 'TELEFONISTA', 'telefonista', '422205', 0),
(1934, 'TELEOPERADOR', 'teleoperador', '422210', 0),
(1935, 'SUPERVISOR DE LAVANDERIA', 'supervisor de lavanderia', '510205', 0),
(1936, 'SUPERVISOR DE BOMBEIROS', 'supervisor de bombeiros', '510305', 0),
(1937, 'ANALISTA FINANCEIRO (INSTITUIÇÕES FINANCEIRAS)', 'analista financeiro (instituicoes financeiras)', '252545', 0),
(1938, 'GESTOR EM SEGURANÇA', 'gestor em seguranca', '252605', 0),
(1939, 'REDATOR DE PUBLICIDADE', 'redator de publicidade', '253110', 0),
(1940, 'AGENTE PUBLICITÁRIO', 'agente publicitario', '253115', 0),
(1941, 'GERENTE DE CAPTAÇÃO (FUNDOS E INVESTIMENTOS INSTITUCIONAIS)', 'gerente de captacao (fundos e investimentos institucionais)', '253205', 0),
(1942, 'GERENTE DE CLIENTES ESPECIAIS (PRIVATE)', 'gerente de clientes especiais (private)', '253210', 0),
(1943, 'GERENTE DE CONTAS - PESSOA FÍSICA E JURÍDICA', 'gerente de contas - pessoa fisica e juridica', '253215', 0),
(1944, 'GERENTE DE GRANDES CONTAS (CORPORATE)', 'gerente de grandes contas (corporate)', '253220', 0),
(1945, 'OPERADOR DE NEGÓCIOS', 'operador de negocios', '253225', 0),
(1946, 'CORRETOR DE VALORES, ATIVOS FINANCEIROS, MERCADORIAS E DERIVATIVOS', 'corretor de valores, ativos financeiros, mercadorias e derivativos', '253305', 0),
(1947, 'AUDITOR-FISCAL DA RECEITA FEDERAL', 'auditor-fiscal da receita federal', '254105', 0),
(1948, 'TÉCNICO DA RECEITA FEDERAL', 'tecnico da receita federal', '254110', 0),
(1949, 'AUDITOR-FISCAL DA PREVIDÊNCIA SOCIAL', 'auditor-fiscal da previdencia social', '254205', 0),
(1950, 'AUDITOR-FISCAL DO TRABALHO', 'auditor-fiscal do trabalho', '254305', 0),
(1951, 'AGENTE DE HIGIENE E SEGURANÇA', 'agente de higiene e seguranca', '254310', 0),
(1952, 'FISCAL DE TRIBUTOS ESTADUAL', 'fiscal de tributos estadual', '254405', 0),
(1953, 'FISCAL DE TRIBUTOS MUNICIPAL', 'fiscal de tributos municipal', '254410', 0),
(1954, 'TÉCNICO DE TRIBUTOS ESTADUAL', 'tecnico de tributos estadual', '254415', 0),
(1955, 'TÉCNICO DE TRIBUTOS MUNICIPAL', 'tecnico de tributos municipal', '254420', 0),
(1956, 'ARQUIVISTA PESQUISADOR (JORNALISMO)', 'arquivista pesquisador (jornalismo)', '261105', 0),
(1957, 'ASSESSOR DE IMPRENSA', 'assessor de imprensa', '261110', 0),
(1958, 'CIRURGIÃO-DENTISTA DA ESTRATÉGIA DE SAÚDE DA FAMÍLIA', 'cirurgiao-dentista da estrategia de saude da familia', '223293', 0),
(1959, 'MÉDICO VETERINÁRIO', 'medico veterinario', '223305', 0),
(1960, 'ZOOTECNISTA', 'zootecnista', '223310', 0),
(1961, 'FARMACÊUTICO', 'farmaceutico', '223405', 0),
(1962, 'FARMACÊUTICO ANALISTA CLÍNICO', 'farmaceutico analista clinico', '223415', 0),
(1963, 'FARMACÊUTICO DE ALIMENTOS', 'farmaceutico de alimentos', '223420', 0),
(1964, 'DANÇARINO POPULAR', 'dancarino popular', '376110', 0),
(1965, 'ACROBATA', 'acrobata', '376205', 0),
(1966, 'ARTISTA AÉREO', 'artista aereo', '376210', 0),
(1967, 'ARTISTA DE CIRCO (OUTROS)', 'artista de circo (outros)', '376215', 0),
(1968, 'CONTORCIONISTA', 'contorcionista', '376220', 0),
(1969, 'DOMADOR DE ANIMAIS (CIRCENSE)', 'domador de animais (circense)', '376225', 0),
(1970, 'EQUILIBRISTA', 'equilibrista', '376230', 0),
(1971, 'MÁGICO', 'magico', '376235', 0),
(1972, 'MALABARISTA', 'malabarista', '376240', 0),
(1973, 'PALHAÇO', 'palhaco', '376245', 0),
(1974, 'TITERITEIRO', 'titeriteiro', '376250', 0),
(1975, 'TRAPEZISTA', 'trapezista', '376255', 0),
(1976, 'APRESENTADOR DE EVENTOS', 'apresentador de eventos', '376305', 0),
(1977, 'APRESENTADOR DE FESTAS POPULARES', 'apresentador de festas populares', '376310', 0),
(1978, 'BARMAN', 'barman', '513420', 0),
(1979, 'APRESENTADOR DE PROGRAMAS DE RÁDIO', 'apresentador de programas de radio', '376315', 0),
(1980, 'APRESENTADOR DE PROGRAMAS DE TELEVISÃO', 'apresentador de programas de televisao', '376320', 0),
(1981, 'APRESENTADOR DE CIRCO', 'apresentador de circo', '376325', 0),
(1982, 'MODELO ARTÍSTICO', 'modelo artistico', '376405', 0),
(1983, 'MODELO DE MODAS', 'modelo de modas', '376410', 0),
(1984, 'MODELO PUBLICITÁRIO', 'modelo publicitario', '376415', 0),
(1985, 'ATLETA PROFISSIONAL (OUTRAS MODALIDADES)', 'atleta profissional (outras modalidades)', '377105', 0),
(1986, 'GERENTE DE AGÊNCIA', 'gerente de agencia', '141710', 0),
(1987, 'ATLETA PROFISSIONAL DE FUTEBOL', 'atleta profissional de futebol', '377110', 0),
(1988, 'ATLETA PROFISSIONAL DE GOLFE', 'atleta profissional de golfe', '377115', 0),
(1989, 'ATLETA PROFISSIONAL DE LUTA', 'atleta profissional de luta', '377120', 0),
(1990, 'ATLETA PROFISSIONAL DE TÊNIS', 'atleta profissional de tenis', '377125', 0),
(1991, 'JÓQUEI', 'joquei', '377130', 0),
(1992, 'PILOTO DE COMPETIÇÃO AUTOMOBILÍSTICA', 'piloto de competicao automobilistica', '377135', 0),
(1993, 'PROFISSIONAL DE ATLETISMO', 'profissional de atletismo', '377140', 0),
(1994, 'PUGILISTA', 'pugilista', '377145', 0),
(1995, 'ARBITRO DESPORTIVO', 'arbitro desportivo', '377205', 0),
(1996, 'ARBITRO DE ATLETISMO', 'arbitro de atletismo', '377210', 0),
(1997, 'CABO BOMBEIRO MILITAR', 'cabo bombeiro militar', '31205', 0),
(1998, 'SOLDADO BOMBEIRO MILITAR', 'soldado bombeiro militar', '31210', 0),
(1999, 'DEPUTADO FEDERAL', 'deputado federal', '111110', 0),
(2000, 'DEPUTADO ESTADUAL E DISTRITAL', 'deputado estadual e distrital', '111115', 0),
(2001, 'VEREADOR', 'vereador', '111120', 0),
(2002, 'PRESIDENTE DA REPÚBLICA', 'presidente da republica', '111205', 0),
(2003, 'VICE-PRESIDENTE DA REPÚBLICA', 'vice-presidente da republica', '111210', 0),
(2004, 'MINISTRO DE ESTADO', 'ministro de estado', '111215', 0),
(2005, 'SECRETÁRIO EXECUTIVO', 'secretario-executivo', '111220', 1),
(2006, 'MEMBRO SUPERIOR DO PODER EXECUTIVO', 'membro superior do poder executivo', '111225', 0),
(2007, 'GOVERNADOR DE ESTADO', 'governador de estado', '111230', 0),
(2008, 'GOVERNADOR DO DISTRITO FEDERAL', 'governador do distrito federal', '111235', 0),
(2009, 'VICE-GOVERNADOR DE ESTADO', 'vice-governador de estado', '111240', 0),
(2010, 'VICE-GOVERNADOR DO DISTRITO FEDERAL', 'vice-governador do distrito federal', '111245', 0),
(2011, 'PREFEITO', 'prefeito', '111250', 0),
(2012, 'VICE-PREFEITO', 'vice-prefeito', '111255', 0),
(2013, 'MINISTRO DO SUPREMO TRIBUNAL FEDERAL', 'ministro do supremo tribunal federal', '111305', 0),
(2014, 'MINISTRO DO SUPERIOR TRIBUNAL DE JUSTIÇA', 'ministro do superior tribunal de justica', '111310', 0),
(2015, 'MINISTRO DO SUPERIOR TRIBUNAL MILITAR', 'ministro do superior tribunal militar', '111315', 0),
(2016, 'MINISTRO DO SUPERIOR TRIBUNAL DO TRABALHO', 'ministro do superior tribunal do trabalho', '111320', 0),
(2017, 'JUIZ DE DIREITO', 'juiz de direito', '111325', 0),
(2018, 'JUIZ FEDERAL', 'juiz federal', '111330', 0),
(2019, 'JUIZ AUDITOR FEDERAL - JUSTIÇA MILITAR', 'juiz auditor federal - justica militar', '111335', 0),
(2020, 'JUIZ AUDITOR ESTADUAL - JUSTIÇA MILITAR', 'juiz auditor estadual - justica militar', '111340', 0),
(2021, 'JUIZ DO TRABALHO', 'juiz do trabalho', '111345', 0),
(2022, 'DIRIGENTE DO SERVIÇO PÚBLICO FEDERAL', 'dirigente do servico publico federal', '111405', 0),
(2023, 'DIRIGENTE DO SERVIÇO PÚBLICO ESTADUAL E DISTRITAL', 'dirigente do servico publico estadual e distrital', '111410', 0),
(2024, 'DIRIGENTE DO SERVIÇO PÚBLICO MUNICIPAL', 'dirigente do servico publico municipal', '111415', 0),
(2025, 'ESPECIALISTA DE POLÍTICAS PÚBLICAS E GESTÃO GOVERNAMENTAL - EPPGG', 'especialista de politicas publicas e gestao governamental - eppgg', '111505', 0),
(2026, 'ANALISTA DE PLANEJAMENTO E ORÇAMENTO - APO', 'analista de planejamento e orcamento - apo', '111510', 0),
(2027, 'CACIQUE', 'cacique', '113005', 0),
(2028, 'LÍDER DE COMUNIDADE CAIÇARA', 'lider de comunidade caicara', '113010', 0),
(2029, 'MEMBRO DE LIDERANÇA QUILOMBOLA', 'membro de lideranca quilombola', '113015', 0),
(2030, 'DIRIGENTE DE PARTIDO POLÍTICO', 'dirigente de partido politico', '114105', 0),
(2031, 'DIRIGENTES DE ENTIDADES DE TRABALHADORES', 'dirigentes de entidades de trabalhadores', '114205', 0),
(2032, 'DIRIGENTES DE ENTIDADES PATRONAIS', 'dirigentes de entidades patronais', '114210', 0),
(2033, 'DIRIGENTE E ADMINISTRADOR DE ORGANIZAÇÃO RELIGIOSA', 'dirigente e administrador de organizacao religiosa', '114305', 0),
(2034, 'DIRETOR DE SUPRIMENTOS NO SERVIÇO PÚBLICO', 'diretor de suprimentos no servico publico', '123410', 0),
(2035, 'SANITARISTA', 'sanitarista', '1312C1', 0),
(2036, 'DIRIGENTE E ADMINISTRADOR DE ORGANIZAÇÃO DA SOCIEDADE CIVIL SEM FINS LUCRATIVOS', 'dirigente e administrador de organizacao da sociedade civil sem fins lucrativos', '114405', 0),
(2037, 'DIRETOR DE PLANEJAMENTO ESTRATÉGICO', 'diretor de planejamento estrategico', '121005', 0),
(2038, 'DIRETOR GERAL DE EMPRESA E ORGANIZAÇÕES (EXCETO DE INTERESSE PÚBLICO)', 'diretor geral de empresa e organizacoes (exceto de interesse publico)', '121010', 0),
(2039, 'DIRETOR DE PRODUÇÃO E OPERAÇÕES EM EMPRESA AGROPECUÁRIA', 'diretor de producao e operacoes em empresa agropecuaria', '122105', 0),
(2040, 'DIRETOR DE PRODUÇÃO E OPERAÇÕES EM EMPRESA AQÜÍCOLA', 'diretor de producao e operacoes em empresa aqüicola', '122110', 0),
(2041, 'DIRETOR DE PRODUÇÃO E OPERAÇÕES EM EMPRESA FLORESTAL', 'diretor de producao e operacoes em empresa florestal', '122115', 0),
(2042, 'DIRETOR DE PRODUÇÃO E OPERAÇÕES EM EMPRESA PESQUEIRA', 'diretor de producao e operacoes em empresa pesqueira', '122120', 0),
(2043, 'DIRETOR DE PRODUÇÃO E OPERAÇÕES DA INDÚSTRIA DE TRANSFORMAÇÃO, EXTRAÇÃO MINERAL E UTILIDADES', 'diretor de producao e operacoes da industria de transformacao, extracao mineral e utilidades', '122205', 0),
(2044, 'DIRETOR DE OPERAÇÕES DE OBRAS PÚBLICA E CIVIL', 'diretor de operacoes de obras publica e civil', '122305', 0),
(2045, 'DIRETOR DE OPERAÇÕES COMERCIAIS (COMÉRCIO ATACADISTA E VAREJISTA)', 'diretor de operacoes comerciais (comercio atacadista e varejista)', '122405', 0),
(2046, 'DIRETOR DE PRODUÇÃO E OPERAÇÕES DE ALIMENTAÇÃO', 'diretor de producao e operacoes de alimentacao', '122505', 0),
(2047, 'DIRETOR DE PRODUÇÃO E OPERAÇÕES DE HOTEL', 'diretor de producao e operacoes de hotel', '122510', 0),
(2048, 'DIRETOR DE PRODUÇÃO E OPERAÇÕES DE TURISMO', 'diretor de producao e operacoes de turismo', '122515', 0),
(2049, 'TURISMÓLOGO', 'turismologo', '122520', 0),
(2050, 'DIRETOR DE OPERAÇÕES DE CORREIOS', 'diretor de operacoes de correios', '122605', 0),
(2051, 'DIRETOR DE OPERAÇÕES DE SERVIÇOS DE ARMAZENAMENTO', 'diretor de operacoes de servicos de armazenamento', '122610', 0),
(2052, 'DIRETOR DE OPERAÇÕES DE SERVIÇOS DE TELECOMUNICAÇÕES', 'diretor de operacoes de servicos de telecomunicacoes', '122615', 0),
(2053, 'DIRETOR DE OPERAÇÕES DE SERVIÇOS DE TRANSPORTE', 'diretor de operacoes de servicos de transporte', '122620', 0),
(2054, 'DIRETOR COMERCIAL EM OPERAÇÕES DE INTERMEDIAÇÃO FINANCEIRA', 'diretor comercial em operacoes de intermediacao financeira', '122705', 0),
(2055, 'DIRETOR DE PRODUTOS BANCÁRIOS', 'diretor de produtos bancarios', '122710', 0),
(2056, 'DIRETOR DE CRÉDITO RURAL', 'diretor de credito rural', '122715', 0),
(2057, 'DIRETOR DE CÂMBIO E COMÉRCIO EXTERIOR', 'diretor de cambio e comercio exterior', '122720', 0),
(2058, 'DIRETOR DE COMPLIANCE', 'diretor de compliance', '122725', 0),
(2059, 'DIRETOR DE CRÉDITO (EXCETO CRÉDITO IMOBILIÁRIO)', 'diretor de credito (exceto credito imobiliario)', '122730', 0),
(2060, 'DIRETOR DE CRÉDITO IMOBILIÁRIO', 'diretor de credito imobiliario', '122735', 0),
(2061, 'DIRETOR DE LEASING', 'diretor de leasing', '122740', 0),
(2062, 'DIRETOR DE MERCADO DE CAPITAIS', 'diretor de mercado de capitais', '122745', 0),
(2063, 'DIRETOR DE RECUPERAÇÃO DE CRÉDITOS EM OPERAÇÕES DE INTERMEDIAÇÃO FINANCEIRA', 'diretor de recuperacao de creditos em operacoes de intermediacao financeira', '122750', 0),
(2064, 'DIRETOR ADMINISTRATIVO', 'diretor administrativo', '123105', 0),
(2065, 'DIRETOR ADMINISTRATIVO E FINANCEIRO', 'diretor administrativo e financeiro', '123110', 0),
(2066, 'DIRETOR FINANCEIRO', 'diretor financeiro', '123115', 0),
(2067, 'DIRETOR DE RECURSOS HUMANOS', 'diretor de recursos humanos', '123205', 0),
(2068, 'DIRETOR DE RELAÇÕES DE TRABALHO', 'diretor de relacoes de trabalho', '123210', 0),
(2069, 'DIRETOR COMERCIAL', 'diretor comercial', '123305', 0),
(2070, 'DIRETOR DE MARKETING', 'diretor de marketing', '123310', 0),
(2071, 'DIRETOR DE SUPRIMENTOS', 'diretor de suprimentos', '123405', 0),
(2072, 'BABÁ', 'baba', '516205', 0),
(2073, 'DIRETOR DE SERVIÇOS DE INFORMÁTICA', 'diretor de servicos de informatica', '123605', 0),
(2074, 'DIRETOR DE PESQUISA E DESENVOLVIMENTO (Pnull)', 'diretor de pesquisa e desenvolvimento (pnull)', '123705', 0),
(2075, 'DIRETOR DE MANUTENÇÃO', 'diretor de manutencao', '123805', 0),
(2076, 'DIRETOR DE SERVIÇOS CULTURAIS', 'diretor de servicos culturais', '131105', 0),
(2077, 'DIRETOR DE SERVIÇOS SOCIAIS', 'diretor de servicos sociais', '131110', 0),
(2078, 'GERENTE DE SERVIÇOS CULTURAIS', 'gerente de servicos culturais', '131115', 0),
(2079, 'GERENTE DE SERVIÇOS SOCIAIS', 'gerente de servicos sociais', '131120', 0),
(2080, 'DIRETOR DE SERVIÇOS DE SAÚDE', 'diretor de servicos de saude', '131205', 0),
(2081, 'GERENTE DE SERVIÇOS DE SAÚDE', 'gerente de servicos de saude', '131210', 0),
(2082, 'TECNÓLOGO EM GESTÃO HOSPITALAR', 'tecnologo em gestao hospitalar', '131215', 0),
(2083, 'DIRETOR DE INSTITUIÇÃO EDUCACIONAL DA ÁREA PRIVADA', 'diretor de instituicao educacional da area privada', '131305', 0),
(2084, 'DIRETOR DE INSTITUIÇÃO EDUCACIONAL PÚBLICA', 'diretor de instituicao educacional publica', '131310', 0),
(2085, 'GERENTE DE INSTITUIÇÃO EDUCACIONAL DA ÁREA PRIVADA', 'gerente de instituicao educacional da area privada', '131315', 0),
(2086, 'CATADOR DE MATERIAL RECICLÁVEL', 'catador de material reciclavel', '519205', 0),
(2087, 'SELECIONADOR DE MATERIAL RECICLÁVEL', 'selecionador de material reciclavel', '519210', 0),
(2088, 'OPERADOR DE PRENSA DE MATERIAL RECICLÁVEL', 'operador de prensa de material reciclavel', '519215', 0),
(2089, 'AUXILIAR DE VETERINÁRIO', 'auxiliar de veterinario', '519305', 0),
(2090, 'ESTETICISTA DE ANIMAIS DOMÉSTICOS', 'esteticista de animais domesticos', '519310', 0),
(2091, 'BANHISTA DE ANIMAIS DOMÉSTICOS', 'banhista de animais domesticos', '519315', 0),
(2092, 'TOSADOR DE ANIMAIS DOMÉSTICOS', 'tosador de animais domesticos', '519320', 0),
(2093, 'PROFISSIONAL DO SEXO', 'profissional do sexo', '519805', 0),
(2094, 'CARTAZEIRO', 'cartazeiro', '519905', 0),
(2095, 'CONTROLADOR DE PRAGAS', 'controlador de pragas', '519910', 0),
(2096, 'ENGRAXATE', 'engraxate', '519915', 0),
(2097, 'GANDULA', 'gandula', '519920', 0),
(2098, 'GUARDADOR DE VEÍCULOS', 'guardador de veiculos', '519925', 0),
(2099, 'LAVADOR DE GARRAFAS, VIDROS E OUTROS UTENSÍLIOS', 'lavador de garrafas, vidros e outros utensilios', '519930', 0),
(2100, 'LAVADOR DE VEÍCULOS', 'lavador de veiculos', '519935', 0),
(2101, 'LEITURISTA', 'leiturista', '519940', 0),
(2102, 'RECEPCIONISTA DE CASAS DE ESPETÁCULOS', 'recepcionista de casas de espetaculos', '519945', 0),
(2103, 'SUPERVISOR DE VENDAS DE SERVIÇOS', 'supervisor de vendas de servicos', '520105', 0),
(2104, 'SUPERVISOR DE VENDAS COMERCIAL', 'supervisor de vendas comercial', '520110', 0),
(2105, 'VENDEDOR EM COMÉRCIO ATACADISTA', 'vendedor em comercio atacadista', '521105', 0),
(2106, 'VENDEDOR DE COMÉRCIO VAREJISTA', 'vendedor de comercio varejista', '521110', 0),
(2107, 'PROMOTOR DE VENDAS', 'promotor de vendas', '521115', 0),
(2108, 'DEMONSTRADOR DE MERCADORIAS', 'demonstrador de mercadorias', '521120', 0),
(2109, 'REPOSITOR DE MERCADORIAS', 'repositor de mercadorias', '521125', 0),
(2110, 'ATENDENTE DE FARMÁCIA - BALCONISTA', 'atendente de farmacia - balconista', '521130', 0),
(2111, 'FRENTISTA', 'frentista', '521135', 0),
(2112, 'INSTALADOR DE CORTINAS E PERSIANAS, PORTAS SANFONADAS E BOXE', 'instalador de cortinas e persianas, portas sanfonadas e boxe', '523105', 0),
(2113, 'INSTALADOR DE SOM E ACESSÓRIOS DE VEÍCULOS', 'instalador de som e acessorios de veiculos', '523110', 0),
(2114, 'CHAVEIRO', 'chaveiro', '523115', 0),
(2115, 'VENDEDOR EM DOMICÍLIO', 'vendedor em domicilio', '524105', 0),
(2116, 'FEIRANTE', 'feirante', '524205', 0),
(2117, 'JORNALEIRO (EM BANCA DE JORNAL)', 'jornaleiro (em banca de jornal)', '524210', 0),
(2118, 'VENDEDOR PERMISSIONÁRIO', 'vendedor permissionario', '524215', 0),
(2119, 'VENDEDOR AMBULANTE', 'vendedor ambulante', '524305', 0),
(2120, 'PIPOQUEIRO AMBULANTE', 'pipoqueiro ambulante', '524310', 0),
(2121, 'ECONOMISTA AMBIENTAL', 'economista ambiental', '251230', 0),
(2122, 'PRODUTOR AGROPECUÁRIO, EM GERAL', 'produtor agropecuario, em geral', '611005', 0),
(2123, 'PRODUTOR AGRÍCOLA POLIVALENTE', 'produtor agricola polivalente', '612005', 0),
(2124, 'PRODUTOR DE ARROZ', 'produtor de arroz', '612105', 0),
(2125, 'PRODUTOR DE CANA-DE-AÇÚCAR', 'produtor de cana-de-acucar', '612110', 0),
(2126, 'PRODUTOR DE CEREAIS DE INVERNO', 'produtor de cereais de inverno', '612115', 0),
(2127, 'PRODUTOR DE GRAMÍNEAS FORRAGEIRAS', 'produtor de gramineas forrageiras', '612120', 0),
(2128, 'PRODUTOR DE MILHO E SORGO', 'produtor de milho e sorgo', '612125', 0),
(2129, 'PRODUTOR DE ALGODÃO', 'produtor de algodao', '612205', 0),
(2130, 'PRODUTOR DE CURAUÁ', 'produtor de curaua', '612210', 0),
(2131, 'PRODUTOR DE JUTA', 'produtor de juta', '612215', 0),
(2132, 'PRODUTOR DE RAMI', 'produtor de rami', '612220', 0),
(2133, 'PRODUTOR DE SISAL', 'produtor de sisal', '612225', 0),
(2134, 'CAFEICULTOR', 'cafeicultor', '612605', 0),
(2135, 'CONSULTOR JURÍDICO', 'consultor juridico', '241040', 0),
(2136, 'ADVOGADO DA UNIÃO', 'advogado da uniao', '241205', 0),
(2137, 'PROCURADOR AUTÁRQUICO', 'procurador autarquico', '241210', 0),
(2138, 'PROCURADOR DA FAZENDA NACIONAL', 'procurador da fazenda nacional', '241215', 0),
(2139, 'PROCURADOR DO ESTADO', 'procurador do estado', '241220', 0),
(2140, 'PROCURADOR DO MUNICÍPIO', 'procurador do municipio', '241225', 0),
(2141, 'PROCURADOR FEDERAL', 'procurador federal', '241230', 0),
(2142, 'PROCURADOR FUNDACIONAL', 'procurador fundacional', '241235', 0),
(2143, 'OFICIAL DE REGISTRO DE CONTRATOS MARÍTIMOS', 'oficial de registro de contratos maritimos', '241305', 0),
(2144, 'OFICIAL DO REGISTRO CIVIL DE PESSOAS JURIDICAS', 'oficial do registro civil de pessoas juridicas', '241310', 0),
(2145, 'OFICIAL DO REGISTRO CIVIL DE PESSOAS NATURAIS', 'oficial do registro civil de pessoas naturais', '241315', 0),
(2146, 'OFICIAL DO REGISTRO DE DISTRIBUIÇÕES', 'oficial do registro de distribuicoes', '241320', 0),
(2147, 'OFICIAL DO REGISTRO DE IMÓVEIS', 'oficial do registro de imoveis', '241325', 0),
(2148, 'OFICIAL DO REGISTRO DE TÍTULOS E DOCUMENTOS', 'oficial do registro de titulos e documentos', '241330', 0),
(2149, 'TABELIÃO DE NOTAS', 'tabeliao de notas', '241335', 0),
(2150, 'TABELIÃO DE PROTESTOS', 'tabeliao de protestos', '241340', 0),
(2151, 'PROCURADOR DA REPÚBLICA', 'procurador da republica', '242205', 0),
(2152, 'PROCURADOR DE JUSTIÇA', 'procurador de justica', '242210', 0),
(2153, 'PROCURADOR DE JUSTIÇA MILITAR', 'procurador de justica militar', '242215', 0),
(2154, 'PROCURADOR DO TRABALHO', 'procurador do trabalho', '242220', 0),
(2155, 'PROCURADOR REGIONAL DA REPÚBLICA', 'procurador regional da republica', '242225', 0),
(2156, 'PROCURADOR REGIONAL DO TRABALHO', 'procurador regional do trabalho', '242230', 0),
(2157, 'PROMOTOR DE JUSTIÇA', 'promotor de justica', '242235', 0),
(2158, 'SUBPROCURADOR DE JUSTIÇA MILITAR', 'subprocurador de justica militar', '242240', 0),
(2159, 'SUBPROCURADOR-GERAL DA REPÚBLICA', 'subprocurador-geral da republica', '242245', 0),
(2160, 'SUBPROCURADOR-GERAL DO TRABALHO', 'subprocurador-geral do trabalho', '242250', 0),
(2161, 'DELEGADO DE POLÍCIA', 'delegado de policia', '242305', 0),
(2162, 'DEFENSOR PÚBLICO', 'defensor publico', '242405', 0),
(2163, 'PROCURADOR DA ASSISTÊNCIA JUDICIÁRIA', 'procurador da assistencia judiciaria', '242410', 0),
(2164, 'OFICIAL DE INTELIGÊNCIA', 'oficial de inteligencia', '242905', 0),
(2165, 'OFICIAL TÉCNICO DE INTELIGÊNCIA', 'oficial tecnico de inteligencia', '242910', 0),
(2166, 'ANTROPÓLOGO', 'antropologo', '251105', 0),
(2167, 'ARQUEÓLOGO', 'arqueologo', '251110', 0),
(2168, 'CIENTISTA POLÍTICO', 'cientista politico', '251115', 0),
(2169, 'SOCIÓLOGO', 'sociologo', '251120', 0),
(2170, 'ECONOMISTA', 'economista', '251205', 0),
(2171, 'ECONOMISTA AGROINDUSTRIAL', 'economista agroindustrial', '251210', 0),
(2172, 'ECONOMISTA FINANCEIRO', 'economista financeiro', '251215', 0),
(2173, 'ECONOMISTA INDUSTRIAL', 'economista industrial', '251220', 0),
(2174, 'ECONOMISTA DO SETOR PÚBLICO', 'economista do setor publico', '251225', 0),
(2175, 'ECONOMISTA REGIONAL E URBANO', 'economista regional e urbano', '251235', 0),
(2176, 'GEÓGRAFO', 'geografo', '251305', 0),
(2177, 'FILÓSOFO', 'filosofo', '251405', 0),
(2178, 'PSICÓLOGO EDUCACIONAL', 'psicologo educacional', '251505', 0),
(2179, 'PSICÓLOGO CLÍNICO', 'psicologo clinico', '251510', 0),
(2180, 'PSICÓLOGO DO ESPORTE', 'psicologo do esporte', '251515', 0),
(2181, 'PSICÓLOGO HOSPITALAR', 'psicologo hospitalar', '251520', 0),
(2182, 'PSICÓLOGO JURÍDICO', 'psicologo juridico', '251525', 0),
(2183, 'PSICÓLOGO SOCIAL', 'psicologo social', '251530', 1),
(2184, 'PSICÓLOGO DO TRÂNSITO', 'psicologo do transito', '251535', 0),
(2185, 'OFICIAL GENERAL DA AERONÁUTICA', 'oficial general da aeronautica', '10105', 0),
(2186, 'OFICIAL GENERAL DO EXÉRCITO', 'oficial general do exercito', '10110', 0),
(2187, 'OFICIAL GENERAL DA MARINHA', 'oficial general da marinha', '10115', 0),
(2188, 'OFICIAL DA AERONÁUTICA', 'oficial da aeronautica', '10205', 0),
(2189, 'GARÇOM (SERVIÇOS DE VINHOS)', 'garcom (servicos de vinhos)', '513410', 0),
(2190, 'COPEIRO', 'copeiro', '513425', 0),
(2191, 'COPEIRO DE HOSPITAL', 'copeiro de hospital', '513430', 0),
(2192, 'ATENDENTE DE LANCHONETE', 'atendente de lanchonete', '513435', 0),
(2193, 'TRABALHADOR NA PRODUÇÃO DE MUDAS E SEMENTES', 'trabalhador na producao de mudas e sementes', '622015', 0),
(2194, 'TRABALHADOR VOLANTE DA AGRICULTURA', 'trabalhador volante da agricultura', '622020', 0),
(2195, 'TRABALHADOR DA CULTURA DE ARROZ', 'trabalhador da cultura de arroz', '622105', 0),
(2196, 'TRABALHADOR DA CULTURA DE CANA-DE-AÇÚCAR', 'trabalhador da cultura de cana-de-acucar', '622110', 0),
(2197, 'TRABALHADOR DA CULTURA DE MILHO E SORGO', 'trabalhador da cultura de milho e sorgo', '622115', 0),
(2198, 'TRABALHADOR DA CULTURA DE SISAL', 'trabalhador da cultura de sisal', '622210', 0),
(2199, 'TRABALHADOR DA CULTURA DE TRIGO, AVEIA, CEVADA E TRITICALE', 'trabalhador da cultura de trigo, aveia, cevada e triticale', '622120', 0),
(2200, 'TRABALHADOR DA CULTURA DE ALGODÃO', 'trabalhador da cultura de algodao', '622205', 0),
(2201, 'GERENTE DE SERVIÇOS EDUCACIONAIS DA ÁREA PÚBLICA', 'gerente de servicos educacionais da area publica', '131320', 0),
(2202, 'GERENTE DE PRODUÇÃO E OPERAÇÕES AQÜÍCOLAS', 'gerente de producao e operacoes aqüicolas', '141105', 0),
(2203, 'GERENTE DE PRODUÇÃO E OPERAÇÕES FLORESTAIS', 'gerente de producao e operacoes florestais', '141110', 0),
(2204, 'GERENTE DE PRODUÇÃO E OPERAÇÕES AGROPECUÁRIAS', 'gerente de producao e operacoes agropecuarias', '141115', 0),
(2205, 'GERENTE DE PRODUÇÃO E OPERAÇÕES PESQUEIRAS', 'gerente de producao e operacoes pesqueiras', '141120', 0),
(2206, 'GERENTE DE PRODUÇÃO E OPERAÇÕES', 'gerente de producao e operacoes', '141205', 0),
(2207, 'GERENTE DE PRODUÇÃO E OPERAÇÕES DA CONSTRUÇÃO CIVIL E OBRAS PÚBLICAS', 'gerente de producao e operacoes da construcao civil e obras publicas', '141305', 0),
(2208, 'COMERCIANTE ATACADISTA', 'comerciante atacadista', '141405', 0),
(2209, 'COMERCIANTE VAREJISTA', 'comerciante varejista', '141410', 0),
(2210, 'GERENTE DE LOJA E SUPERMERCADO', 'gerente de loja e supermercado', '141415', 0);
INSERT INTO `cbos` (`id`, `name`, `name_filter`, `code_2002`, `is_active`) VALUES
(2211, 'GERENTE DE OPERAÇÕES DE SERVIÇOS DE ASSISTÊNCIA TÉCNICA', 'gerente de operacoes de servicos de assistencia tecnica', '141420', 0),
(2212, 'GERENTE DE HOTEL', 'gerente de hotel', '141505', 0),
(2213, 'GERENTE DE RESTAURANTE', 'gerente de restaurante', '141510', 0),
(2214, 'GERENTE DE BAR', 'gerente de bar', '141515', 0),
(2215, 'GERENTE DE PENSÃO', 'gerente de pensao', '141520', 0),
(2216, 'GERENTE DE TURISMO', 'gerente de turismo', '141525', 0),
(2217, 'GERENTE DE OPERAÇÕES DE TRANSPORTES', 'gerente de operacoes de transportes', '141605', 0),
(2218, 'GERENTE DE OPERAÇÕES DE CORREIOS E TELECOMUNICAÇÕES', 'gerente de operacoes de correios e telecomunicacoes', '141610', 0),
(2219, 'GERENTE DE LOGÍSTICA (ARMAZENAGEM E DISTRIBUIÇÃO)', 'gerente de logistica (armazenagem e distribuicao)', '141615', 0),
(2220, 'GERENTE DE PRODUTOS BANCÁRIOS', 'gerente de produtos bancarios', '141705', 0),
(2221, 'GERENTE DE CÂMBIO E COMÉRCIO EXTERIOR', 'gerente de cambio e comercio exterior', '141715', 0),
(2222, 'GERENTE DE CRÉDITO E COBRANÇA', 'gerente de credito e cobranca', '141720', 0),
(2223, 'DIRETOR DE RISCOS DE MERCADO', 'diretor de riscos de mercado', '122755', 0),
(2224, 'GERENTE DE RECUPERAÇÃO DE CRÉDITO', 'gerente de recuperacao de credito', '141735', 0),
(2225, 'GERENTE ADMINISTRATIVO', 'gerente administrativo', '142105', 0),
(2226, 'GERENTE DE RISCOS', 'gerente de riscos', '142110', 0),
(2227, 'GERENTE FINANCEIRO', 'gerente financeiro', '142115', 0),
(2228, 'TECNÓLOGO EM GESTÃO ADMINISTRATIVO- FINANCEIRA', 'tecnologo em gestao administrativo- financeira', '142120', 0),
(2229, 'GERENTE DE RECURSOS HUMANOS', 'gerente de recursos humanos', '142205', 0),
(2230, 'GERENTE DE DEPARTAMENTO PESSOAL', 'gerente de departamento pessoal', '142210', 0),
(2231, 'ESOTÉRICO', 'esoterico', '516805', 0),
(2232, 'PARANORMAL', 'paranormal', '516810', 0),
(2233, 'BOMBEIRO DE AERÓDROMO', 'bombeiro de aerodromo', '517105', 0),
(2234, 'BOMBEIRO DE SEGURANÇA DO TRABALHO', 'bombeiro de seguranca do trabalho', '517110', 0),
(2235, 'SALVA-VIDAS', 'salva-vidas', '517115', 0),
(2236, 'AGENTE DE POLÍCIA FEDERAL', 'agente de policia federal', '517205', 0),
(2237, 'POLICIAL RODOVIÁRIO FEDERAL', 'policial rodoviario federal', '517210', 0),
(2238, 'GUARDA-CIVIL MUNICIPAL', 'guarda-civil municipal', '517215', 0),
(2239, 'AGENTE DE TRÂNSITO', 'agente de transito', '517220', 0),
(2240, 'AGENTE DE SEGURANÇA', 'agente de seguranca', '517310', 0),
(2241, 'AGENTE DE PROTEÇÃO DE AEROPORTO', 'agente de protecao de aeroporto', '517305', 0),
(2242, 'AGENTE DE SEGURANÇA PENITENCIÁRIA', 'agente de seguranca penitenciaria', '517315', 0),
(2243, 'VIGIA FLORESTAL', 'vigia florestal', '517320', 0),
(2244, 'VIGIA PORTUÁRIO', 'vigia portuario', '517325', 0),
(2245, 'VIGILANTE', 'vigilante', '517330', 1),
(2246, 'GUARDA PORTUÁRIO', 'guarda portuario', '517335', 0),
(2247, 'PORTEIRO (HOTEL)', 'porteiro (hotel)', '517405', 0),
(2248, 'PORTEIRO DE EDIFÍCIOS', 'porteiro de edificios', '517410', 0),
(2249, 'PORTEIRO DE LOCAIS DE DIVERSÃO', 'porteiro de locais de diversao', '517415', 0),
(2250, 'VIGIA', 'vigia', '517420', 0),
(2251, 'CICLISTA MENSAGEIRO', 'ciclista mensageiro', '519105', 0),
(2252, 'MOTOCICLISTA NO TRANSPORTE DE DOCUMENTOS E PEQUENOS VOLUMES', 'motociclista no transporte de documentos e pequenos volumes', '519110', 0),
(2253, 'MÉDICO PERITO', 'medico perito', '223150', 0),
(2254, 'CIRURGIÃO DENTISTA - AUDITOR', 'cirurgiao dentista - auditor', '223204', 0),
(2255, 'CIRURGIÃO DENTISTA - CLÍNICO GERAL', 'cirurgiao dentista - clinico geral', '223208', 0),
(2256, 'CIRURGIÃO DENTISTA - ENDODONTISTA', 'cirurgiao dentista - endodontista', '223212', 0),
(2257, 'CIRURGIÃO DENTISTA - EPIDEMIOLOGISTA', 'cirurgiao dentista - epidemiologista', '223216', 0),
(2258, 'CIRURGIÃO DENTISTA - ESTOMATOLOGISTA', 'cirurgiao dentista - estomatologista', '223220', 0),
(2259, 'CIRURGIÃO DENTISTA - IMPLANTODONTISTA', 'cirurgiao dentista - implantodontista', '223224', 0),
(2260, 'CIRURGIÃO DENTISTA - ODONTOGERIATRA', 'cirurgiao dentista - odontogeriatra', '223228', 0),
(2261, 'CIRURGIÃO DENTISTA - ODONTOLOGISTA LEGAL', 'cirurgiao dentista - odontologista legal', '223232', 0),
(2262, 'CIRURGIÃO DENTISTA - ODONTOPEDIATRA', 'cirurgiao dentista - odontopediatra', '223236', 0),
(2263, 'CIRURGIÃO DENTISTA - ORTOPEDISTA E ORTODONTISTA', 'cirurgiao dentista - ortopedista e ortodontista', '223240', 0),
(2264, 'CIRURGIÃO DENTISTA - PATOLOGISTA BUCAL', 'cirurgiao dentista - patologista bucal', '223244', 0),
(2265, 'CIRURGIÃO DENTISTA - PERIODONTISTA', 'cirurgiao dentista - periodontista', '223248', 0),
(2266, 'CIRURGIÃO DENTISTA - PROTESIÓLOGO BUCOMAXILOFACIAL', 'cirurgiao dentista - protesiologo bucomaxilofacial', '223252', 0),
(2267, 'CIRURGIÃO DENTISTA - PROTESISTA', 'cirurgiao dentista - protesista', '223256', 0),
(2268, 'CIRURGIÃO DENTISTA - RADIOLOGISTA', 'cirurgiao dentista - radiologista', '223260', 0),
(2269, 'MAQUIADOR DE CARACTERIZAÇÃO', 'maquiador de caracterizacao', '516130', 0),
(2270, 'CIRURGIÃO DENTISTA - REABILITADOR ORAL', 'cirurgiao dentista - reabilitador oral', '223264', 0),
(2271, 'CIRURGIÃO DENTISTA - TRAUMATOLOGISTA BUCOMAXILOFACIAL', 'cirurgiao dentista - traumatologista bucomaxilofacial', '223268', 0),
(2272, 'CIRURGIÃO DENTISTA DE SAÚDE COLETIVA', 'cirurgiao dentista de saude coletiva', '223272', 0),
(2273, 'CIRURGIÃO DENTISTA - ODONTOLOGIA DO TRABALHO', 'cirurgiao dentista - odontologia do trabalho', '223276', 0),
(2274, 'CIRURGIÃO DENTISTA - DENTÍSTICA', 'cirurgiao dentista - dentistica', '223280', 0),
(2275, 'CIRURGIÃO DENTISTA - DISFUNÇÃO TEMPOROMANDIBULAR E DOR OROFACIAL', 'cirurgiao dentista - disfuncao temporomandibular e dor orofacial', '223284', 0),
(2276, 'CIRURGIÃO DENTISTA - ODONTOLOGIA PARA PACIENTES COM NECESSIDADES ESPECIAIS', 'cirurgiao dentista - odontologia para pacientes com necessidades especiais', '223288', 0),
(2277, 'TRABALHADOR DA PECUÁRIA (ASININOS E MUARES)', 'trabalhador da pecuaria (asininos e muares)', '623105', 0),
(2278, 'TRABALHADOR DA PECUÁRIA (BOVINOS CORTE)', 'trabalhador da pecuaria (bovinos corte)', '623110', 0),
(2279, 'AUXILIAR NOS SERVIÇOS DE ALIMENTAÇÃO', 'auxiliar nos servicos de alimentacao', '513505', 0),
(2280, 'CHURRASQUEIRO', 'churrasqueiro', '513605', 0),
(2281, 'PIZZAIOLO', 'pizzaiolo', '513610', 0),
(2282, 'ASCENSORISTA', 'ascensorista', '514105', 0),
(2283, 'GARAGISTA', 'garagista', '514110', 0),
(2284, 'SACRISTÃO', 'sacristao', '514115', 0),
(2285, 'ZELADOR DE EDIFÍCIO', 'zelador de edificio', '514120', 0),
(2286, 'COLETOR DE LIXO DOMICILIAR', 'coletor de lixo domiciliar', '514205', 0),
(2287, 'VARREDOR DE RUA', 'varredor de rua', '514215', 0),
(2288, 'FAXINEIRO', 'faxineiro', '514320', 0),
(2289, 'TRABALHADOR DE SERVIÇOS DE LIMPEZA E CONSERVAÇÃO DE ÁREAS PÚBLICAS', 'trabalhador de servicos de limpeza e conservacao de areas publicas', '514225', 0),
(2290, 'COLETOR DE RESÍDUOS SÓLIDOS DE SERVIÇOS DE SAÚDE', 'coletor de residuos solidos de servicos de saude', '514230', 0),
(2291, 'LIMPADOR DE VIDROS', 'limpador de vidros', '514305', 0),
(2292, 'AUXILIAR DE MANUTENÇÃO PREDIAL', 'auxiliar de manutencao predial', '514310', 0),
(2293, 'LIMPADOR DE FACHADAS', 'limpador de fachadas', '514315', 0),
(2294, 'TRABALHADOR DA MANUTENÇÃO DE EDIFICAÇÕES', 'trabalhador da manutencao de edificacoes', '514325', 0),
(2295, 'LIMPADOR DE PISCINAS', 'limpador de piscinas', '514330', 0),
(2296, 'AGENTE COMUNITÁRIO DE SAÚDE', 'agente comunitario de saude', '515105', 0),
(2297, 'ATENDENTE DE ENFERMAGEM', 'atendente de enfermagem', '515110', 0),
(2298, 'PARTEIRA LEIGA', 'parteira leiga', '515115', 0),
(2299, 'VISITADOR SANITÁRIO', 'visitador sanitario', '515120', 0),
(2300, 'SOCORRISTA (EXCETO MÉDICOS E ENFERMEIROS)', 'socorrista (exceto medicos e enfermeiros)', '515135', 0),
(2301, 'MICROSCOPISTA', 'microscopista', '5152A1', 0),
(2302, 'AUXILIAR DE BANCO DE SANGUE', 'auxiliar de banco de sangue', '515205', 0),
(2303, 'AUXILIAR DE FARMÁCIA DE MANIPULAÇÃO', 'auxiliar de farmacia de manipulacao', '515210', 0),
(2304, 'AUXILIAR DE LABORATÓRIO DE ANÁLISES CLÍNICAS', 'auxiliar de laboratorio de analises clinicas', '515215', 0),
(2305, 'AUXILIAR DE LABORATÓRIO DE IMUNOBIOLÓGICOS', 'auxiliar de laboratorio de imunobiologicos', '515220', 0),
(2306, 'AUXILIAR DE PRODUÇÃO FARMACÊUTICA', 'auxiliar de producao farmaceutica', '515225', 0),
(2307, 'EDUCADOR SOCIAL', 'educador social', '515305', 0),
(2308, 'MONITOR DE DEPENDENTE QUÍMICO', 'monitor de dependente quimico', '515315', 0),
(2309, 'CONSELHEIRO TUTELAR', 'conselheiro tutelar', '515320', 0),
(2310, 'SÓCIOEDUCADOR', 'socioeducador', '515325', 0),
(2311, 'BARBEIRO', 'barbeiro', '516105', 0),
(2312, 'CABELEIREIRO', 'cabeleireiro', '516110', 0),
(2313, 'MANICURE', 'manicure', '516120', 0),
(2314, 'MAQUIADOR', 'maquiador', '516125', 0),
(2315, 'AGENTE INDÍGENA DE SAÚDE', 'agente indigena de saude', '515125', 0),
(2316, 'CUIDADOR DE IDOSOS', 'cuidador de idosos', '516210', 1),
(2317, 'MAE SOCIAL', 'mae social', '516215', 0),
(2318, 'CUIDADOR EM SAÚDE', 'cuidador em saude', '516220', 0),
(2319, 'LAVADEIRO, EM GERAL', 'lavadeiro, em geral', '516305', 0),
(2320, 'LAVADOR DE ROUPAS A MAQUINA', 'lavador de roupas a maquina', '516310', 0),
(2321, 'LAVADOR DE ARTEFATOS DE TAPEÇARIA', 'lavador de artefatos de tapecaria', '516315', 0),
(2322, 'BARISTA', 'barista', '513440', 0),
(2323, 'LIMPADOR A SECO, A MÁQUINA', 'limpador a seco, a maquina', '516320', 0),
(2324, 'PASSADOR DE ROUPAS EM GERAL', 'passador de roupas em geral', '516325', 0),
(2325, 'TINGIDOR DE ROUPAS', 'tingidor de roupas', '516330', 0),
(2326, 'CONFERENTE-EXPEDIDOR DE ROUPAS (LAVANDERIAS)', 'conferente-expedidor de roupas (lavanderias)', '516335', 0),
(2327, 'ATENDENTE DE LAVANDERIA', 'atendente de lavanderia', '516340', 0),
(2328, 'AUXILIAR DE LAVANDERIA', 'auxiliar de lavanderia', '516345', 0),
(2329, 'LAVADOR DE ROUPAS', 'lavador de roupas', '516405', 0),
(2330, 'LIMPADOR DE ROUPAS A SECO, A MÃO', 'limpador de roupas a seco, a mao', '516410', 0),
(2331, 'PASSADOR DE ROUPAS, A MÃO', 'passador de roupas, a mao', '516415', 0),
(2332, 'AGENTE FUNERÁRIO', 'agente funerario', '516505', 0),
(2333, 'OPERADOR DE FORNO (SERVIÇOS FUNERÁRIOS)', 'operador de forno (servicos funerarios)', '516605', 0),
(2334, 'SEPULTADOR', 'sepultador', '516610', 0),
(2335, 'ASTRÓLOGO', 'astrologo', '516705', 0),
(2336, 'NUMERÓLOGO', 'numerologo', '516710', 0),
(2337, 'OFICIAL DO EXÉRCITO', 'oficial do exercito', '10210', 0),
(2338, 'OFICIAL DA MARINHA', 'oficial da marinha', '10215', 0),
(2339, 'PRAÇA DA AERONÁUTICA', 'praca da aeronautica', '10305', 0),
(2340, 'PRAÇA DO EXÉRCITO', 'praca do exercito', '10310', 0),
(2341, 'PRAÇA DA MARINHA', 'praca da marinha', '10315', 0),
(2342, 'CORONEL DA POLÍCIA MILITAR', 'coronel da policia militar', '20105', 0),
(2343, 'MAJOR DA POLÍCIA MILITAR', 'major da policia militar', '20115', 0),
(2344, 'TENENTE-CORONEL DA POLÍCIA MILITAR', 'tenente-coronel da policia militar', '20110', 0),
(2345, 'CAPITÃO DA POLÍCIA MILITAR', 'capitao da policia militar', '20205', 0),
(2346, 'PRIMEIRO TENENTE DE POLÍCIA MILITAR', 'primeiro tenente de policia militar', '20305', 0),
(2347, 'SEGUNDO TENENTE DE POLÍCIA MILITAR', 'segundo tenente de policia militar', '20310', 0),
(2348, 'SUBTENENTE DA POLÍCIA MILITAR', 'subtenente da policia militar', '21105', 0),
(2349, 'SARGENTO DA POLÍCIA MILITAR', 'sargento da policia militar', '21110', 0),
(2350, 'CABO DA POLÍCIA MILITAR', 'cabo da policia militar', '21205', 0),
(2351, 'SOLDADO DA POLÍCIA MILITAR', 'soldado da policia militar', '21210', 0),
(2352, 'CORONEL BOMBEIRO MILITAR', 'coronel bombeiro militar', '30105', 0),
(2353, 'MAJOR BOMBEIRO MILITAR', 'major bombeiro militar', '30110', 0),
(2354, 'TENENTE-CORONEL BOMBEIRO MILITAR', 'tenente-coronel bombeiro militar', '30115', 0),
(2355, 'CAPITÃO BOMBEIRO MILITAR', 'capitao bombeiro militar', '30205', 0),
(2356, 'TENENTE DO CORPO DE BOMBEIROS MILITAR', 'tenente do corpo de bombeiros militar', '30305', 0),
(2357, 'SUBTENENTE BOMBEIRO MILITAR', 'subtenente bombeiro militar', '31105', 0),
(2358, 'SARGENTO BOMBEIRO MILITAR', 'sargento bombeiro militar', '31110', 0),
(2359, 'GERENTE DE SEGURANÇA DE TECNOLOGIA DA INFORMAÇÃO', 'gerente de seguranca de tecnologia da informacao', '142525', 0),
(2360, 'GERENTE DE SUPORTE TÉCNICO DE TECNOLOGIA DA INFORMAÇÃO', 'gerente de suporte tecnico de tecnologia da informacao', '142530', 0),
(2361, 'TECNÓLOGO EM ELETRÔNICA', 'tecnologo em eletronica', '214365', 0),
(2362, 'TECNÓLOGO EM GESTÃO DA TECNOLOGIA DA INFORMAÇÃO', 'tecnologo em gestao da tecnologia da informacao', '142535', 0),
(2363, 'GERENTE DE PESQUISA E DESENVOLVIMENTO (Pnull)', 'gerente de pesquisa e desenvolvimento (pnull)', '142605', 0),
(2364, 'ESPECIALISTA EM DESENVOLVIMENTO DE CIGARROS', 'especialista em desenvolvimento de cigarros', '142610', 0),
(2365, 'GERENTE DE PROJETOS E SERVIÇOS DE MANUTENÇÃO', 'gerente de projetos e servicos de manutencao', '142705', 0),
(2366, 'TECNÓLOGO EM SISTEMAS BIOMÉDICOS', 'tecnologo em sistemas biomedicos', '142710', 0),
(2367, 'BIOENGENHEIRO', 'bioengenheiro', '201105', 0),
(2368, 'BIOTECNOLOGISTA', 'biotecnologista', '201110', 0),
(2369, 'GENETICISTA', 'geneticista', '201115', 0),
(2370, 'PESQUISADOR EM METROLOGIA', 'pesquisador em metrologia', '201205', 0),
(2371, 'ESPECIALISTA EM CALIBRAÇÕES METROLÓGICAS', 'especialista em calibracoes metrologicas', '201210', 0),
(2372, 'ESPECIALISTA EM ENSAIOS METROLÓGICOS', 'especialista em ensaios metrologicos', '201215', 0),
(2373, 'ESPECIALISTA EM INSTRUMENTAÇÃO METROLÓGICA', 'especialista em instrumentacao metrologica', '201220', 0),
(2374, 'ESPECIALISTA EM MATERIAIS DE REFERÊNCIA METROLÓGICA', 'especialista em materiais de referencia metrologica', '201225', 0),
(2375, 'ENGENHEIRO MECATRÔNICO', 'engenheiro mecatronico', '202105', 0),
(2376, 'ENGENHEIRO DE CONTROLE E AUTOMAÇÃO', 'engenheiro de controle e automacao', '202110', 0),
(2377, 'TECNÓLOGO EM MECATRÔNICA', 'tecnologo em mecatronica', '202115', 0),
(2378, 'TECNÓLOGO EM AUTOMAÇÃO INDUSTRIAL', 'tecnologo em automacao industrial', '202120', 0),
(2379, 'PESQUISADOR EM BIOLOGIA AMBIENTAL', 'pesquisador em biologia ambiental', '203005', 0),
(2380, 'PESQUISADOR EM BIOLOGIA ANIMAL', 'pesquisador em biologia animal', '203010', 0),
(2381, 'PESQUISADOR EM BIOLOGIA DE MICROORGANISMOS E PARASITAS', 'pesquisador em biologia de microorganismos e parasitas', '203015', 0),
(2382, 'PESQUISADOR EM BIOLOGIA HUMANA', 'pesquisador em biologia humana', '203020', 0),
(2383, 'PESQUISADOR EM BIOLOGIA VEGETAL', 'pesquisador em biologia vegetal', '203025', 0),
(2384, 'PESQUISADOR EM CIÊNCIAS DA COMPUTAÇÃO E INFORMÁTICA', 'pesquisador em ciencias da computacao e informatica', '203105', 0),
(2385, 'GERENTE DE CRÉDITO IMOBILIÁRIO', 'gerente de credito imobiliario', '141725', 0),
(2386, 'GERENTE DE CRÉDITO RURAL', 'gerente de credito rural', '141730', 0),
(2387, 'PESQUISADOR EM CIÊNCIAS DA TERRA E MEIO AMBIENTE', 'pesquisador em ciencias da terra e meio ambiente', '203110', 0),
(2388, 'PESQUISADOR EM FÍSICA', 'pesquisador em fisica', '203115', 0),
(2389, 'PESQUISADOR EM MATEMÁTICA', 'pesquisador em matematica', '203120', 0),
(2390, 'PESQUISADOR EM QUÍMICA', 'pesquisador em quimica', '203125', 0),
(2391, 'PESQUISADOR DE ENGENHARIA CIVIL', 'pesquisador de engenharia civil', '203205', 0),
(2392, 'PESQUISADOR DE ENGENHARIA E TECNOLOGIA (OUTRAS ÁREAS DA ENGENHARIA)', 'pesquisador de engenharia e tecnologia (outras areas da engenharia)', '203210', 0),
(2393, 'PESQUISADOR DE ENGENHARIA MECÂNICA', 'pesquisador de engenharia mecanica', '203220', 0),
(2394, 'PESQUISADOR DE ENGENHARIA ELÉTRICA E ELETRÔNICA', 'pesquisador de engenharia eletrica e eletronica', '203215', 0),
(2395, 'PESQUISADOR DE ENGENHARIA METALÚRGICA, DE MINAS E DE MATERIAIS', 'pesquisador de engenharia metalurgica, de minas e de materiais', '203225', 0),
(2396, 'PESQUISADOR DE ENGENHARIA QUÍMICA', 'pesquisador de engenharia quimica', '203230', 0),
(2397, 'PESQUISADOR DE CLÍNICA MÉDICA', 'pesquisador de clinica medica', '203305', 0),
(2398, 'PESQUISADOR DE MEDICINA BÁSICA', 'pesquisador de medicina basica', '203310', 0),
(2399, 'PESQUISADOR EM MEDICINA VETERINÁRIA', 'pesquisador em medicina veterinaria', '203315', 0),
(2400, 'PESQUISADOR EM SAÚDE COLETIVA', 'pesquisador em saude coletiva', '203320', 0),
(2401, 'PESQUISADOR EM CIÊNCIAS AGRONÔMICAS', 'pesquisador em ciencias agronomicas', '203405', 0),
(2402, 'PESQUISADOR EM CIÊNCIAS DA PESCA E AQÜICULTURA', 'pesquisador em ciencias da pesca e aqüicultura', '203410', 0),
(2403, 'PESQUISADOR EM CIÊNCIAS DA ZOOTECNIA', 'pesquisador em ciencias da zootecnia', '203415', 0),
(2404, 'ENGENHEIRO CIVIL (AEROPORTOS)', 'engenheiro civil (aeroportos)', '214210', 0),
(2405, 'ENGENHEIRO CIVIL (EDIFICAÇÕES)', 'engenheiro civil (edificacoes)', '214215', 0),
(2406, 'ENGENHEIRO CIVIL (ESTRUTURAS METÁLICAS)', 'engenheiro civil (estruturas metalicas)', '214220', 0),
(2407, 'ENGENHEIRO CIVIL (FERROVIAS E METROVIAS)', 'engenheiro civil (ferrovias e metrovias)', '214225', 0),
(2408, 'ENGENHEIRO CIVIL (GEOTÉCNIA)', 'engenheiro civil (geotecnia)', '214230', 0),
(2409, 'ENGENHEIRO CIVIL (HIDROLOGIA)', 'engenheiro civil (hidrologia)', '214235', 0),
(2410, 'ENGENHEIRO CIVIL (HIDRÁULICA)', 'engenheiro civil (hidraulica)', '214240', 0),
(2411, 'ENGENHEIRO CIVIL (PONTES E VIADUTOS)', 'engenheiro civil (pontes e viadutos)', '214245', 0),
(2412, 'ENGENHEIRO CIVIL (PORTOS E VIAS NAVEGÁVEIS)', 'engenheiro civil (portos e vias navegaveis)', '214250', 0),
(2413, 'ENGENHEIRO CIVIL (RODOVIAS)', 'engenheiro civil (rodovias)', '214255', 0),
(2414, 'ENGENHEIRO CIVIL (SANEAMENTO)', 'engenheiro civil (saneamento)', '214260', 0),
(2415, 'ENGENHEIRO CIVIL (TÚNEIS)', 'engenheiro civil (tuneis)', '214265', 0),
(2416, 'ENGENHEIRO CIVIL (TRANSPORTES E TRÂNSITO)', 'engenheiro civil (transportes e transito)', '214270', 0),
(2417, 'TECNÓLOGO EM CONSTRUÇÃO CIVIL', 'tecnologo em construcao civil', '214280', 0),
(2418, 'ENGENHEIRO ELETRICISTA', 'engenheiro eletricista', '214305', 0),
(2419, 'ENGENHEIRO ELETRÔNICO', 'engenheiro eletronico', '214310', 0),
(2420, 'ENGENHEIRO ELETRICISTA DE MANUTENÇÃO', 'engenheiro eletricista de manutencao', '214315', 0),
(2421, 'ENGENHEIRO ELETRICISTA DE PROJETOS', 'engenheiro eletricista de projetos', '214320', 0),
(2422, 'ENGENHEIRO ELETRÔNICO DE MANUTENÇÃO', 'engenheiro eletronico de manutencao', '214325', 0),
(2423, 'ENGENHEIRO ELETRÔNICO DE PROJETOS', 'engenheiro eletronico de projetos', '214330', 0),
(2424, 'ENGENHEIRO DE MANUTENÇÃO DE TELECOMUNICAÇÕES', 'engenheiro de manutencao de telecomunicacoes', '214335', 0),
(2425, 'ENGENHEIRO DE TELECOMUNICAÇÕES', 'engenheiro de telecomunicacoes', '214340', 0),
(2426, 'ENGENHEIRO PROJETISTA DE TELECOMUNICAÇÕES', 'engenheiro projetista de telecomunicacoes', '214345', 0),
(2427, 'ENGENHEIRO DE REDES DE COMUNICAÇÃO', 'engenheiro de redes de comunicacao', '214350', 0),
(2428, 'TECNÓLOGO EM ELETRICIDADE', 'tecnologo em eletricidade', '214360', 0),
(2429, 'TECNÓLOGO EM TELECOMUNICAÇÕES', 'tecnologo em telecomunicacoes', '214370', 0),
(2430, 'ENGENHEIRO MECÂNICO', 'engenheiro mecanico', '214405', 0),
(2431, 'ENGENHEIRO MECÂNICO AUTOMOTIVO', 'engenheiro mecanico automotivo', '214410', 0),
(2432, 'ENGENHEIRO MECÂNICO (ENERGIA NUCLEAR)', 'engenheiro mecanico (energia nuclear)', '214415', 0),
(2433, 'ENGENHEIRO MECÂNICO INDUSTRIAL', 'engenheiro mecanico industrial', '214420', 0),
(2434, 'ENGENHEIRO AERONÁUTICO', 'engenheiro aeronautico', '214425', 0),
(2435, 'ENGENHEIRO NAVAL', 'engenheiro naval', '214430', 0),
(2436, 'TECNÓLOGO EM FABRICAÇÃO MECÂNICA', 'tecnologo em fabricacao mecanica', '214435', 0),
(2437, 'ENGENHEIRO QUÍMICO', 'engenheiro quimico', '214505', 0),
(2438, 'ENGENHEIRO QUÍMICO (INDÚSTRIA QUÍMICA)', 'engenheiro quimico (industria quimica)', '214510', 0),
(2439, 'ENGENHEIRO QUÍMICO (PAPEL E CELULOSE)', 'engenheiro quimico (papel e celulose)', '214520', 0),
(2440, 'PESQUISADOR EM CIÊNCIAS FLORESTAIS', 'pesquisador em ciencias florestais', '203420', 0),
(2441, 'PESQUISADOR EM CIÊNCIAS SOCIAIS E HUMANAS', 'pesquisador em ciencias sociais e humanas', '203505', 0),
(2442, 'PESQUISADOR EM ECONOMIA', 'pesquisador em economia', '203510', 0),
(2443, 'PESQUISADOR EM CIÊNCIAS DA EDUCAÇÃO', 'pesquisador em ciencias da educacao', '203515', 0),
(2444, 'PESQUISADOR EM HISTÓRIA', 'pesquisador em historia', '203520', 0),
(2445, 'PESQUISADOR EM PSICOLOGIA', 'pesquisador em psicologia', '203525', 0),
(2446, 'PERITO CRIMINAL', 'perito criminal', '204105', 0),
(2447, 'ATUÁRIO', 'atuario', '211105', 0),
(2448, 'ESPECIALISTA EM PESQUISA OPERACIONAL', 'especialista em pesquisa operacional', '211110', 0),
(2449, 'MATEMÁTICO', 'matematico', '211115', 0),
(2450, 'MATEMÁTICO APLICADO', 'matematico aplicado', '211120', 0),
(2451, 'ESTATÍSTICO', 'estatistico', '211205', 0),
(2452, 'ESTATÍSTICO (ESTATÍSTICA APLICADA)', 'estatistico (estatistica aplicada)', '211210', 0),
(2453, 'ESTATÍSTICO TEÓRICO', 'estatistico teorico', '211215', 0),
(2454, 'ENGENHEIRO DE APLICATIVOS EM COMPUTAÇÃO', 'engenheiro de aplicativos em computacao', '212205', 0),
(2455, 'ENGENHEIRO DE EQUIPAMENTOS EM COMPUTAÇÃO', 'engenheiro de equipamentos em computacao', '212210', 0),
(2456, 'ENGENHEIROS DE SISTEMAS OPERACIONAIS EM COMPUTAÇÃO', 'engenheiros de sistemas operacionais em computacao', '212215', 0),
(2457, 'ADMINISTRADOR DE BANCO DE DADOS', 'administrador de banco de dados', '212305', 0),
(2458, 'ADMINISTRADOR DE REDES', 'administrador de redes', '212310', 0),
(2459, 'ADMINISTRADOR DE SISTEMAS OPERACIONAIS', 'administrador de sistemas operacionais', '212315', 0),
(2460, 'ADMINISTRADOR EM SEGURANÇA DA INFORMAÇÃO', 'administrador em seguranca da informacao', '212320', 0),
(2461, 'ANALISTA DE DESENVOLVIMENTO DE SISTEMAS', 'analista de desenvolvimento de sistemas', '212405', 0),
(2462, 'ANALISTA DE REDES E DE COMUNICAÇÃO DE DADOS', 'analista de redes e de comunicacao de dados', '212410', 0),
(2463, 'ANALISTA DE SISTEMAS DE AUTOMAÇÃO', 'analista de sistemas de automacao', '212415', 0),
(2464, 'ANALISTA DE SUPORTE COMPUTACIONAL', 'analista de suporte computacional', '212420', 0),
(2465, 'FÍSICO', 'fisico', '213105', 0),
(2466, 'FÍSICO (ACÚSTICA)', 'fisico (acustica)', '213110', 0),
(2467, 'FÍSICO (ATÔMICA E MOLECULAR)', 'fisico (atomica e molecular)', '213115', 0),
(2468, 'FÍSICO (COSMOLOGIA)', 'fisico (cosmologia)', '213120', 0),
(2469, 'FÍSICO (ESTATÍSTICA E MATEMÁTICA)', 'fisico (estatistica e matematica)', '213125', 0),
(2470, 'FÍSICO (FLUIDOS)', 'fisico (fluidos)', '213130', 0),
(2471, 'FÍSICO (INSTRUMENTAÇÃO)', 'fisico (instrumentacao)', '213135', 0),
(2472, 'FÍSICO (MATÉRIA CONDENSADA)', 'fisico (materia condensada)', '213140', 0),
(2473, 'FÍSICO (MATERIAIS)', 'fisico (materiais)', '213145', 0),
(2474, 'FÍSICO (MEDICINA)', 'fisico (medicina)', '213150', 0),
(2475, 'FÍSICO (NUCLEAR E REATORES)', 'fisico (nuclear e reatores)', '213155', 0),
(2476, 'FÍSICO (ÓPTICA)', 'fisico (optica)', '213160', 0),
(2477, 'FÍSICO (PARTÍCULAS E CAMPOS)', 'fisico (particulas e campos)', '213165', 0),
(2478, 'FÍSICO (PLASMA)', 'fisico (plasma)', '213170', 0),
(2479, 'FÍSICO (TÉRMICA)', 'fisico (termica)', '213175', 0),
(2480, 'QUÍMICO', 'quimico', '213205', 0),
(2481, 'QUÍMICO INDUSTRIAL', 'quimico industrial', '213210', 0),
(2482, 'ASTRÔNOMO', 'astronomo', '213305', 0),
(2483, 'GEÓLOGO', 'geologo', '213405', 0),
(2484, 'TECNÓLOGO EM PROCESSOS QUÍMICOS', 'tecnologo em processos quimicos', '213215', 0),
(2485, 'GEOFÍSICO ESPACIAL', 'geofisico espacial', '213310', 0),
(2486, 'METEOROLOGISTA', 'meteorologista', '213315', 0),
(2487, 'GEÓLOGO DE ENGENHARIA', 'geologo de engenharia', '213410', 0),
(2488, 'GEOFÍSICO', 'geofisico', '213415', 0),
(2489, 'GEOQUÍMICO', 'geoquimico', '213420', 0),
(2490, 'HIDROGEÓLOGO', 'hidrogeologo', '213425', 0),
(2491, 'PALEONTÓLOGO', 'paleontologo', '213430', 0),
(2492, 'PETRÓGRAFO', 'petrografo', '213435', 0),
(2493, 'OCEANÓGRAFO', 'oceanografo', '213440', 0),
(2494, 'ENGENHEIRO AMBIENTAL', 'engenheiro ambiental', '214005', 0),
(2495, 'TECNÓLOGO EM MEIO AMBIENTE', 'tecnologo em meio ambiente', '214010', 0),
(2496, 'ARQUITETO DE EDIFICAÇÕES', 'arquiteto de edificacoes', '214105', 0),
(2497, 'ARQUITETO DE INTERIORES', 'arquiteto de interiores', '214110', 0),
(2498, 'ARQUITETO DE PATRIMÔNIO', 'arquiteto de patrimonio', '214115', 0),
(2499, 'ARQUITETO PAISAGISTA', 'arquiteto paisagista', '214120', 0),
(2500, 'ARQUITETO URBANISTA', 'arquiteto urbanista', '214125', 0),
(2501, 'URBANISTA', 'urbanista', '214130', 0),
(2502, 'ENGENHEIRO CIVIL', 'engenheiro civil', '214205', 0),
(2503, 'TRABALHADOR DA CULTURA DO RAMI', 'trabalhador da cultura do rami', '622215', 0),
(2504, 'TRABALHADOR NA OLERICULTURA (FRUTOS E SEMENTES)', 'trabalhador na olericultura (frutos e sementes)', '622305', 0),
(2505, 'TRABALHADOR NA OLERICULTURA (LEGUMES)', 'trabalhador na olericultura (legumes)', '622310', 0),
(2506, 'TRABALHADOR NA OLERICULTURA (RAÍZES, BULBOS E TUBÉRCULOS)', 'trabalhador na olericultura (raizes, bulbos e tuberculos)', '622315', 0),
(2507, 'TRABALHADOR NA OLERICULTURA (TALOS, FOLHAS E FLORES)', 'trabalhador na olericultura (talos, folhas e flores)', '622320', 0),
(2508, 'TRABALHADOR NO CULTIVO DE FLORES E FOLHAGENS DE CORTE', 'trabalhador no cultivo de flores e folhagens de corte', '622405', 0),
(2509, 'TRABALHADOR NO CULTIVO DE FLORES EM VASO', 'trabalhador no cultivo de flores em vaso', '622410', 0),
(2510, 'TRABALHADOR NO CULTIVO DE FORRAÇÕES', 'trabalhador no cultivo de forracoes', '622415', 0),
(2511, 'TRABALHADOR NO CULTIVO DE MUDAS', 'trabalhador no cultivo de mudas', '622420', 0),
(2512, 'TRABALHADOR NO CULTIVO DE PLANTAS ORNAMENTAIS', 'trabalhador no cultivo de plantas ornamentais', '622425', 0),
(2513, 'TRABALHADOR NO CULTIVO DE ÁRVORES FRUTÍFERAS', 'trabalhador no cultivo de arvores frutiferas', '622505', 0),
(2514, 'TRABALHADOR NO CULTIVO DE ESPÉCIES FRUTÍFERAS RASTEIRAS', 'trabalhador no cultivo de especies frutiferas rasteiras', '622510', 0),
(2515, 'TRABALHADOR NO CULTIVO DE TREPADEIRAS FRUTÍFERAS', 'trabalhador no cultivo de trepadeiras frutiferas', '622515', 0),
(2516, 'TRABALHADOR DA CULTURA DE CACAU', 'trabalhador da cultura de cacau', '622605', 0),
(2517, 'TRABALHADOR DA CULTURA DE CAFÉ', 'trabalhador da cultura de cafe', '622610', 0),
(2518, 'TRABALHADOR DA CULTURA DE ERVA-MATE', 'trabalhador da cultura de erva-mate', '622615', 0),
(2519, 'TRABALHADOR DA CULTURA DE FUMO', 'trabalhador da cultura de fumo', '622620', 0),
(2520, 'TRABALHADOR DA CULTURA DE GUARANÁ', 'trabalhador da cultura de guarana', '622625', 0),
(2521, 'TRABALHADOR NA CULTURA DE AMENDOIM', 'trabalhador na cultura de amendoim', '622705', 0),
(2522, 'TRABALHADOR NA CULTURA DE CANOLA', 'trabalhador na cultura de canola', '622710', 0),
(2523, 'TRABALHADOR NA CULTURA DE COCO-DA-BAÍA', 'trabalhador na cultura de coco-da-baia', '622715', 0),
(2524, 'TRABALHADOR NA CULTURA DE DENDÊ', 'trabalhador na cultura de dende', '622720', 0),
(2525, 'TRABALHADOR NA CULTURA DE MAMONA', 'trabalhador na cultura de mamona', '622725', 0),
(2526, 'TRABALHADOR NA CULTURA DE SOJA', 'trabalhador na cultura de soja', '622730', 0),
(2527, 'TRABALHADOR NA CULTURA DO GIRASSOL', 'trabalhador na cultura do girassol', '622735', 0),
(2528, 'TRABALHADOR NA CULTURA DO LINHO', 'trabalhador na cultura do linho', '622740', 0),
(2529, 'TRABALHADOR DA CULTURA DE ESPECIARIAS', 'trabalhador da cultura de especiarias', '622805', 0),
(2530, 'TRABALHADOR DA CULTURA DE PLANTAS AROMÁTICAS E MEDICINAIS', 'trabalhador da cultura de plantas aromaticas e medicinais', '622810', 0),
(2531, 'ADESTRADOR DE ANIMAIS', 'adestrador de animais', '623005', 0),
(2532, 'INSEMINADOR', 'inseminador', '623010', 0),
(2533, 'TRABALHADOR DE PECUÁRIA POLIVALENTE', 'trabalhador de pecuaria polivalente', '623015', 0),
(2534, 'TRATADOR DE ANIMAIS', 'tratador de animais', '623020', 0),
(2535, 'GERENTE COMERCIAL', 'gerente comercial', '142305', 0),
(2536, 'GERENTE DE COMUNICAÇÃO', 'gerente de comunicacao', '142310', 0),
(2537, 'GERENTE DE MARKETING', 'gerente de marketing', '142315', 0),
(2538, 'GERENTE DE VENDAS', 'gerente de vendas', '142320', 0),
(2539, 'RELAÇÕES PÚBLICAS', 'relacoes publicas', '142325', 0),
(2540, 'ANALISTA DE NEGÓCIOS', 'analista de negocios', '142330', 0),
(2541, 'ANALISTA DE PESQUISA DE MERCADO', 'analista de pesquisa de mercado', '142335', 0),
(2542, 'GERENTE DE COMPRAS', 'gerente de compras', '142405', 0),
(2543, 'GERENTE DE SUPRIMENTOS', 'gerente de suprimentos', '142410', 0),
(2544, 'GERENTE DE ALMOXARIFADO', 'gerente de almoxarifado', '142415', 0),
(2545, 'GERENTE DE REDE', 'gerente de rede', '142505', 0),
(2546, 'GERENTE DE DESENVOLVIMENTO DE SISTEMAS', 'gerente de desenvolvimento de sistemas', '142510', 0),
(2547, 'GERENTE DE PRODUÇÃO DE TECNOLOGIA DA INFORMAÇÃO', 'gerente de producao de tecnologia da informacao', '142515', 0),
(2548, 'GERENTE DE PROJETOS DE TECNOLOGIA DA INFORMAÇÃO', 'gerente de projetos de tecnologia da informacao', '142520', 0),
(2549, 'AGENTE DE AÇÃO SOCIAL', 'agente de acao social', '515310', 0),
(2550, 'RECEPCIONISTA, EM GERAL', 'recepcionista, em geral', '422105', 1),
(2551, 'AGENTE DE COMBATE ÀS ENDEMIAS', 'agente de combate as endemias', '515140', 0),
(2552, 'OUVIDOR', 'ouvidor', '142340', 0),
(2553, 'FARMACÊUTICO PRÁTICAS INTEGRATIVAS E COMPLEMENTARES', 'farmaceutico praticas integrativas e complementares', '223425', 0),
(2554, 'FARMACÊUTICO EM SAÚDE PÚBLICA', 'farmaceutico em saude publica', '223430', 0),
(2555, 'FARMACÊUTICO HOSPITALAR E CLÍNICO', 'farmaceutico hospitalar e clinico', '223445', 0),
(2556, 'AGENTE DE COMBATE ÀS ENDEMIAS', 'agente de combate as endemias', '5151F1', 0),
(2557, 'AGENTE DE SAÚDE PÚBLICA', 'agente de saude publica', '352210', 0),
(2558, 'GERONTÓLOGO', 'gerontologo', '131220', 0),
(2559, 'HIGIÊNISTA OCUPACIONAL', 'higienista ocupacional', '214940', 0),
(2560, 'MÉDICO ANTROPOSÓFICO', 'medico antroposofico', '225154', 0),
(2561, 'PROFISSIONAL DE RELAÇÕES COM INVESTIDORES', 'profissional de relacoes com investidores', '252550', 0),
(2562, 'DIRETOR DE CRIAÇÃO', 'diretor de criacao', '253130', 0),
(2563, 'DIRETOR DE CONTAS (PUBLICIDADE)', 'diretor de contas (publicidade)', '253135', 0),
(2564, 'AGENCIADOR DE PROPAGANDA', 'agenciador de propaganda', '253140', 0),
(2565, 'FISCAL DE ATIVIDADES URBANAS', 'fiscal de atividades urbanas', '254505', 0),
(2566, 'AUDIODESCRITOR', 'audiodescritor', '261430', 0),
(2567, 'FERRADOR DE ANIMAIS', 'ferrador de animais', '300130', 0),
(2568, 'TECNÓLOGO EM SOLDAGEM', 'tecnologo em soldagem', '314625', 0),
(2569, 'CITOTÉCNICO', 'citotecnico', '324215', 0),
(2570, 'TÉCNICO EM HEMOTERAPIA', 'tecnico em hemoterapia', '324220', 0),
(2571, 'CONDUTOR DE MÁQUINAS (BOMBEADOR)', 'condutor de maquinas (bombeador)', '341320', 0),
(2572, 'CONDUTOR DE MÁQUINAS (MECÂNICO)', 'condutor de maquinas (mecanico)', '341325', 0),
(2573, 'TÉCNICO EM HIGIENE OCUPACIONAL', 'tecnico em higiene ocupacional', '351610', 0),
(2574, 'CERIMONIALISTA', 'cerimonialista', '354825', 0),
(2575, 'MESTRE DE CERIMONIAS', 'mestre de cerimonias', '376330', 0),
(2576, 'ENTREGADOR DE PUBLICAÇÕES', 'entregador de publicacoes', '415215', 0),
(2577, 'CONCIERGE', 'concierge', '422130', 0),
(2578, 'ENTREVISTADOR SOCIAL', 'entrevistador social', '424130', 0),
(2579, 'CONDUTOR DE TURISMO DE AVENTURA', 'condutor de turismo de aventura', '511505', 0),
(2580, 'CONDUTOR DE TURISMO DE PESCA', 'condutor de turismo de pesca', '511510', 0),
(2581, 'FISCAL DE LOJA', 'fiscal de loja', '517425', 0),
(2582, 'MOTOTAXISTA', 'mototaxista', '519115', 0),
(2583, 'ATENDENTE DE LOJAS E MERCADOS', 'atendente de lojas e mercados', '521140', 0),
(2584, 'CASQUEADOR DE ANIMAIS', 'casqueador de animais', '623025', 0),
(2585, 'TAPECEIRO DE AUTOS', 'tapeceiro de autos', '725240', 0),
(2586, 'CONDUTOR DE AMBULÂNCIA', 'condutor de ambulancia', '782320', 0),
(2587, 'MARINHEIRO AUXILIAR DE CONVÉS (MARÍTIMO E AQUAVIÁRIO)', 'marinheiro auxiliar de conves (maritimo e aquaviario)', '782730', 0),
(2588, 'MARINHEIRO DE AUXILIAR DE MÁQUINAS (MARÍTIMO E AQUAVIÁRIO)', 'marinheiro de auxiliar de maquinas (maritimo e aquaviario)', '782735', 0),
(2589, 'OPERADOR DE ABASTECIMENTO DE COMBUSTÍVEL DE AERONAVE', 'operador de abastecimento de combustivel de aeronave', '862160', 0),
(2590, 'MONITOR DE SISTEMAS ELETRÔNICOS DE SEGURANÇA INTERNO', 'monitor de sistemas eletronicos de seguranca interno', '951315', 0),
(2591, 'MONITOR DE SISTEMAS ELETRÔNICOS DE SEGURANÇA EXTERNO', 'monitor de sistemas eletronicos de seguranca externo', '951320', 0),
(2592, 'TÉCNICO EM PATOLOGIA CLÍNICA', 'tecnico em patologia clinica', '324205', 0),
(2593, 'EQUOTERAPEUTA', 'equoterapeuta', '226315', 0),
(2594, 'FISIOTERAPEUTA DO TRABALHO', 'fisioterapeuta do trabalho', '223660', 0),
(2595, 'FISIOTERAPEUTA ESPORTIVO', 'fisioterapeuta esportivo', '223655', 0),
(2596, 'FISIOTERAPEUTA TRAUMATO-ORTOPÉDICA FUNCIONAL', 'fisioterapeuta traumato-ortopedica funcional', '223635', 0),
(2597, 'FISIOTERAPEUTA NEUROFUNCIONAL', 'fisioterapeuta neurofuncional', '223630', 0),
(2598, 'FONOAUDIÓLOGO EM SAÚDE COLETIVA', 'fonoaudiologo em saude coletiva', '223840', 0),
(2599, 'FONOAUDIÓLOGO EDUCACIONAL', 'fonoaudiologo educacional', '223815', 0),
(2600, 'FONOAUDIÓLOGO EM LINGUAGEM', 'fonoaudiologo em linguagem', '223830', 0),
(2601, 'MÉDICO EM MEDICINA PREVENTIVA E SOCIAL', 'medico em medicina preventiva e social', '2231F8', 0),
(2602, 'NATURÓLOGO', 'naturologo', '226320', 0),
(2603, 'MÉDICO HANSENOLOGISTA', 'medico hansenologista', '2231A2', 0),
(2604, 'FARMACÊUTICO BIOQUÍMICO', 'farmaceutico bioquimico', '223410', 0),
(2605, 'AGENTE INDÍGENA DE SANEAMENTO', 'agente indigena de saneamento', '515130', 0),
(2606, 'SANITARISTA', 'sanitarista', '131225', 0),
(2607, 'MONITOR DE TELEATENDIMENTO', 'monitor de teleatendimento', '422215', 0),
(2608, 'OPERADOR DE RÁDIO-CHAMADA', 'operador de radio-chamada', '422220', 0),
(2609, 'MÉDICO RADIOLOGISTA INTERVENCIONISTA', 'medico radiologista intervencionista', '225355', 0),
(2610, 'TERAPÊUTA HOLÍSTICO', 'terapeuta holistico', '322525', 0),
(2611, 'PROFISSIONAL DE EDUCAÇÃO FÍSICA NA SAÚDE', 'profissional de educacao fisica na saude', '224140', 0),
(2612, 'PROFISSIONAL DE EDUCAÇÃO FÍSICA NA SAÚDE', 'profissional de educacao fisica na saude', '22410', 0),
(2613, 'PSICOMOTRICISTA', 'psicomotricista', '223915', 0),
(2620, 'ORIENTADOR SOCIAL', 'orientador social', '000000', 1),
(2625, 'OUTROS', 'outros', '000000', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `uf_id` tinyint(3) UNSIGNED NOT NULL,
  `description` text DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `cities`
--

INSERT INTO `cities` (`id`, `name`, `uf_id`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'BREJO DO CRUZ', 25, NULL, 1, '2024-04-08 20:22:02', '2024-04-08 20:22:02'),
(2, 'POMBAL', 25, NULL, 1, '2024-04-08 20:22:17', '2024-04-08 20:22:17');

-- --------------------------------------------------------

--
-- Estrutura para tabela `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `cnpj` varchar(100) NOT NULL,
  `responsible` varchar(191) NOT NULL,
  `cpf` varchar(100) NOT NULL,
  `address` varchar(191) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `observation` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `companies`
--

INSERT INTO `companies` (`id`, `name`, `cnpj`, `responsible`, `cpf`, `address`, `phone`, `observation`, `created_at`, `updated_at`) VALUES
(1, 'AG ASSESORIA', '42.942.838/4234-23', 'JOAO DA SILVA PEREIRA', '649.058.440-96', NULL, NULL, NULL, '2024-04-08 20:23:02', '2024-04-08 20:23:02');

-- --------------------------------------------------------

--
-- Estrutura para tabela `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) DEFAULT NULL,
  `type_agent_id` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `agent_pf_id` bigint(20) UNSIGNED DEFAULT NULL,
  `agent_pj_with_profit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `agent_collective_without_cnpj_id` bigint(20) UNSIGNED DEFAULT NULL,
  `agent_pj_without_profit_id` bigint(20) UNSIGNED DEFAULT NULL,
  `agent_mei_id` bigint(20) UNSIGNED DEFAULT NULL,
  `avatar_path` varchar(191) DEFAULT NULL,
  `cover_path` varchar(191) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `tenant_id` bigint(20) UNSIGNED NOT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `customers`
--

INSERT INTO `customers` (`id`, `email`, `password`, `type_agent_id`, `agent_pf_id`, `agent_pj_with_profit_id`, `agent_collective_without_cnpj_id`, `agent_pj_without_profit_id`, `agent_mei_id`, `avatar_path`, `cover_path`, `is_active`, `tenant_id`, `last_login_at`, `created_at`, `updated_at`) VALUES
(1, 'marcos@gmail.com', '123456', 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2025-02-18 11:17:35', '2025-02-16 12:42:42', '2025-02-18 11:17:35'),
(2, 'alcionehist@gmail.com', '123456', 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '2025-02-16 13:05:09', '2025-02-16 12:44:19', '2025-02-16 13:05:09'),
(3, 'devcactus@gmail.com', '123456', 5, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, 1, '2025-02-16 17:20:29', '2025-02-16 17:20:29', '2025-02-16 17:20:29');

-- --------------------------------------------------------

--
-- Estrutura para tabela `customer_agent_collectives`
--

CREATE TABLE `customer_agent_collectives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `tenant_id` bigint(20) UNSIGNED NOT NULL,
  `representant_cpf` varchar(100) NOT NULL,
  `representant_name` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `registered_at` date NOT NULL,
  `participants_total` mediumint(8) UNSIGNED NOT NULL,
  `responsable_name` varchar(191) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `customer_agent_meis`
--

CREATE TABLE `customer_agent_meis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `tenant_id` bigint(20) UNSIGNED NOT NULL,
  `cnpj` varchar(191) NOT NULL,
  `organization_name` varchar(191) NOT NULL,
  `company_name` varchar(191) NOT NULL,
  `registered_at` date NOT NULL,
  `representant_name` varchar(191) NOT NULL,
  `representant_cpf` varchar(100) NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(191) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `responsible_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `customer_agent_meis`
--

INSERT INTO `customer_agent_meis` (`id`, `customer_id`, `tenant_id`, `cnpj`, `organization_name`, `company_name`, `registered_at`, `representant_name`, `representant_cpf`, `city_id`, `address`, `phone`, `responsible_name`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '46.713.168/0001-45', 'DEVCACTUS TECNOLOCIA', 'A OLIVEIRA LIMA', '2022-06-08', 'MARCOS LISBOA', '072.587.034-62', 1270, 'RUA', '(83) 99672-9999', 'MARCOS LISBOA', '2025-02-16 17:20:29', '2025-02-16 17:20:29');

-- --------------------------------------------------------

--
-- Estrutura para tabela `customer_agent_pfs`
--

CREATE TABLE `customer_agent_pfs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `tenant_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `cpf` varchar(100) NOT NULL,
  `date_of_birth` date NOT NULL,
  `rg` varchar(191) NOT NULL,
  `nickname` varchar(100) DEFAULT NULL,
  `gender_id` tinyint(3) UNSIGNED NOT NULL,
  `breed_id` tinyint(3) UNSIGNED NOT NULL,
  `is_lgbt` tinyint(1) NOT NULL DEFAULT 0,
  `schooling_id` tinyint(3) UNSIGNED NOT NULL,
  `income` double UNSIGNED NOT NULL,
  `area_atuation_id` tinyint(3) UNSIGNED NOT NULL,
  `area_atuation_other` varchar(191) DEFAULT NULL,
  `community_traditional_id` tinyint(3) UNSIGNED NOT NULL,
  `is_pcd` tinyint(1) DEFAULT NULL,
  `deiciency_name` varchar(191) DEFAULT NULL,
  `is_beneficiary_program_social` tinyint(1) DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(191) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `responsible_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `customer_agent_pfs`
--

INSERT INTO `customer_agent_pfs` (`id`, `customer_id`, `tenant_id`, `name`, `cpf`, `date_of_birth`, `rg`, `nickname`, `gender_id`, `breed_id`, `is_lgbt`, `schooling_id`, `income`, `area_atuation_id`, `area_atuation_other`, `community_traditional_id`, `is_pcd`, `deiciency_name`, `is_beneficiary_program_social`, `city_id`, `address`, `phone`, `responsible_name`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'MARCOS LISBOA', '072.587.034-62', '1988-09-02', '123456', 'MARQUINHOS', 1, 2, 0, 7, 2200, 1, NULL, 1, 0, NULL, 0, 1280, 'RUA', '(83) 99672-9999', 'MARCOS LISBOA', '2025-02-16 12:42:42', '2025-02-16 12:42:42'),
(2, 2, 1, 'JOSÉ ALCIONE', '038.439.354-32', '1988-02-02', '2519317 SSPPB', 'NÃO APLICA', 1, 4, 0, 8, 2000, 99, 'Produção', 1, 0, NULL, 0, 1280, 'Rua Paraíba', '(83) 99841-1585', 'JOSÉ ALCIONE', '2025-02-16 12:44:19', '2025-02-16 12:44:19');

-- --------------------------------------------------------

--
-- Estrutura para tabela `customer_agent_pj_without_profits`
--

CREATE TABLE `customer_agent_pj_without_profits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `tenant_id` bigint(20) UNSIGNED NOT NULL,
  `cnpj` varchar(191) NOT NULL,
  `organization_name` varchar(191) NOT NULL,
  `company_name` varchar(191) NOT NULL,
  `registered_at` date NOT NULL,
  `representant_name` varchar(191) NOT NULL,
  `representant_cpf` varchar(100) NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(191) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `responsible_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `customer_agent_pj_with_profits`
--

CREATE TABLE `customer_agent_pj_with_profits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `tenant_id` bigint(20) UNSIGNED NOT NULL,
  `cnpj` varchar(191) NOT NULL,
  `organization_name` varchar(191) NOT NULL,
  `company_name` varchar(191) NOT NULL,
  `registered_at` date NOT NULL,
  `representant_name` varchar(191) NOT NULL,
  `representant_cpf` varchar(100) NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(191) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `responsible_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `customer_social_medias`
--

CREATE TABLE `customer_social_medias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `media_id` tinyint(3) UNSIGNED NOT NULL,
  `link` varchar(191) NOT NULL,
  `description` varchar(191) NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `editals`
--

CREATE TABLE `editals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `type_id` tinyint(3) UNSIGNED NOT NULL,
  `open_at` date DEFAULT NULL,
  `horary_open_at` varchar(10) NOT NULL,
  `closed_at` date DEFAULT NULL,
  `horary_closed_at` varchar(10) NOT NULL,
  `price` double UNSIGNED NOT NULL,
  `vacancies` smallint(5) UNSIGNED NOT NULL,
  `register_type_id` tinyint(3) UNSIGNED NOT NULL,
  `observation` text DEFAULT NULL,
  `photo` varchar(191) DEFAULT NULL,
  `banner` varchar(191) DEFAULT NULL,
  `extended_at` date DEFAULT NULL,
  `horary_extended_at` varchar(191) DEFAULT NULL,
  `documentation_type_id` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `tenant_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `editals`
--

INSERT INTO `editals` (`id`, `name`, `type_id`, `open_at`, `horary_open_at`, `closed_at`, `horary_closed_at`, `price`, `vacancies`, `register_type_id`, `observation`, `photo`, `banner`, `extended_at`, `horary_extended_at`, `documentation_type_id`, `status`, `tenant_id`, `created_at`, `updated_at`) VALUES
(1, 'EDITAL DE SELEÇÃO', 1, '2025-02-16', '12:40', '2025-02-20', '16:00', 41882.65, 10, 1, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, '2025-02-16 12:38:43', '2025-02-16 12:40:04'),
(2, 'AG ACESSORIA', 2, '2025-02-16', '18:30', '2025-10-08', '16:00', 50000, 10, 1, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, '2025-02-16 17:54:28', '2025-02-16 18:37:54');

-- --------------------------------------------------------

--
-- Estrutura para tabela `edital_agent_types`
--

CREATE TABLE `edital_agent_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `people_type_id` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `edital_agent_types`
--

INSERT INTO `edital_agent_types` (`id`, `name`, `people_type_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Pessoa física', 1, 1, '2024-12-21 13:01:31', '2024-12-21 13:01:31'),
(2, 'Coletivo sem CNPJ', 3, 1, '2024-12-21 13:01:31', '2024-12-21 13:01:31'),
(3, 'Pessoa jurídica com fins lucrativos', 2, 1, '2024-12-21 13:01:31', '2024-12-21 13:01:31'),
(4, 'Pessoa jurídica sem fins lucrativos', 2, 1, '2024-12-21 13:01:31', '2024-12-21 13:01:31'),
(5, 'MEI', 2, 1, '2024-12-21 13:01:31', '2024-12-21 13:01:31');

-- --------------------------------------------------------

--
-- Estrutura para tabela `edital_assign_avaliator`
--

CREATE TABLE `edital_assign_avaliator` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `avaliator_id` bigint(20) UNSIGNED NOT NULL,
  `edital_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `edital_attachments`
--

CREATE TABLE `edital_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `path` varchar(191) NOT NULL,
  `edital_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `edital_attachments`
--

INSERT INTO `edital_attachments` (`id`, `name`, `path`, `edital_id`) VALUES
(1, 'EDITAL', 'tenants/1/editals/1/attachments/4juSewTVB4T6g1mQsnN2g4NFCf6GBZPc.pdf', 1),
(2, 'EDITAL', 'tenants/1/editals/2/attachments/SwzbhhORCUc18SLQ0hiODMV1cOY9LWX6.pdf', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `edital_documents`
--

CREATE TABLE `edital_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `edital_id` bigint(20) UNSIGNED NOT NULL,
  `document_id` tinyint(3) UNSIGNED NOT NULL,
  `is_required` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `edital_documents`
--

INSERT INTO `edital_documents` (`id`, `edital_id`, `document_id`, `is_required`) VALUES
(79, 1, 1, 1),
(80, 1, 2, 1),
(81, 1, 8, 1),
(82, 1, 10, 1),
(83, 1, 13, 1),
(84, 1, 16, 1),
(85, 1, 19, 1),
(86, 1, 22, 1),
(87, 1, 25, 1),
(88, 1, 26, 1),
(89, 1, 27, 1),
(90, 1, 28, 1),
(91, 1, 37, 1),
(92, 1, 40, 1),
(93, 1, 4, 1),
(94, 1, 7, 1),
(95, 1, 11, 1),
(96, 1, 14, 1),
(97, 1, 17, 1),
(98, 1, 20, 1),
(99, 1, 23, 1),
(100, 1, 29, 1),
(101, 1, 31, 1),
(102, 1, 33, 1),
(103, 1, 35, 1),
(104, 1, 38, 1),
(105, 1, 41, 1),
(106, 1, 5, 1),
(107, 1, 12, 1),
(108, 1, 15, 1),
(109, 1, 18, 1),
(110, 1, 21, 1),
(111, 1, 24, 1),
(112, 1, 30, 1),
(113, 1, 32, 1),
(114, 1, 34, 1),
(115, 1, 36, 1),
(116, 1, 39, 1),
(117, 1, 42, 1),
(192, 2, 1, 1),
(193, 2, 2, 1),
(194, 2, 8, 1),
(195, 2, 10, 1),
(196, 2, 13, 1),
(197, 2, 16, 1),
(198, 2, 19, 1),
(199, 2, 22, 1),
(200, 2, 25, 1),
(201, 2, 26, 1),
(202, 2, 27, 1),
(203, 2, 28, 1),
(204, 2, 37, 1),
(205, 2, 40, 1),
(206, 2, 11, 1),
(207, 2, 14, 1),
(208, 2, 17, 1),
(209, 2, 20, 1),
(210, 2, 23, 1),
(211, 2, 29, 1),
(212, 2, 31, 1),
(213, 2, 33, 1),
(214, 2, 35, 1),
(215, 2, 38, 1),
(216, 2, 41, 1),
(217, 2, 5, 1),
(218, 2, 12, 1),
(219, 2, 15, 1),
(220, 2, 18, 1),
(221, 2, 21, 1),
(222, 2, 24, 1),
(223, 2, 30, 1),
(224, 2, 32, 1),
(225, 2, 34, 1),
(226, 2, 36, 1),
(227, 2, 39, 1),
(228, 2, 42, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `edital_document_types`
--

CREATE TABLE `edital_document_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `people_type_id` tinyint(3) UNSIGNED NOT NULL,
  `tenant_id` bigint(20) UNSIGNED NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `edital_document_types`
--

INSERT INTO `edital_document_types` (`id`, `name`, `people_type_id`, `tenant_id`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'CPF', 1, 1, 0, '2024-12-07 20:11:39', '2025-02-16 11:46:12'),
(2, 'COMPROVANTE DE RESIDENCIA', 1, 1, 1, '2024-12-07 20:27:27', '2024-12-07 20:27:27'),
(3, 'CERTIDAO DE NASCIMENTO', 1, 1, 1, '2024-12-07 20:27:57', '2024-12-07 23:02:34'),
(4, 'CNPJ', 2, 1, 1, '2024-12-07 20:41:28', '2024-12-07 20:41:28'),
(5, 'CPF E RG', 3, 1, 1, '2024-12-07 20:41:44', '2025-02-16 11:30:14'),
(6, 'CCMEI', 2, 1, 1, '2024-12-09 19:33:38', '2024-12-09 19:33:38'),
(7, 'FGTS', 2, 1, 1, '2024-12-09 19:33:59', '2024-12-09 19:33:59'),
(8, 'RG FRENTE E VERSO', 1, 1, 1, '2024-12-09 19:34:11', '2025-02-16 11:25:21'),
(9, 'CARTEIRA DO ARTISTA', 2, 1, 1, '2024-12-09 19:40:03', '2024-12-21 01:20:05'),
(10, 'TRAJETÓRIA', 1, 1, 1, '2025-02-16 11:27:56', '2025-02-16 11:27:56'),
(11, 'TRAJETÓRIA', 2, 1, 1, '2025-02-16 11:28:22', '2025-02-16 11:28:22'),
(12, 'TRAJETÓRIA', 3, 1, 1, '2025-02-16 11:28:38', '2025-02-16 11:28:38'),
(13, 'PRODUÇÕES CULTURAIS RECENTES  2022 A 2024', 1, 1, 1, '2025-02-16 11:29:26', '2025-02-16 11:29:26'),
(14, 'PRODUÇÕES CULTURAIS RECENTES  2022 A 2024', 2, 1, 1, '2025-02-16 11:29:33', '2025-02-16 11:29:33'),
(15, 'PRODUÇÕES CULTURAIS RECENTES  2022 A 2024', 3, 1, 1, '2025-02-16 11:29:39', '2025-02-16 11:29:39'),
(16, 'PARTICIPAÇÃO EM EVENTOS MUNICIPAIS', 1, 1, 1, '2025-02-16 11:30:38', '2025-02-16 11:30:38'),
(17, 'PARTICIPAÇÃO EM EVENTOS MUNICIPAIS', 2, 1, 1, '2025-02-16 11:30:43', '2025-02-16 11:30:43'),
(18, 'PARTICIPAÇÃO EM EVENTOS MUNICIPAIS', 3, 1, 1, '2025-02-16 11:30:55', '2025-02-16 11:30:55'),
(19, 'PARTICIPAÇÃO EM EVENTOS REGIONAIS', 1, 1, 1, '2025-02-16 11:31:11', '2025-02-16 11:31:11'),
(20, 'PARTICIPAÇÃO EM EVENTOS REGIONAIS', 2, 1, 1, '2025-02-16 11:31:26', '2025-02-16 11:31:26'),
(21, 'PARTICIPAÇÃO EM EVENTOS REGIONAIS', 3, 1, 1, '2025-02-16 11:31:32', '2025-02-16 11:31:32'),
(22, 'PARTICIPAÇÃO EM EVENTOS NACIONAIS', 1, 1, 1, '2025-02-16 11:31:49', '2025-02-16 11:31:49'),
(23, 'PARTICIPAÇÃO EM EVENTOS NACIONAIS', 2, 1, 1, '2025-02-16 11:31:55', '2025-02-16 11:31:55'),
(24, 'PARTICIPAÇÃO EM EVENTOS NACIONAIS', 3, 1, 1, '2025-02-16 11:32:01', '2025-02-16 11:32:01'),
(25, 'AGENTES CULTURAIS DO GÊNERO FEMININO', 1, 1, 1, '2025-02-16 11:32:35', '2025-02-16 11:32:35'),
(26, 'AGENTES CULTURAIS NEGROS E INDÍGENAS', 1, 1, 1, '2025-02-16 11:32:49', '2025-02-16 11:32:49'),
(27, 'AGENTES CULTURAIS COM DEFICIÊNCIA', 1, 1, 1, '2025-02-16 11:33:05', '2025-02-16 11:33:05'),
(28, 'AGENTES CULTURAIS  LGBTQIAPN+', 1, 1, 1, '2025-02-16 11:36:22', '2025-02-16 11:36:22'),
(29, 'PESSOAS JURÍDICAS OU COLETIVOS/GRUPOS COMPOSTOS MAJORITARIAMENTE POR PESSOAS NEGRAS OU INDÍGENAS', 2, 1, 1, '2025-02-16 11:37:34', '2025-02-16 12:31:57'),
(30, 'PESSOAS JURÍDICAS OU COLETIVOS/GRUPOS COMPOSTOS MAJORITARIAMENTE POR PESSOAS NEGRAS OU INDÍGENAS', 3, 1, 1, '2025-02-16 11:37:42', '2025-02-16 11:37:42'),
(31, 'PESSOAS JURÍDICAS COMPOSTAS MAJORITARIAMENTE POR MULHERES', 2, 1, 1, '2025-02-16 11:37:59', '2025-02-16 11:37:59'),
(32, 'PESSOAS JURÍDICAS COMPOSTAS MAJORITARIAMENTE POR MULHERES', 3, 1, 1, '2025-02-16 11:38:05', '2025-02-16 11:38:05'),
(33, 'PESSOAS JURÍDICAS SEDIADAS EM REGIÕES DE MENOR IDH OU COLETIVOS/GRUPOS PERTENCENTES A REGIÕES DE MENOR IDH', 2, 1, 1, '2025-02-16 11:38:22', '2025-02-16 11:38:22'),
(34, 'PESSOAS JURÍDICAS SEDIADAS EM REGIÕES DE MENOR IDH OU COLETIVOS/GRUPOS PERTENCENTES A REGIÕES DE MENOR IDH', 3, 1, 1, '2025-02-16 11:38:28', '2025-02-16 11:38:28'),
(35, 'PESSOAS JURÍDICAS OU COLETIVOS/GRUPOS COMPOSTOS MAJORITARIAMENTE POR PESSOAS LGBTQIAPN+', 2, 1, 1, '2025-02-16 11:39:23', '2025-02-16 11:39:23'),
(36, 'PESSOAS JURÍDICAS OU COLETIVOS/GRUPOS COMPOSTOS MAJORITARIAMENTE POR PESSOAS LGBTQIAPN+', 3, 1, 1, '2025-02-16 11:39:29', '2025-02-16 11:39:29'),
(37, 'PORTFÓLIO CULTURAL', 1, 1, 1, '2025-02-16 11:43:40', '2025-02-16 11:43:40'),
(38, 'PORTFÓLIO CULTURAL', 2, 1, 1, '2025-02-16 11:43:47', '2025-02-16 11:43:47'),
(39, 'PORTFÓLIO CULTURAL', 3, 1, 1, '2025-02-16 11:43:56', '2025-02-16 11:43:56'),
(40, 'FORMULÁRIO DE INSCRIÇÃO', 1, 1, 1, '2025-02-16 11:45:08', '2025-02-16 11:45:08'),
(41, 'FORMULÁRIO DE INSCRIÇÃO', 2, 1, 1, '2025-02-16 11:45:16', '2025-02-16 11:45:16'),
(42, 'FORMULÁRIO DE INSCRIÇÃO', 3, 1, 1, '2025-02-16 11:45:32', '2025-02-16 11:45:32');

-- --------------------------------------------------------

--
-- Estrutura para tabela `edital_people_type`
--

CREATE TABLE `edital_people_type` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `edital_id` bigint(20) UNSIGNED NOT NULL,
  `people_type_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `edital_people_type`
--

INSERT INTO `edital_people_type` (`id`, `edital_id`, `people_type_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 1),
(5, 2, 2),
(6, 2, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `edital_people_types`
--

CREATE TABLE `edital_people_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `sigla` varchar(50) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `edital_people_types`
--

INSERT INTO `edital_people_types` (`id`, `name`, `sigla`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'PESSOA FÍSICA', 'PF', 1, '2025-01-26 12:44:36', '2025-01-26 12:44:36'),
(2, 'PESSOA JURÍDICA', 'PJ', 1, '2024-12-20 23:18:22', '2024-12-20 23:18:22'),
(3, 'COLETIVO', 'COLETIVO', 1, '2024-12-20 23:24:43', '2024-12-20 23:24:43');

-- --------------------------------------------------------

--
-- Estrutura para tabela `edital_project_identification`
--

CREATE TABLE `edital_project_identification` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `edital_id` bigint(20) UNSIGNED NOT NULL,
  `field_project_identification_id` bigint(20) UNSIGNED NOT NULL,
  `is_required` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `edital_project_identification`
--

INSERT INTO `edital_project_identification` (`id`, `edital_id`, `field_project_identification_id`, `is_required`) VALUES
(27, 1, 1, 1),
(28, 1, 2, 1),
(29, 1, 3, 1),
(30, 1, 4, 1),
(31, 1, 5, 1),
(32, 1, 6, 1),
(33, 1, 7, 1),
(34, 1, 8, 1),
(35, 1, 9, 1),
(36, 1, 10, 1),
(37, 1, 13, 1),
(38, 1, 11, 0),
(39, 1, 12, 0),
(66, 2, 1, 1),
(67, 2, 2, 1),
(68, 2, 3, 0),
(69, 2, 4, 0),
(70, 2, 5, 0),
(71, 2, 6, 0),
(72, 2, 7, 0),
(73, 2, 8, 0),
(74, 2, 9, 0),
(75, 2, 10, 0),
(76, 2, 11, 0),
(77, 2, 12, 0),
(78, 2, 13, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `edital_project_identifications`
--

CREATE TABLE `edital_project_identifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `edital_project_identifications`
--

INSERT INTO `edital_project_identifications` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Categoria do projeto', 1, '2024-12-24 01:36:05', '2024-12-24 01:36:05'),
(2, 'Nome do projeto', 1, '2024-12-24 01:36:37', '2024-12-24 01:36:37'),
(3, 'Valor do projeto', 1, '2024-12-24 01:36:50', '2024-12-24 01:36:50'),
(4, 'Resumo da proposta', 1, '2024-12-24 01:37:03', '2024-12-24 01:37:03'),
(5, 'Descrição da proposta', 1, '2024-12-24 01:37:18', '2024-12-24 01:37:18'),
(6, 'Objetivos e metas', 1, '2024-12-24 01:37:37', '2024-12-24 01:37:37'),
(7, 'Justificativa', 1, '2024-12-24 01:37:53', '2024-12-24 01:37:53'),
(8, 'Público-alvo', 1, '2024-12-24 01:38:13', '2024-12-24 01:38:13'),
(9, 'Cronograma de execução', 1, '2024-12-24 01:38:26', '2024-12-24 01:38:26'),
(10, 'Medidas de acessibilidade', 1, '2024-12-24 01:38:42', '2024-12-24 01:38:42'),
(11, 'Plano de divulgação', 1, '2024-12-24 01:39:00', '2024-12-24 01:39:00'),
(12, 'Contrapartida social', 1, '2024-12-24 01:39:23', '2024-12-24 01:39:23'),
(13, 'Locais previstos para realização da ação cultural', 1, '2024-12-24 01:39:45', '2024-12-24 01:39:45');

-- --------------------------------------------------------

--
-- Estrutura para tabela `edital_quota`
--

CREATE TABLE `edital_quota` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `edital_id` bigint(20) UNSIGNED NOT NULL,
  `quota_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `edital_quota`
--

INSERT INTO `edital_quota` (`id`, `edital_id`, `quota_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 1),
(5, 2, 2),
(6, 2, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `edital_quotas`
--

CREATE TABLE `edital_quotas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `edital_quotas`
--

INSERT INTO `edital_quotas` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Pessoa Negra', 1, '2025-01-26 12:47:06', '2025-01-26 12:47:06'),
(2, 'Pessoa Indígena', 1, '2025-01-26 12:47:06', '2025-01-26 12:47:06'),
(3, 'PCD', 1, '2025-01-26 12:47:06', '2025-01-26 12:47:06'),
(4, 'Nenhum', 1, '2024-12-20 22:33:51', '2024-12-20 22:33:51');

-- --------------------------------------------------------

--
-- Estrutura para tabela `identification_project_justification_id`
--

CREATE TABLE `identification_project_justification_id` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `motive` text DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `analyzed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `type_id` tinyint(3) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `from_user_id` bigint(20) UNSIGNED NOT NULL,
  `to_customer_id` bigint(20) UNSIGNED NOT NULL,
  `readed_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `notifications`
--

INSERT INTO `notifications` (`id`, `title`, `type_id`, `project_id`, `from_user_id`, `to_customer_id`, `readed_at`, `created_at`, `updated_at`) VALUES
(1, '<strong>Parabéns!</strong> Seus dados pessoais foram analisados e <strong>aprovados</strong> pelo Analista ALCIONE MORAIS DA SILVA em 16/02/2025 13:02', 1, 2, 2, 2, NULL, '2025-02-16 13:02:07', '2025-02-16 13:02:07'),
(2, '<strong>Parabéns!</strong> A inscrição do seu projeto foi analisada e <strong>aprovada</strong> pelo Analista ALCIONE MORAIS DA SILVA em 16/02/2025 13:02', 1, 2, 2, 2, NULL, '2025-02-16 13:02:23', '2025-02-16 13:02:23'),
(3, '', 3, 2, 2, 2, NULL, '2025-02-16 13:03:55', '2025-02-16 13:03:55'),
(4, '<strong>Parabéns!</strong> A inscrição do seu projeto foi analisada e <strong>aprovada</strong> pelo Analista ALCIONE MORAIS DA SILVA em 16/02/2025 13:04', 1, 2, 2, 2, NULL, '2025-02-16 13:04:04', '2025-02-16 13:04:04'),
(5, '<strong>Parabéns!</strong> Os dados do documento PRODUÇÕES CULTURAIS RECENTES  2022 A 2024 do seu projeto foram analisados e <strong>aprovados</strong> pelo Analista ALCIONE MORAIS DA SILVA em 16/02/2025 13:05', 1, 2, 2, 2, NULL, '2025-02-16 13:05:32', '2025-02-16 13:05:32'),
(6, '<strong>Parabéns!</strong> Os dados do documento PARTICIPAÇÃO EM EVENTOS MUNICIPAIS do seu projeto foram analisados e <strong>aprovados</strong> pelo Analista ALCIONE MORAIS DA SILVA em 16/02/2025 13:06', 1, 2, 2, 2, NULL, '2025-02-16 13:06:38', '2025-02-16 13:06:38'),
(7, '<strong>Parabéns!</strong> O(s) arquivo(s) foram analisados e <strong>aprovados</strong> pelo Analista ALCIONE MORAIS DA SILVA em 16/02/2025 13:06', 1, 2, 2, 2, NULL, '2025-02-16 13:06:52', '2025-02-16 13:06:52'),
(8, '<strong>Parabéns!</strong> os links complemenares foram analisados e <strong>aprovados</strong> pelo Analista ALCIONE MORAIS DA SILVA em 16/02/2025 13:07', 1, 2, 2, 2, NULL, '2025-02-16 13:07:07', '2025-02-16 13:07:07'),
(9, '<strong>Parabéns!</strong> Os dados do documento FORMULÁRIO DE INSCRIÇÃO do seu projeto foram analisados e <strong>aprovados</strong> pelo Analista ALCIONE MORAIS DA SILVA em 16/02/2025 13:07', 1, 2, 2, 2, NULL, '2025-02-16 13:07:54', '2025-02-16 13:07:54'),
(10, '<strong>Parabéns!</strong> Os dados do documento PORTFÓLIO CULTURAL do seu projeto foram analisados e <strong>aprovados</strong> pelo Analista ALCIONE MORAIS DA SILVA em 16/02/2025 13:07', 1, 2, 2, 2, NULL, '2025-02-16 13:07:59', '2025-02-16 13:07:59'),
(11, '<strong>Parabéns!</strong> Os dados do documento PARTICIPAÇÃO EM EVENTOS REGIONAIS do seu projeto foram analisados e <strong>aprovados</strong> pelo Analista ALCIONE MORAIS DA SILVA em 16/02/2025 13:08', 1, 2, 2, 2, NULL, '2025-02-16 13:08:05', '2025-02-16 13:08:05'),
(12, '', 1, 1, 1, 1, NULL, '2025-02-16 13:11:32', '2025-02-16 13:11:32'),
(13, '<strong>Parabéns!</strong> Os dados do nome da inscrição do seu projeto foram analisados e <strong>aprovados</strong> pelo Analista DEVCACTUS TECNOLOGIA em 16/02/2025 13:11', 1, 1, 1, 1, NULL, '2025-02-16 13:11:40', '2025-02-16 13:11:40'),
(14, '<strong>Parabéns!</strong> Os dados do valor do seu projeto foram analisados e <strong>aprovados</strong> pelo Analista DEVCACTUS TECNOLOGIA em 16/02/2025 13:11', 1, 1, 1, 1, NULL, '2025-02-16 13:11:45', '2025-02-16 13:11:45'),
(15, '<strong>Reanálise!</strong> Os dados do documento AGENTES CULTURAIS  LGBTQIAPN+ foram para <strong>reanálise</strong> pelo Analista DEVCACTUS TECNOLOGIA na data 16/02/2025 13:18, motivo: Enviar documentação correta', 3, 2, 1, 2, NULL, '2025-02-16 13:18:15', '2025-02-16 13:18:15'),
(16, '<strong>Não foi dessa vez!</strong> Os dados do documento AGENTES CULTURAIS COM DEFICIÊNCIA para realização de seu projeto foram analisados e <strong>reprovados</strong> pelo Analista DEVCACTUS TECNOLOGIA na data 16/02/2025 13:18, motivo: Documento incorreto', 2, 2, 1, 2, NULL, '2025-02-16 13:18:45', '2025-02-16 13:18:45');

-- --------------------------------------------------------

--
-- Estrutura para tabela `notification_professionals`
--

CREATE TABLE `notification_professionals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `from_customer_id` bigint(20) UNSIGNED NOT NULL,
  `to_professional_id` bigint(20) UNSIGNED NOT NULL,
  `tenant_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `readed_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `content` mediumtext NOT NULL,
  `image` varchar(191) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `registered_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `content`, `image`, `status`, `registered_at`, `created_at`, `updated_at`) VALUES
(1, 'Nova postagem editado', 'nova-postagem-editado', '<div>Novn conteudo agora</div>', 'posts/2024/ona7VbJXGYONChV1ce6E4yRf18T1fujf.jpg', 1, '2024-08-08 20:45:00', '2024-08-08 21:07:09', '2024-08-10 16:35:28'),
(2, 'Aqui via a nova', 'aqui-via-a-nova', '', '', 1, '2024-08-08 21:17:00', '2024-08-08 21:17:15', '2024-08-08 21:17:15'),
(3, 'Aqui vai o titulo novo ed', 'aqui-vai-o-titulo-novo-ed', '<div>Aqui vai o novo título<br><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image/jpeg&quot;,&quot;filename&quot;:&quot;avatar01.JPG&quot;,&quot;filesize&quot;:13162,&quot;height&quot;:333,&quot;href&quot;:&quot;posts/2024/1u1Z9B8ChR743eUtYa8NC3a5IieEHRqW.jpg?content-disposition=attachment&quot;,&quot;url&quot;:&quot;posts/2024/1u1Z9B8ChR743eUtYa8NC3a5IieEHRqW.jpg&quot;,&quot;width&quot;:331}\" data-trix-content-type=\"image/jpeg\" data-trix-attributes=\"{&quot;presentation&quot;:&quot;gallery&quot;}\" class=\"attachment attachment--preview attachment--jpg\"><a href=\"posts/2024/1u1Z9B8ChR743eUtYa8NC3a5IieEHRqW.jpg?content-disposition=attachment\"><img src=\"posts/2024/1u1Z9B8ChR743eUtYa8NC3a5IieEHRqW.jpg\" width=\"331\" height=\"333\"><figcaption class=\"attachment__caption\"><span class=\"attachment__name\">avatar01.JPG</span> <span class=\"attachment__size\">12.85 KB</span></figcaption></a></figure>asdasda<br>novo conteudo vai aqui</div>', 'posts/2024/FXVkKWwWah8KbN4mytgeI6ujUQWc6Glj.jpg', 1, '2024-08-08 21:20:00', '2024-08-08 21:21:40', '2024-08-10 16:39:20'),
(4, 'teste', 'teste', '<div>as<br><figure data-trix-attachment=\"{&quot;contentType&quot;:&quot;image/jpeg&quot;,&quot;filename&quot;:&quot;paulo gustavo.JPG&quot;,&quot;filesize&quot;:16757,&quot;height&quot;:253,&quot;href&quot;:&quot;http://cultura/storage/posts/2024/SPMFd7r49AjpGtFBGMacCkrXOksAjbiR.jpg?content-disposition=attachment&quot;,&quot;url&quot;:&quot;http://cultura/storage/posts/2024/SPMFd7r49AjpGtFBGMacCkrXOksAjbiR.jpg&quot;,&quot;width&quot;:251}\" data-trix-content-type=\"image/jpeg\" data-trix-attributes=\"{&quot;presentation&quot;:&quot;gallery&quot;}\" class=\"attachment attachment--preview attachment--jpg\"><a href=\"http://cultura/storage/posts/2024/SPMFd7r49AjpGtFBGMacCkrXOksAjbiR.jpg?content-disposition=attachment\"><img src=\"http://cultura/storage/posts/2024/SPMFd7r49AjpGtFBGMacCkrXOksAjbiR.jpg\" width=\"251\" height=\"253\"><figcaption class=\"attachment__caption\"><span class=\"attachment__name\">paulo gustavo.JPG</span> <span class=\"attachment__size\">16.36 KB</span></figcaption></a></figure></div>', '', 1, '2024-08-12 19:32:00', '2024-08-12 19:33:11', '2024-08-12 19:33:11');

-- --------------------------------------------------------

--
-- Estrutura para tabela `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `edital_id` bigint(20) UNSIGNED DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `inscription_has_quota` tinyint(1) DEFAULT NULL,
  `inscription_quota_id` bigint(20) UNSIGNED DEFAULT NULL,
  `inscription_profile_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `inscription_profile_priority_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `inscription_profile_priority_other` varchar(191) DEFAULT NULL,
  `inscription_accessibility_other` varchar(191) DEFAULT NULL,
  `inscription_accessibility_arquitetonic_other` varchar(191) DEFAULT NULL,
  `inscription_accessibility_communicational_other` varchar(191) DEFAULT NULL,
  `inscription_accessibility_atitudinal_other` varchar(191) DEFAULT NULL,
  `inscription_accessibility_description` varchar(191) DEFAULT NULL,
  `inscription_local_execution` varchar(100) DEFAULT NULL,
  `inscription_local_execution_started_at` date DEFAULT NULL,
  `inscription_local_execution_finished_at` date DEFAULT NULL,
  `inscription_strategy_description` varchar(191) DEFAULT NULL,
  `trajectory_main_actions` varchar(191) DEFAULT NULL,
  `trajectory_initial` varchar(191) DEFAULT NULL,
  `trajectory_other_actions` varchar(191) DEFAULT NULL,
  `identification_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `identification_category_status_id` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `identification_name` varchar(191) DEFAULT NULL,
  `identification_name_status_id` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `identification_price` double UNSIGNED DEFAULT NULL,
  `identification_price_status_id` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `identification_resume` text DEFAULT NULL,
  `identification_resume_status_id` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `identification_description` text DEFAULT NULL,
  `identification_description_status_id` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `identification_objective` text DEFAULT NULL,
  `identification_objective_status_id` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `identification_justification` text DEFAULT NULL,
  `identification_justification_status_id` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `identification_target` text DEFAULT NULL,
  `identification_target_status_id` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `identification_cronogram` text DEFAULT NULL,
  `identification_cronogram_status_id` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `identification_accessibility` text DEFAULT NULL,
  `identification_accessibility_status_id` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `identification_plan` text DEFAULT NULL,
  `identification_plan_status_id` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `identification_contrapartid_social` text DEFAULT NULL,
  `identification_contrapartid_social_status_id` tinyint(3) UNSIGNED DEFAULT 0,
  `identification_local` text DEFAULT NULL,
  `identification_local_status_id` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `identification_proponent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `inscription_project_id` bigint(20) UNSIGNED DEFAULT NULL,
  `note` smallint(5) UNSIGNED DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `subscribe_status` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `is_selected` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `is_enabled` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `is_substitute` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `agent_type_id` bigint(20) UNSIGNED NOT NULL,
  `motive` text DEFAULT NULL,
  `tenant_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `sended_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `projects`
--

INSERT INTO `projects` (`id`, `edital_id`, `customer_id`, `inscription_has_quota`, `inscription_quota_id`, `inscription_profile_id`, `inscription_profile_priority_id`, `inscription_profile_priority_other`, `inscription_accessibility_other`, `inscription_accessibility_arquitetonic_other`, `inscription_accessibility_communicational_other`, `inscription_accessibility_atitudinal_other`, `inscription_accessibility_description`, `inscription_local_execution`, `inscription_local_execution_started_at`, `inscription_local_execution_finished_at`, `inscription_strategy_description`, `trajectory_main_actions`, `trajectory_initial`, `trajectory_other_actions`, `identification_category_id`, `identification_category_status_id`, `identification_name`, `identification_name_status_id`, `identification_price`, `identification_price_status_id`, `identification_resume`, `identification_resume_status_id`, `identification_description`, `identification_description_status_id`, `identification_objective`, `identification_objective_status_id`, `identification_justification`, `identification_justification_status_id`, `identification_target`, `identification_target_status_id`, `identification_cronogram`, `identification_cronogram_status_id`, `identification_accessibility`, `identification_accessibility_status_id`, `identification_plan`, `identification_plan_status_id`, `identification_contrapartid_social`, `identification_contrapartid_social_status_id`, `identification_local`, `identification_local_status_id`, `identification_proponent_id`, `inscription_project_id`, `note`, `status`, `subscribe_status`, `is_selected`, `is_enabled`, `is_substitute`, `agent_type_id`, `motive`, `tenant_id`, `created_at`, `sended_at`, `updated_at`) VALUES
(1, 1, 1, 0, NULL, 5, 13, NULL, NULL, NULL, NULL, NULL, NULL, 'AUDITÓRIO MUNICIPAL', '2025-03-01', '2025-03-01', NULL, NULL, NULL, NULL, 3, 3, 'EXBIÇÃO DE ARTE VISUAL', 3, 8000, 3, '<p>Resumo teste do projeto</p>', 3, '<p>Descrição teste da proposta</p>', 3, '<p>Teste de objetivos e metas</p>', 3, '<p>Justificativa teste</p>', 3, '<p>Teste de público-alvo</p>', 3, '<p>Teste de crononograma de execução</p>', 3, '<p>Médidas testes</p>', 3, '<p>Plano teste de divulgação</p>', 3, '<p>Contrapartida social</p>', 3, '<p>Locais previstos testes.</p>', 3, NULL, NULL, NULL, 0, 1, 0, 0, 0, 1, NULL, 1, '2025-02-16 12:45:16', '2025-02-16 12:57:34', '2025-02-16 12:57:34'),
(2, 1, 2, 0, NULL, 5, 14, 'todos os publicos', NULL, NULL, NULL, NULL, NULL, 'BREJO DO CRUZ', '2025-03-30', '2025-03-31', NULL, NULL, NULL, NULL, 1, 3, 'SERTÃO MUSICAL', 3, 5000, 3, '<p>realizar &nbsp;duas apresentações</p>', 3, '<p>projeto sim</p>', 3, '<p>sertão</p>', 3, '<p>sim</p>', 3, '<p>18</p>', 3, '<p>30 31 de março de 2025</p>', 3, '<p>local</p>', 3, '<p>rede</p>', 3, '<p>apresentação</p>', 3, '<p>Brejo do Cruz</p>', 3, NULL, NULL, 10, 4, 1, 1, 1, 0, 1, NULL, 1, '2025-02-16 12:45:48', '2025-02-16 12:54:11', '2025-02-16 15:19:32'),
(3, 1, 3, 0, NULL, 5, 13, NULL, NULL, NULL, NULL, NULL, NULL, 'BREJO DO CRUZ', '2025-02-25', '2025-02-26', NULL, NULL, NULL, NULL, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, 0, NULL, NULL, NULL, 0, 0, 0, 0, 0, 5, NULL, 1, '2025-02-16 17:21:19', NULL, '2025-02-16 17:21:19');

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_accessibilities`
--

CREATE TABLE `project_accessibilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `project_accessibilities`
--

INSERT INTO `project_accessibilities` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Intérprete de libras', 1, '2025-01-21 01:32:39', '2025-01-21 01:32:39'),
(2, 'Audiodescrição', 1, '2025-01-26 13:13:51', '2025-01-26 13:13:51'),
(99, 'Outras', 1, '2024-12-23 00:09:23', '2024-12-23 00:09:23');

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_accessibility_arquitetonics`
--

CREATE TABLE `project_accessibility_arquitetonics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `project_accessibility_arquitetonics`
--

INSERT INTO `project_accessibility_arquitetonics` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Rotas acessíveis, com espaço de manobra para cadeira de rodas', 1, '2024-12-23 00:50:35', '2024-12-23 00:50:35'),
(2, 'Piso tátil', 1, '2025-01-26 19:28:50', '2025-01-26 19:28:50'),
(4, 'Elevadores adequados para pessoas com deficiência', 1, '2024-12-23 00:50:35', '2024-12-23 00:50:35'),
(5, 'Corrimãos e guarda-corpos', 1, '2025-01-26 19:29:26', '2025-01-26 19:29:26'),
(6, 'Banheiros femininos e masculinos adaptados para pessoas com deficiência', 1, '2024-12-23 00:50:35', '2024-12-23 00:50:35'),
(7, 'Vagas de estacionamento para pessoas com deficiência', 1, '2024-12-23 00:50:35', '2024-12-23 00:50:35'),
(8, 'Assentos para pessoas obesas', 1, '2024-12-23 00:50:35', '2024-12-23 00:50:35'),
(9, 'Iluminação adequada', 1, '2024-12-23 00:50:35', '2024-12-23 00:50:35'),
(99, 'Outra', 1, '2024-12-23 00:50:35', '2024-12-23 00:50:35');

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_accessibility_atitudinals`
--

CREATE TABLE `project_accessibility_atitudinals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `project_accessibility_atitudinals`
--

INSERT INTO `project_accessibility_atitudinals` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Capacitação de equipes atuantes nos projetos culturais', 1, '2024-12-23 00:59:06', '2024-12-23 00:59:06'),
(2, 'Contratação de profissionais com deficiência e profissionais especializados em acessibilidade cultural', 1, '2025-01-26 19:30:49', '2025-01-26 19:30:49'),
(99, 'Outras medidas que visem a eliminação de atitudes capacitistas', 1, '2024-12-23 00:59:06', '2024-12-23 00:59:06');

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_accessibility_communicationals`
--

CREATE TABLE `project_accessibility_communicationals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `project_accessibility_communicationals`
--

INSERT INTO `project_accessibility_communicationals` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'A Língua Brasileira de Sinais - Libras', 1, '2024-12-23 00:55:41', '2024-12-23 00:55:41'),
(2, 'O sistema Braille', 1, '2025-01-26 19:31:38', '2025-01-26 19:31:38'),
(3, 'O sistema de sinalização ou comunicação tátil', 1, '2024-12-23 00:55:41', '2024-12-23 00:55:41'),
(4, 'A audiodescrição', 1, '2024-12-23 00:55:41', '2024-12-23 00:55:41'),
(6, 'A linguagem simples', 1, '2024-12-23 00:55:41', '2024-12-23 00:55:41'),
(7, 'Textos adaptados para leitores de tela', 1, '2024-12-23 00:55:41', '2024-12-23 00:55:41'),
(99, 'Outra', 1, '2024-12-23 00:55:41', '2024-12-23 00:55:41');

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_analyze_document_timelines`
--

CREATE TABLE `project_analyze_document_timelines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `document_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED DEFAULT NULL,
  `motive` text DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `analyzed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `project_analyze_document_timelines`
--

INSERT INTO `project_analyze_document_timelines` (`id`, `document_id`, `status`, `motive`, `customer_id`, `analyzed_by`, `expired_at`, `created_at`, `updated_at`) VALUES
(1, 28, 1, NULL, 2, NULL, NULL, '2025-02-16 12:49:13', '2025-02-16 12:49:13'),
(2, 15, 1, NULL, 2, NULL, NULL, '2025-02-16 12:49:31', '2025-02-16 12:49:31'),
(3, 16, 1, NULL, 2, NULL, NULL, '2025-02-16 12:50:36', '2025-02-16 12:50:36'),
(4, 17, 1, NULL, 2, NULL, NULL, '2025-02-16 12:50:51', '2025-02-16 12:50:51'),
(5, 18, 1, NULL, 2, NULL, NULL, '2025-02-16 12:51:12', '2025-02-16 12:51:12'),
(6, 19, 1, NULL, 2, NULL, NULL, '2025-02-16 12:51:45', '2025-02-16 12:51:45'),
(7, 1, 1, NULL, 1, NULL, NULL, '2025-02-16 12:51:54', '2025-02-16 12:51:54'),
(8, 20, 1, NULL, 2, NULL, NULL, '2025-02-16 12:52:03', '2025-02-16 12:52:03'),
(9, 21, 1, NULL, 2, NULL, NULL, '2025-02-16 12:52:15', '2025-02-16 12:52:15'),
(10, 2, 1, NULL, 1, NULL, NULL, '2025-02-16 12:52:16', '2025-02-16 12:52:16'),
(11, 3, 1, NULL, 1, NULL, NULL, '2025-02-16 12:52:23', '2025-02-16 12:52:23'),
(12, 22, 1, NULL, 2, NULL, NULL, '2025-02-16 12:52:27', '2025-02-16 12:52:27'),
(13, 22, 2, NULL, 2, NULL, NULL, '2025-02-16 12:52:31', '2025-02-16 12:52:31'),
(14, 23, 1, NULL, 2, NULL, NULL, '2025-02-16 12:52:44', '2025-02-16 12:52:44'),
(15, 24, 1, NULL, 2, NULL, NULL, '2025-02-16 12:53:00', '2025-02-16 12:53:00'),
(16, 25, 1, NULL, 2, NULL, NULL, '2025-02-16 12:53:17', '2025-02-16 12:53:17'),
(17, 26, 1, NULL, 2, NULL, NULL, '2025-02-16 12:53:27', '2025-02-16 12:53:27'),
(18, 27, 1, NULL, 2, NULL, NULL, '2025-02-16 12:53:41', '2025-02-16 12:53:41'),
(19, 4, 1, NULL, 1, NULL, NULL, '2025-02-16 12:54:00', '2025-02-16 12:54:00'),
(20, 5, 1, NULL, 1, NULL, NULL, '2025-02-16 12:54:53', '2025-02-16 12:54:53'),
(21, 6, 1, NULL, 1, NULL, NULL, '2025-02-16 12:54:59', '2025-02-16 12:54:59'),
(22, 7, 1, NULL, 1, NULL, NULL, '2025-02-16 12:55:05', '2025-02-16 12:55:05'),
(23, 8, 1, NULL, 1, NULL, NULL, '2025-02-16 12:55:13', '2025-02-16 12:55:13'),
(24, 9, 1, NULL, 1, NULL, NULL, '2025-02-16 12:55:20', '2025-02-16 12:55:20'),
(25, 10, 1, NULL, 1, NULL, NULL, '2025-02-16 12:55:26', '2025-02-16 12:55:26'),
(26, 11, 1, NULL, 1, NULL, NULL, '2025-02-16 12:55:34', '2025-02-16 12:55:34'),
(27, 12, 1, NULL, 1, NULL, NULL, '2025-02-16 12:55:40', '2025-02-16 12:55:40'),
(28, 13, 1, NULL, 1, NULL, NULL, '2025-02-16 12:55:46', '2025-02-16 12:55:46'),
(29, 14, 1, NULL, 1, NULL, NULL, '2025-02-16 12:55:53', '2025-02-16 12:55:53'),
(30, 19, 3, NULL, NULL, 2, NULL, '2025-02-16 13:05:32', '2025-02-16 13:05:32'),
(31, 20, 3, NULL, NULL, 2, NULL, '2025-02-16 13:06:38', '2025-02-16 13:06:38'),
(32, 28, 3, NULL, NULL, 2, NULL, '2025-02-16 13:07:54', '2025-02-16 13:07:54'),
(33, 27, 3, NULL, NULL, 2, NULL, '2025-02-16 13:07:59', '2025-02-16 13:07:59'),
(34, 21, 3, NULL, NULL, 2, NULL, '2025-02-16 13:08:05', '2025-02-16 13:08:05'),
(35, 26, 5, 'Enviar documentação correta', NULL, 1, '2025-02-20 14:18:00', '2025-02-16 13:18:15', '2025-02-16 13:18:15'),
(36, 25, 4, 'Documento incorreto', NULL, 1, NULL, '2025-02-16 13:18:45', '2025-02-16 13:18:45');

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_analyze_status_complements`
--

CREATE TABLE `project_analyze_status_complements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `motive` text DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `analyzed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `project_analyze_status_complements`
--

INSERT INTO `project_analyze_status_complements` (`id`, `project_id`, `status`, `motive`, `customer_id`, `analyzed_by`, `expired_at`, `created_at`, `updated_at`) VALUES
(1, 2, 1, NULL, 2, 2, NULL, '2025-02-16 12:54:11', '2025-02-16 13:07:07'),
(2, 1, 0, NULL, 1, NULL, NULL, '2025-02-16 12:57:34', '2025-02-16 12:57:34');

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_analyze_status_complement_timelines`
--

CREATE TABLE `project_analyze_status_complement_timelines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `analyze_status_complement_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `motive` text DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `analyzed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `project_analyze_status_complement_timelines`
--

INSERT INTO `project_analyze_status_complement_timelines` (`id`, `analyze_status_complement_id`, `status`, `motive`, `customer_id`, `analyzed_by`, `expired_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 2, NULL, NULL, '2025-02-16 12:54:11', '2025-02-16 12:54:11'),
(2, 2, 1, NULL, 1, NULL, NULL, '2025-02-16 12:57:34', '2025-02-16 12:57:34'),
(3, 1, 3, NULL, NULL, 2, NULL, '2025-02-16 13:07:07', '2025-02-16 13:07:07');

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_analyze_status_documents`
--

CREATE TABLE `project_analyze_status_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `motive` text DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `analyzed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `project_analyze_status_documents`
--

INSERT INTO `project_analyze_status_documents` (`id`, `project_id`, `status`, `motive`, `customer_id`, `analyzed_by`, `expired_at`, `created_at`, `updated_at`) VALUES
(1, 2, 1, NULL, 2, 2, NULL, '2025-02-16 12:53:45', '2025-02-16 13:06:52'),
(2, 1, 0, NULL, 1, NULL, NULL, '2025-02-16 12:54:12', '2025-02-16 12:54:12');

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_analyze_status_document_timelines`
--

CREATE TABLE `project_analyze_status_document_timelines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `analyze_status_document_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `motive` text DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `analyzed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `project_analyze_status_document_timelines`
--

INSERT INTO `project_analyze_status_document_timelines` (`id`, `analyze_status_document_id`, `status`, `motive`, `customer_id`, `analyzed_by`, `expired_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 2, NULL, NULL, '2025-02-16 12:53:45', '2025-02-16 12:53:45'),
(2, 2, 1, NULL, 1, NULL, NULL, '2025-02-16 12:54:12', '2025-02-16 12:54:12'),
(3, 1, 3, NULL, NULL, 2, NULL, '2025-02-16 13:06:52', '2025-02-16 13:06:52');

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_categories`
--

CREATE TABLE `project_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `project_categories`
--

INSERT INTO `project_categories` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Música', 1, '2024-12-24 21:38:39', '2024-12-24 21:38:39'),
(2, 'Dança', 1, '2024-12-24 21:38:57', '2024-12-24 21:38:57'),
(3, 'Arte', 1, '2024-12-24 21:39:09', '2024-12-24 21:39:09'),
(4, 'Artesanato', 1, '2024-12-24 21:39:19', '2024-12-24 21:39:19');

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_diligences`
--

CREATE TABLE `project_diligences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `motive` varchar(191) DEFAULT NULL,
  `analyzed_by` bigint(20) UNSIGNED NOT NULL,
  `expired_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_diligence_messages`
--

CREATE TABLE `project_diligence_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `diligence_id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `analyst_id` bigint(20) UNSIGNED DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sender_id` tinyint(3) UNSIGNED NOT NULL,
  `registered_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_diligence_message_documents`
--

CREATE TABLE `project_diligence_message_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `path` varchar(191) NOT NULL,
  `diligence_message_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_documents`
--

CREATE TABLE `project_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `document_id` tinyint(3) UNSIGNED NOT NULL,
  `path` varchar(191) DEFAULT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `motive` text DEFAULT NULL,
  `analyzed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `is_required` tinyint(1) NOT NULL DEFAULT 1,
  `expired_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `project_documents`
--

INSERT INTO `project_documents` (`id`, `project_id`, `document_id`, `path`, `status`, `motive`, `analyzed_by`, `is_required`, `expired_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'tenants/1/2025/projects/1/SUZ6yVjJYRWokZnGviRCVEEoeBMQL4gm.pdf', 3, NULL, NULL, 1, NULL, '2025-02-16 12:45:16', '2025-02-16 12:51:54'),
(2, 1, 2, 'tenants/1/2025/projects/1/JH0lNOCTce7icP9eXLeTAjZbkcTtF0cn.pdf', 3, NULL, NULL, 1, NULL, '2025-02-16 12:45:16', '2025-02-16 12:52:16'),
(3, 1, 8, 'tenants/1/2025/projects/1/VCfpKP2qlQBiAskgwCgXdPTPLewFV1oj.pdf', 3, NULL, NULL, 1, NULL, '2025-02-16 12:45:16', '2025-02-16 12:52:23'),
(4, 1, 10, 'tenants/1/2025/projects/1/NxPFq2ZfisM983kvKxKfdVCWcx14OjrF.pdf', 3, NULL, NULL, 1, NULL, '2025-02-16 12:45:16', '2025-02-16 12:54:00'),
(5, 1, 13, 'tenants/1/2025/projects/1/CFT3oWwkxk5yme046dV1CM7gPy2L5cc9.pdf', 3, NULL, NULL, 1, NULL, '2025-02-16 12:45:16', '2025-02-16 12:54:53'),
(6, 1, 16, 'tenants/1/2025/projects/1/emjWdTda7qufAu1d0CHBfMdj2SxrUlNk.pdf', 3, NULL, NULL, 1, NULL, '2025-02-16 12:45:16', '2025-02-16 12:54:59'),
(7, 1, 19, 'tenants/1/2025/projects/1/iWzF6s680TrOC7D75iLAbYnHZcSQ7lYJ.pdf', 3, NULL, NULL, 1, NULL, '2025-02-16 12:45:16', '2025-02-16 12:55:05'),
(8, 1, 22, 'tenants/1/2025/projects/1/Q8lChc1z9kTSfh9NHg1TADsCm4k1xynY.pdf', 3, NULL, NULL, 1, NULL, '2025-02-16 12:45:16', '2025-02-16 12:55:13'),
(9, 1, 25, 'tenants/1/2025/projects/1/zGw2vjZ2NjnR3Xgihl76ZvpIycNwFHJO.pdf', 3, NULL, NULL, 1, NULL, '2025-02-16 12:45:16', '2025-02-16 12:55:20'),
(10, 1, 26, 'tenants/1/2025/projects/1/OHs8EW8LtBJzH9k0pss69h8sLijY7ouf.pdf', 3, NULL, NULL, 1, NULL, '2025-02-16 12:45:16', '2025-02-16 12:55:26'),
(11, 1, 27, 'tenants/1/2025/projects/1/VkpjBlK9x4oTDQ7dFpHzl56EqmLPwj3E.pdf', 3, NULL, NULL, 1, NULL, '2025-02-16 12:45:16', '2025-02-16 12:55:34'),
(12, 1, 28, 'tenants/1/2025/projects/1/iJLgjTHLwFgEhH6wXUDyBRUmPhAbHymS.pdf', 3, NULL, NULL, 1, NULL, '2025-02-16 12:45:16', '2025-02-16 12:55:40'),
(13, 1, 37, 'tenants/1/2025/projects/1/nuW1BZJLYOAWhsQw6BUdIfT3ylaY7L8j.pdf', 3, NULL, NULL, 1, NULL, '2025-02-16 12:45:16', '2025-02-16 12:55:46'),
(14, 1, 40, 'tenants/1/2025/projects/1/TqUGhfJ7MAZrXdinMTf17BKxO9hXJfnB.pdf', 3, NULL, NULL, 1, NULL, '2025-02-16 12:45:16', '2025-02-16 12:55:53'),
(15, 2, 1, 'tenants/1/2025/projects/2/hiGeQqF3EhvOErfx0C98XM89n9R25qts.pdf', 3, NULL, NULL, 1, NULL, '2025-02-16 12:45:48', '2025-02-16 12:49:31'),
(16, 2, 2, 'tenants/1/2025/projects/2/jJzHmbOjX5ru0LxAjUXnhLqnDhX57pP7.pdf', 3, NULL, NULL, 1, NULL, '2025-02-16 12:45:48', '2025-02-16 12:50:36'),
(17, 2, 8, 'tenants/1/2025/projects/2/5zV9ZyHDVyczYv7pnrmWtRKl0SiTrNRa.pdf', 3, NULL, NULL, 1, NULL, '2025-02-16 12:45:48', '2025-02-16 12:50:51'),
(18, 2, 10, 'tenants/1/2025/projects/2/FnqCNbtA3OpV2QMd2XLbmKVmWsx5vqGe.pdf', 3, NULL, NULL, 1, NULL, '2025-02-16 12:45:48', '2025-02-16 12:51:12'),
(19, 2, 13, 'tenants/1/2025/projects/2/NsHb30pSaZpNACfzQaPHqmBxCWWnaPL4.pdf', 1, NULL, 2, 1, NULL, '2025-02-16 12:45:48', '2025-02-16 13:05:32'),
(20, 2, 16, 'tenants/1/2025/projects/2/xY8fSUbN0z5ckcGHd8W65ndWmLjp7NB5.pdf', 1, NULL, 2, 1, NULL, '2025-02-16 12:45:48', '2025-02-16 13:06:38'),
(21, 2, 19, 'tenants/1/2025/projects/2/O7DuTAKaYOkbV6KIQUL7Qmlz7aK2VnEd.pdf', 1, NULL, 2, 1, NULL, '2025-02-16 12:45:48', '2025-02-16 13:08:05'),
(22, 2, 22, 'tenants/1/2025/projects/2/arJwMYnsXjctJnaqsO6nmDpOS4XDicbr.pdf', 3, NULL, NULL, 1, NULL, '2025-02-16 12:45:48', '2025-02-16 12:52:31'),
(23, 2, 25, 'tenants/1/2025/projects/2/7tSMIhyw1G5XrROE2V7cDXNh7h80z7yN.pdf', 3, NULL, NULL, 1, NULL, '2025-02-16 12:45:48', '2025-02-16 12:52:44'),
(24, 2, 26, 'tenants/1/2025/projects/2/gyDtpVKUdZ3Flh5fK7xmEVWRbsADmBJW.pdf', 3, NULL, NULL, 1, NULL, '2025-02-16 12:45:48', '2025-02-16 12:53:00'),
(25, 2, 27, 'tenants/1/2025/projects/2/bLEw6g7J0p2o1g6qiyXS4OeLIMsAjxr4.pdf', 2, 'Documento incorreto', 1, 1, NULL, '2025-02-16 12:45:48', '2025-02-16 13:18:45'),
(26, 2, 28, 'tenants/1/2025/projects/2/ouVDpaytdHHzN32tsJdykIZKvWP4GdAE.pdf', 4, 'Enviar documentação correta', 1, 1, '2025-02-20 14:18:00', '2025-02-16 12:45:48', '2025-02-16 13:18:15'),
(27, 2, 37, 'tenants/1/2025/projects/2/ZPCMZ1Ev4aDQsb8gRXHVEWRYvBR4Eixp.pdf', 1, NULL, 2, 1, NULL, '2025-02-16 12:45:48', '2025-02-16 13:07:59'),
(28, 2, 40, 'tenants/1/2025/projects/2/jZXshPQv4ZRwKT5sCqeqqPOKStAEowmm.pdf', 1, NULL, 2, 1, NULL, '2025-02-16 12:45:48', '2025-02-16 13:07:54'),
(29, 3, 4, NULL, 0, NULL, NULL, 1, NULL, '2025-02-16 17:21:19', NULL),
(30, 3, 7, NULL, 0, NULL, NULL, 1, NULL, '2025-02-16 17:21:19', NULL),
(31, 3, 11, NULL, 0, NULL, NULL, 1, NULL, '2025-02-16 17:21:19', NULL),
(32, 3, 14, NULL, 0, NULL, NULL, 1, NULL, '2025-02-16 17:21:19', NULL),
(33, 3, 17, NULL, 0, NULL, NULL, 1, NULL, '2025-02-16 17:21:19', NULL),
(34, 3, 20, NULL, 0, NULL, NULL, 1, NULL, '2025-02-16 17:21:19', NULL),
(35, 3, 23, NULL, 0, NULL, NULL, 1, NULL, '2025-02-16 17:21:19', NULL),
(36, 3, 29, NULL, 0, NULL, NULL, 1, NULL, '2025-02-16 17:21:19', NULL),
(37, 3, 31, NULL, 0, NULL, NULL, 1, NULL, '2025-02-16 17:21:19', NULL),
(38, 3, 33, NULL, 0, NULL, NULL, 1, NULL, '2025-02-16 17:21:19', NULL),
(39, 3, 35, NULL, 0, NULL, NULL, 1, NULL, '2025-02-16 17:21:19', NULL),
(40, 3, 38, NULL, 0, NULL, NULL, 1, NULL, '2025-02-16 17:21:19', NULL),
(41, 3, 41, NULL, 0, NULL, NULL, 1, NULL, '2025-02-16 17:21:19', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_identification_projects`
--

CREATE TABLE `project_identification_projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `motive` text DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `analyzed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `project_identification_projects`
--

INSERT INTO `project_identification_projects` (`id`, `project_id`, `status`, `motive`, `customer_id`, `analyzed_by`, `expired_at`, `created_at`, `updated_at`) VALUES
(1, 1, 0, NULL, 1, NULL, NULL, '2025-02-16 12:46:10', '2025-02-16 12:46:10'),
(2, 2, 1, NULL, 2, 2, NULL, '2025-02-16 12:46:24', '2025-02-16 13:04:04'),
(3, 1, 0, NULL, 1, NULL, NULL, '2025-02-16 12:46:25', '2025-02-16 12:46:25'),
(4, 1, 0, NULL, 1, NULL, NULL, '2025-02-16 12:46:33', '2025-02-16 12:46:33'),
(5, 2, 1, NULL, 2, 2, NULL, '2025-02-16 12:46:33', '2025-02-16 13:04:04'),
(6, 2, 1, NULL, 2, 2, NULL, '2025-02-16 12:46:41', '2025-02-16 13:04:04'),
(7, 1, 0, NULL, 1, NULL, NULL, '2025-02-16 12:46:48', '2025-02-16 12:46:48'),
(8, 2, 1, NULL, 2, 2, NULL, '2025-02-16 12:46:57', '2025-02-16 13:04:04'),
(9, 2, 1, NULL, 2, 2, NULL, '2025-02-16 12:47:21', '2025-02-16 13:04:04'),
(10, 2, 1, NULL, 2, 2, NULL, '2025-02-16 12:47:31', '2025-02-16 13:04:04'),
(11, 2, 1, NULL, 2, 2, NULL, '2025-02-16 12:47:41', '2025-02-16 13:04:04'),
(12, 2, 1, NULL, 2, 2, NULL, '2025-02-16 12:47:47', '2025-02-16 13:04:04'),
(13, 1, 0, NULL, 1, NULL, NULL, '2025-02-16 12:47:48', '2025-02-16 12:47:48'),
(14, 2, 1, NULL, 2, 2, NULL, '2025-02-16 12:48:06', '2025-02-16 13:04:04'),
(15, 2, 1, NULL, 2, 2, NULL, '2025-02-16 12:48:20', '2025-02-16 13:04:04'),
(16, 2, 1, NULL, 2, 2, NULL, '2025-02-16 12:48:27', '2025-02-16 13:04:04'),
(17, 2, 1, NULL, 2, 2, NULL, '2025-02-16 12:48:41', '2025-02-16 13:04:04'),
(18, 2, 1, NULL, 2, 2, NULL, '2025-02-16 12:48:50', '2025-02-16 13:04:04'),
(19, 2, 1, NULL, 2, 2, NULL, '2025-02-16 12:48:52', '2025-02-16 13:04:04'),
(20, 1, 0, NULL, 1, NULL, NULL, '2025-02-16 12:49:41', '2025-02-16 12:49:41'),
(21, 1, 0, NULL, 1, NULL, NULL, '2025-02-16 12:49:53', '2025-02-16 12:49:53'),
(22, 1, 0, NULL, 1, NULL, NULL, '2025-02-16 12:50:06', '2025-02-16 12:50:06'),
(23, 1, 0, NULL, 1, NULL, NULL, '2025-02-16 12:50:18', '2025-02-16 12:50:18'),
(24, 1, 0, NULL, 1, NULL, NULL, '2025-02-16 12:50:29', '2025-02-16 12:50:29'),
(25, 1, 0, NULL, 1, NULL, NULL, '2025-02-16 12:50:43', '2025-02-16 12:50:43'),
(26, 1, 0, NULL, 1, NULL, NULL, '2025-02-16 12:50:51', '2025-02-16 12:50:51'),
(27, 1, 0, NULL, 1, NULL, NULL, '2025-02-16 12:51:11', '2025-02-16 12:51:11'),
(28, 1, 0, NULL, 1, NULL, NULL, '2025-02-16 12:51:24', '2025-02-16 12:51:24'),
(29, 1, 0, NULL, 1, NULL, NULL, '2025-02-16 12:54:10', '2025-02-16 12:54:10'),
(30, 1, 0, NULL, 1, NULL, NULL, '2025-02-16 12:54:39', '2025-02-16 12:54:39'),
(31, 1, 0, NULL, 1, NULL, NULL, '2025-02-16 12:54:46', '2025-02-16 12:54:46'),
(32, 1, 0, NULL, 1, NULL, NULL, '2025-02-16 12:57:10', '2025-02-16 12:57:10');

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_identification_project_accessibilities`
--

CREATE TABLE `project_identification_project_accessibilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `motive` text DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `analyzed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_identification_project_accessibility_timelines`
--

CREATE TABLE `project_identification_project_accessibility_timelines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `identification_project_accessibility_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `motive` text DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `analyzed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_identification_project_categories`
--

CREATE TABLE `project_identification_project_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `motive` text DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `analyzed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `project_identification_project_categories`
--

INSERT INTO `project_identification_project_categories` (`id`, `project_id`, `status`, `motive`, `customer_id`, `analyzed_by`, `expired_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Ok', 1, 1, NULL, '2025-02-16 12:46:10', '2025-02-16 13:11:32'),
(2, 2, 3, 'mmmmm', 2, 2, '2025-10-10 12:00:00', '2025-02-16 12:46:24', '2025-02-16 13:03:55');

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_identification_project_category_timelines`
--

CREATE TABLE `project_identification_project_category_timelines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `identification_project_category_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `motive` text DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `analyzed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `project_identification_project_category_timelines`
--

INSERT INTO `project_identification_project_category_timelines` (`id`, `identification_project_category_id`, `status`, `motive`, `customer_id`, `analyzed_by`, `expired_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 1, NULL, NULL, '2025-02-16 12:46:10', '2025-02-16 12:46:10'),
(2, 2, 1, NULL, 2, NULL, NULL, '2025-02-16 12:46:24', '2025-02-16 12:46:24'),
(3, 2, 2, NULL, 2, NULL, NULL, '2025-02-16 12:48:52', '2025-02-16 12:48:52'),
(4, 1, 2, NULL, 1, NULL, NULL, '2025-02-16 12:51:24', '2025-02-16 12:51:24'),
(5, 1, 2, NULL, 1, NULL, NULL, '2025-02-16 12:54:10', '2025-02-16 12:54:10'),
(6, 1, 2, NULL, 1, NULL, NULL, '2025-02-16 12:54:39', '2025-02-16 12:54:39'),
(7, 1, 2, NULL, 1, NULL, NULL, '2025-02-16 12:54:46', '2025-02-16 12:54:46'),
(8, 1, 2, NULL, 1, NULL, NULL, '2025-02-16 12:57:10', '2025-02-16 12:57:10'),
(9, 2, 5, 'mmmmm', NULL, 2, '2025-10-10 12:00:00', '2025-02-16 13:03:55', '2025-02-16 13:03:55'),
(10, 1, 3, NULL, NULL, 1, NULL, '2025-02-16 13:11:32', '2025-02-16 13:11:32');

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_identification_project_contrapartid_socials`
--

CREATE TABLE `project_identification_project_contrapartid_socials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `motive` text DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `analyzed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_identification_project_contrapartid_social_timelines`
--

CREATE TABLE `project_identification_project_contrapartid_social_timelines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `identification_project_contrapartid_social_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `motive` text DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `analyzed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_identification_project_cronograms`
--

CREATE TABLE `project_identification_project_cronograms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `motive` text DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `analyzed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_identification_project_cronogram_timelines`
--

CREATE TABLE `project_identification_project_cronogram_timelines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `identification_project_cronogram_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `motive` text DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `analyzed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_identification_project_descriptions`
--

CREATE TABLE `project_identification_project_descriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `motive` text DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `analyzed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_identification_project_description_timelines`
--

CREATE TABLE `project_identification_project_description_timelines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `identification_project_desccription_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `motive` text DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `analyzed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_identification_project_justifications`
--

CREATE TABLE `project_identification_project_justifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `motive` text DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `analyzed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_identification_project_justification_timelines`
--

CREATE TABLE `project_identification_project_justification_timelines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `identification_project_justification_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `motive` text DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `analyzed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_identification_project_locals`
--

CREATE TABLE `project_identification_project_locals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `motive` text DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `analyzed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_identification_project_local_timelines`
--

CREATE TABLE `project_identification_project_local_timelines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `identification_project_local_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `motive` text DEFAULT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `analyzed_by` bigint(20) DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_identification_project_names`
--

CREATE TABLE `project_identification_project_names` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `motive` text DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `analyzed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `project_identification_project_names`
--

INSERT INTO `project_identification_project_names` (`id`, `project_id`, `status`, `motive`, `customer_id`, `analyzed_by`, `expired_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Ok', 1, 1, NULL, '2025-02-16 12:46:25', '2025-02-16 13:11:40'),
(2, 2, 0, NULL, 2, NULL, NULL, '2025-02-16 12:46:33', '2025-02-16 12:46:33');

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_identification_project_name_timelines`
--

CREATE TABLE `project_identification_project_name_timelines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `identification_project_name_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `motive` text DEFAULT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `analyzed_by` bigint(20) DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `project_identification_project_name_timelines`
--

INSERT INTO `project_identification_project_name_timelines` (`id`, `identification_project_name_id`, `status`, `motive`, `customer_id`, `analyzed_by`, `expired_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 1, NULL, NULL, '2025-02-16 12:46:25', '2025-02-16 12:46:25'),
(2, 2, 1, NULL, 2, NULL, NULL, '2025-02-16 12:46:33', '2025-02-16 12:46:33'),
(3, 2, 2, NULL, 2, NULL, NULL, '2025-02-16 12:48:52', '2025-02-16 12:48:52'),
(4, 1, 2, NULL, 1, NULL, NULL, '2025-02-16 12:51:24', '2025-02-16 12:51:24'),
(5, 1, 2, NULL, 1, NULL, NULL, '2025-02-16 12:54:10', '2025-02-16 12:54:10'),
(6, 1, 2, NULL, 1, NULL, NULL, '2025-02-16 12:54:39', '2025-02-16 12:54:39'),
(7, 1, 2, NULL, 1, NULL, NULL, '2025-02-16 12:54:46', '2025-02-16 12:54:46'),
(8, 1, 2, NULL, 1, NULL, NULL, '2025-02-16 12:57:10', '2025-02-16 12:57:10'),
(9, 1, 3, NULL, NULL, 1, NULL, '2025-02-16 13:11:40', '2025-02-16 13:11:40');

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_identification_project_objectives`
--

CREATE TABLE `project_identification_project_objectives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `motive` text DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `analyzed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_identification_project_objetive_timelines`
--

CREATE TABLE `project_identification_project_objetive_timelines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `identification_project_objective_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `motive` text DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `analyzed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_identification_project_plans`
--

CREATE TABLE `project_identification_project_plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `motive` text DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `analyzed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_identification_project_plan_timelines`
--

CREATE TABLE `project_identification_project_plan_timelines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `identification_project_plan_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `motive` text DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `analyzed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_identification_project_prices`
--

CREATE TABLE `project_identification_project_prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `motive` text DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `analyzed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `project_identification_project_prices`
--

INSERT INTO `project_identification_project_prices` (`id`, `project_id`, `status`, `motive`, `customer_id`, `analyzed_by`, `expired_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL, 1, NULL, '2025-02-16 13:11:45', '2025-02-16 13:11:45');

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_identification_project_price_timelines`
--

CREATE TABLE `project_identification_project_price_timelines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `identification_project_price_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `motive` text DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `analyzed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `project_identification_project_price_timelines`
--

INSERT INTO `project_identification_project_price_timelines` (`id`, `identification_project_price_id`, `status`, `motive`, `customer_id`, `analyzed_by`, `expired_at`, `created_at`, `updated_at`) VALUES
(1, 1, 3, NULL, NULL, 1, NULL, '2025-02-16 13:11:45', '2025-02-16 13:11:45');

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_identification_project_resumes`
--

CREATE TABLE `project_identification_project_resumes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `motive` text DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `analyzed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_identification_project_resume_timelines`
--

CREATE TABLE `project_identification_project_resume_timelines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `identification_project_resume_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `motive` text DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `analyzed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_identification_project_targets`
--

CREATE TABLE `project_identification_project_targets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `motive` text DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `analyzed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_identification_project_target_timelines`
--

CREATE TABLE `project_identification_project_target_timelines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `identification_project_target_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `motive` text DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `analyzed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_identification_project_timelines`
--

CREATE TABLE `project_identification_project_timelines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `identification_project_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `motive` text DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `analyzed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `project_identification_project_timelines`
--

INSERT INTO `project_identification_project_timelines` (`id`, `identification_project_id`, `status`, `motive`, `customer_id`, `analyzed_by`, `expired_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 1, NULL, NULL, '2025-02-16 12:46:10', '2025-02-16 12:46:10'),
(2, 2, 1, NULL, 2, NULL, NULL, '2025-02-16 12:46:24', '2025-02-16 12:46:24'),
(3, 3, 1, NULL, 1, NULL, NULL, '2025-02-16 12:46:25', '2025-02-16 12:46:25'),
(4, 4, 1, NULL, 1, NULL, NULL, '2025-02-16 12:46:33', '2025-02-16 12:46:33'),
(5, 5, 1, NULL, 2, NULL, NULL, '2025-02-16 12:46:33', '2025-02-16 12:46:33'),
(6, 6, 1, NULL, 2, NULL, NULL, '2025-02-16 12:46:41', '2025-02-16 12:46:41'),
(7, 7, 1, NULL, 1, NULL, NULL, '2025-02-16 12:46:48', '2025-02-16 12:46:48'),
(8, 8, 1, NULL, 2, NULL, NULL, '2025-02-16 12:46:57', '2025-02-16 12:46:57'),
(9, 9, 1, NULL, 2, NULL, NULL, '2025-02-16 12:47:21', '2025-02-16 12:47:21'),
(10, 10, 1, NULL, 2, NULL, NULL, '2025-02-16 12:47:31', '2025-02-16 12:47:31'),
(11, 11, 1, NULL, 2, NULL, NULL, '2025-02-16 12:47:41', '2025-02-16 12:47:41'),
(12, 12, 1, NULL, 2, NULL, NULL, '2025-02-16 12:47:47', '2025-02-16 12:47:47'),
(13, 13, 1, NULL, 1, NULL, NULL, '2025-02-16 12:47:48', '2025-02-16 12:47:48'),
(14, 14, 1, NULL, 2, NULL, NULL, '2025-02-16 12:48:06', '2025-02-16 12:48:06'),
(15, 15, 1, NULL, 2, NULL, NULL, '2025-02-16 12:48:20', '2025-02-16 12:48:20'),
(16, 16, 1, NULL, 2, NULL, NULL, '2025-02-16 12:48:27', '2025-02-16 12:48:27'),
(17, 17, 1, NULL, 2, NULL, NULL, '2025-02-16 12:48:41', '2025-02-16 12:48:41'),
(18, 18, 1, NULL, 2, NULL, NULL, '2025-02-16 12:48:50', '2025-02-16 12:48:50'),
(19, 19, 1, NULL, 2, NULL, NULL, '2025-02-16 12:48:52', '2025-02-16 12:48:52'),
(20, 20, 1, NULL, 1, NULL, NULL, '2025-02-16 12:49:41', '2025-02-16 12:49:41'),
(21, 21, 1, NULL, 1, NULL, NULL, '2025-02-16 12:49:53', '2025-02-16 12:49:53'),
(22, 22, 1, NULL, 1, NULL, NULL, '2025-02-16 12:50:06', '2025-02-16 12:50:06'),
(23, 23, 1, NULL, 1, NULL, NULL, '2025-02-16 12:50:18', '2025-02-16 12:50:18'),
(24, 24, 1, NULL, 1, NULL, NULL, '2025-02-16 12:50:29', '2025-02-16 12:50:29'),
(25, 25, 1, NULL, 1, NULL, NULL, '2025-02-16 12:50:43', '2025-02-16 12:50:43'),
(26, 26, 1, NULL, 1, NULL, NULL, '2025-02-16 12:50:51', '2025-02-16 12:50:51'),
(27, 27, 1, NULL, 1, NULL, NULL, '2025-02-16 12:51:11', '2025-02-16 12:51:11'),
(28, 28, 1, NULL, 1, NULL, NULL, '2025-02-16 12:51:24', '2025-02-16 12:51:24'),
(29, 29, 1, NULL, 1, NULL, NULL, '2025-02-16 12:54:10', '2025-02-16 12:54:10'),
(30, 30, 1, NULL, 1, NULL, NULL, '2025-02-16 12:54:39', '2025-02-16 12:54:39'),
(31, 31, 1, NULL, 1, NULL, NULL, '2025-02-16 12:54:46', '2025-02-16 12:54:46'),
(32, 32, 1, NULL, 1, NULL, NULL, '2025-02-16 12:57:10', '2025-02-16 12:57:10'),
(33, 2, 3, NULL, NULL, 2, NULL, '2025-02-16 13:04:04', '2025-02-16 13:04:04');

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_identification_proponents`
--

CREATE TABLE `project_identification_proponents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `motive` text DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `analyzed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `project_identification_proponents`
--

INSERT INTO `project_identification_proponents` (`id`, `project_id`, `status`, `motive`, `customer_id`, `analyzed_by`, `expired_at`, `created_at`, `updated_at`) VALUES
(1, 1, 0, NULL, 1, NULL, NULL, '2025-02-16 12:45:16', '2025-02-16 12:45:16'),
(2, 2, 1, NULL, 2, 2, NULL, '2025-02-16 12:45:48', '2025-02-16 13:02:07'),
(3, 3, 0, NULL, 3, NULL, NULL, '2025-02-16 17:21:19', '2025-02-16 17:21:19');

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_identification_proponent_timelines`
--

CREATE TABLE `project_identification_proponent_timelines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `identification_proponent_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `motive` text DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `analyzed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `project_identification_proponent_timelines`
--

INSERT INTO `project_identification_proponent_timelines` (`id`, `identification_proponent_id`, `status`, `motive`, `customer_id`, `analyzed_by`, `expired_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 1, NULL, NULL, '2025-02-16 12:45:16', '2025-02-16 12:45:16'),
(2, 2, 1, NULL, 2, NULL, NULL, '2025-02-16 12:45:48', '2025-02-16 12:45:48'),
(3, 2, 3, NULL, NULL, 2, NULL, '2025-02-16 13:02:07', '2025-02-16 13:02:07'),
(4, 3, 1, NULL, 3, NULL, NULL, '2025-02-16 17:21:19', '2025-02-16 17:21:19');

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_inscription_accessibility`
--

CREATE TABLE `project_inscription_accessibility` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `accessibility_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `project_inscription_accessibility`
--

INSERT INTO `project_inscription_accessibility` (`id`, `project_id`, `accessibility_id`) VALUES
(1, 2, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_inscription_accessibility_arquitetonic`
--

CREATE TABLE `project_inscription_accessibility_arquitetonic` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `accessibility_arquitetonic_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_inscription_accessibility_atitudinal`
--

CREATE TABLE `project_inscription_accessibility_atitudinal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `accessibility_atitudinal_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_inscription_accessibility_communicational`
--

CREATE TABLE `project_inscription_accessibility_communicational` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `accessibility_communicational_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_inscription_projects`
--

CREATE TABLE `project_inscription_projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `motive` text DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `analyzed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `project_inscription_projects`
--

INSERT INTO `project_inscription_projects` (`id`, `project_id`, `status`, `motive`, `customer_id`, `analyzed_by`, `expired_at`, `created_at`, `updated_at`) VALUES
(1, 1, 0, NULL, 1, NULL, NULL, '2025-02-16 12:45:16', '2025-02-16 12:45:16'),
(2, 2, 1, NULL, 2, 2, NULL, '2025-02-16 12:45:48', '2025-02-16 13:02:23'),
(3, 3, 0, NULL, 3, NULL, NULL, '2025-02-16 17:21:19', '2025-02-16 17:21:19');

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_inscription_project_timelines`
--

CREATE TABLE `project_inscription_project_timelines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inscription_project_id` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL,
  `motive` text DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `analyzed_by` bigint(20) UNSIGNED DEFAULT NULL,
  `expired_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `project_inscription_project_timelines`
--

INSERT INTO `project_inscription_project_timelines` (`id`, `inscription_project_id`, `status`, `motive`, `customer_id`, `analyzed_by`, `expired_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 1, NULL, NULL, '2025-02-16 12:45:16', '2025-02-16 12:45:16'),
(2, 2, 1, NULL, 2, NULL, NULL, '2025-02-16 12:45:48', '2025-02-16 12:45:48'),
(3, 2, 3, NULL, NULL, 2, NULL, '2025-02-16 13:02:23', '2025-02-16 13:02:23'),
(4, 3, 1, NULL, 3, NULL, NULL, '2025-02-16 17:21:19', '2025-02-16 17:21:19');

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_inscription_strategy`
--

CREATE TABLE `project_inscription_strategy` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `strategy_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `project_inscription_strategy`
--

INSERT INTO `project_inscription_strategy` (`id`, `project_id`, `strategy_id`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 3, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_strategies`
--

CREATE TABLE `project_strategies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `project_strategies`
--

INSERT INTO `project_strategies` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Redes', 1, '2025-01-21 01:31:17', '2025-01-21 01:31:17'),
(2, 'Sites', 1, '2025-01-21 01:31:17', '2025-01-21 01:31:17'),
(3, 'Rádio', 1, '2025-01-26 13:15:29', '2025-01-26 13:15:29'),
(4, 'TV', 1, '2025-01-26 13:15:53', '2025-01-26 13:15:53'),
(5, 'Jornal inscrito', 1, '2024-12-23 13:11:48', '2024-12-23 13:11:48');

-- --------------------------------------------------------

--
-- Estrutura para tabela `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `cpf` varchar(50) DEFAULT NULL,
  `cnpj` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `photo` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `settings`
--

INSERT INTO `settings` (`id`, `name`, `cpf`, `cnpj`, `phone`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Gestor Cultural', '000.000.000-00', '00.000.000/0000-00', NULL, NULL, '2024-04-08 17:28:12', '2024-04-08 17:28:12');

-- --------------------------------------------------------

--
-- Estrutura para tabela `states`
--

CREATE TABLE `states` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `uf` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `states`
--

INSERT INTO `states` (`id`, `name`, `uf`) VALUES
(11, 'RONDONIA', 'RO'),
(12, 'ACRE', 'AC'),
(13, 'AMAZONAS', 'AM'),
(14, 'RORAIMA', 'RR'),
(15, 'PARA', 'PA'),
(16, 'AMAPA', 'AP'),
(17, 'TOCANTINS', 'TO'),
(21, 'MARANHAO', 'MA'),
(22, 'PIAUI', 'PI'),
(23, 'CEARA', 'CE'),
(24, 'RIO GRANDE DO NORTE', 'RN'),
(25, 'PARAIBA', 'PB'),
(26, 'PERNAMBUCO', 'PE'),
(27, 'ALAGOAS', 'AL'),
(28, 'SERGIPE', 'SE'),
(29, 'BAHIA', 'BA'),
(31, 'MINAS GERAIS', 'MG'),
(32, 'ESPIRITO SANTO', 'ES'),
(33, 'RIO DE JANEIRO', 'RJ'),
(35, 'SAO PAULO', 'SP'),
(41, 'PARANA', 'PR'),
(42, 'SANTA CATARINA', 'SC'),
(43, 'RIO GRANDE DO SUL', 'RS'),
(50, 'MATO GROSSO DO SUL', 'MS'),
(51, 'MATO GROSSO', 'MT'),
(52, 'GOIAS', 'GO'),
(53, 'DISTRITO FEDERAL', 'DF');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tenants`
--

CREATE TABLE `tenants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `cnpj` varchar(100) NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(50) NOT NULL,
  `logo` varchar(191) DEFAULT NULL,
  `is_active` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `observation` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `tenants`
--

INSERT INTO `tenants` (`id`, `name`, `cnpj`, `city_id`, `company_id`, `phone`, `logo`, `is_active`, `observation`, `created_at`, `updated_at`) VALUES
(1, 'PREFEITURA MUNICIPAL DE BREJO DO CRUZ', '22.942.478/2384-78', 1, 1, '(93) 82383-2492', 'prefectures/H79qDsAff0ONNW6jF9oli5Fh6Bb6traO.jpg', 1, NULL, '2024-04-08 20:24:48', '2024-04-08 20:24:48');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tenant_user`
--

CREATE TABLE `tenant_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tenant_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `tenant_user`
--

INSERT INTO `tenant_user` (`id`, `user_id`, `tenant_id`) VALUES
(1, 2, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `territories`
--

CREATE TABLE `territories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code_ibge` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `uf_id` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `territories`
--

INSERT INTO `territories` (`id`, `code_ibge`, `name`, `uf_id`) VALUES
(1, '1100015', 'ALTA FLORESTA D\'OESTE', 11),
(2, '1100023', 'ARIQUEMES', 11),
(3, '1100031', 'CABIXI', 11),
(4, '1100049', 'CACOAL', 11),
(5, '1100056', 'CEREJEIRAS', 11),
(6, '1100064', 'COLORADO DO OESTE', 11),
(7, '1100072', 'CORUMBIARA', 11),
(8, '1100080', 'COSTA MARQUES', 11),
(9, '1100098', 'ESPIGAO D\'OESTE', 11),
(10, '1100106', 'GUAJARA-MIRIM', 11),
(11, '1100114', 'JARU', 11),
(12, '1100122', 'JI-PARANA', 11),
(13, '1100130', 'MACHADINHO D\'OESTE', 11),
(14, '1100148', 'NOVA BRASILANDIA D\'OESTE', 11),
(15, '1100155', 'OURO PRETO DO OESTE', 11),
(16, '1100189', 'PIMENTA BUENO', 11),
(17, '1100205', 'PORTO VELHO', 11),
(18, '1100254', 'PRESIDENTE MEDICI', 11),
(19, '1100262', 'RIO CRESPO', 11),
(20, '1100288', 'ROLIM DE MOURA', 11),
(21, '1100296', 'SANTA LUZIA D\'OESTE', 11),
(22, '1100304', 'VILHENA', 11),
(23, '1100320', 'SAO MIGUEL DO GUAPORE', 11),
(24, '1100338', 'NOVA MAMORE', 11),
(25, '1100346', 'ALVORADA D\'OESTE', 11),
(26, '1100379', 'ALTO ALEGRE DOS PARECIS', 11),
(27, '1100403', 'ALTO PARAISO', 11),
(28, '1100452', 'BURITIS', 11),
(29, '1100502', 'NOVO HORIZONTE DO OESTE', 11),
(30, '1100601', 'CACAULANDIA', 11),
(31, '1100700', 'CAMPO NOVO DE RONDONIA', 11),
(32, '1100809', 'CANDEIAS DO JAMARI', 11),
(33, '1100908', 'CASTANHEIRAS', 11),
(34, '1100924', 'CHUPINGUAIA', 11),
(35, '1100940', 'CUJUBIM', 11),
(36, '1101005', 'GOVERNADOR JORGE TEIXEIRA', 11),
(37, '1101104', 'ITAPUA DO OESTE', 11),
(38, '1101203', 'MINISTRO ANDREAZZA', 11),
(39, '1101302', 'MIRANTE DA SERRA', 11),
(40, '1101401', 'MONTE NEGRO', 11),
(41, '1101435', 'NOVA UNIAO', 11),
(42, '1101450', 'PARECIS', 11),
(43, '1101468', 'PIMENTEIRAS DO OESTE', 11),
(44, '1101476', 'PRIMAVERA DE RONDONIA', 11),
(45, '1101484', 'SAO FELIPE D\'OESTE', 11),
(46, '1101492', 'SAO FRANCISCO DO GUAPORE', 11),
(47, '1101500', 'SERINGUEIRAS', 11),
(48, '1101559', 'TEIXEIROPOLIS', 11),
(49, '1101609', 'THEOBROMA', 11),
(50, '1101708', 'URUPA', 11),
(51, '1101757', 'VALE DO ANARI', 11),
(52, '1101807', 'VALE DO PARAISO', 11),
(53, '1200013', 'ACRELANDIA', 12),
(54, '1200054', 'ASSIS BRASIL', 12),
(55, '1200104', 'BRASILEIA', 12),
(56, '1200138', 'BUJARI', 12),
(57, '1200179', 'CAPIXABA', 12),
(58, '1200203', 'CRUZEIRO DO SUL', 12),
(59, '1200252', 'EPITACIOLANDIA', 12),
(60, '1200302', 'FEIJO', 12),
(61, '1200328', 'JORDAO', 12),
(62, '1200336', 'MANCIO LIMA', 12),
(63, '1200344', 'MANOEL URBANO', 12),
(64, '1200351', 'MARECHAL THAUMATURGO', 12),
(65, '1200385', 'PLACIDO DE CASTRO', 12),
(66, '1200393', 'PORTO WALTER', 12),
(67, '1200401', 'RIO BRANCO', 12),
(68, '1200427', 'RODRIGUES ALVES', 12),
(69, '1200435', 'SANTA ROSA DO PURUS', 12),
(70, '1200450', 'SENADOR GUIOMARD', 12),
(71, '1200500', 'SENA MADUREIRA', 12),
(72, '1200609', 'TARAUACA', 12),
(73, '1200708', 'XAPURI', 12),
(74, '1200807', 'PORTO ACRE', 12),
(75, '1300029', 'ALVARAES', 13),
(76, '1300060', 'AMATURA', 13),
(77, '1300086', 'ANAMA', 13),
(78, '1300102', 'ANORI', 13),
(79, '1300144', 'APUI', 13),
(80, '1300201', 'ATALAIA DO NORTE', 13),
(81, '1300300', 'AUTAZES', 13),
(82, '1300409', 'BARCELOS', 13),
(83, '1300508', 'BARREIRINHA', 13),
(84, '1300607', 'BENJAMIN CONSTANT', 13),
(85, '1300631', 'BERURI', 13),
(86, '1300680', 'BOA VISTA DO RAMOS', 13),
(87, '1300706', 'BOCA DO ACRE', 13),
(88, '1300805', 'BORBA', 13),
(89, '1300839', 'CAAPIRANGA', 13),
(90, '1300904', 'CANUTAMA', 13),
(91, '1301001', 'CARAUARI', 13),
(92, '1301100', 'CAREIRO', 13),
(93, '1301159', 'CAREIRO DA VARZEA', 13),
(94, '1301209', 'COARI', 13),
(95, '1301308', 'CODAJAS', 13),
(96, '1301407', 'EIRUNEPE', 13),
(97, '1301506', 'ENVIRA', 13),
(98, '1301605', 'FONTE BOA', 13),
(99, '1301654', 'GUAJARA', 13),
(100, '1301704', 'HUMAITA', 13),
(101, '1301803', 'IPIXUNA', 13),
(102, '1301852', 'IRANDUBA', 13),
(103, '1301902', 'ITACOATIARA', 13),
(104, '1301951', 'ITAMARATI', 13),
(105, '1302009', 'ITAPIRANGA', 13),
(106, '1302108', 'JAPURA', 13),
(107, '1302207', 'JURUA', 13),
(108, '1302306', 'JUTAI', 13),
(109, '1302405', 'LABREA', 13),
(110, '1302504', 'MANACAPURU', 13),
(111, '1302553', 'MANAQUIRI', 13),
(112, '1302603', 'MANAUS', 13),
(113, '1302702', 'MANICORE', 13),
(114, '1302801', 'MARAA', 13),
(115, '1302900', 'MAUES', 13),
(116, '1303007', 'NHAMUNDA', 13),
(117, '1303106', 'NOVA OLINDA DO NORTE', 13),
(118, '1303205', 'NOVO AIRAO', 13),
(119, '1303304', 'NOVO ARIPUANA', 13),
(120, '1303403', 'PARINTINS', 13),
(121, '1303502', 'PAUINI', 13),
(122, '1303536', 'PRESIDENTE FIGUEIREDO', 13),
(123, '1303569', 'RIO PRETO DA EVA', 13),
(124, '1303601', 'SANTA ISABEL DO RIO NEGRO', 13),
(125, '1303700', 'SANTO ANTONIO DO ICA', 13),
(126, '1303809', 'SAO GABRIEL DA CACHOEIRA', 13),
(127, '1303908', 'SAO PAULO DE OLIVENCA', 13),
(128, '1303957', 'SAO SEBASTIAO DO UATUMA', 13),
(129, '1304005', 'SILVES', 13),
(130, '1304062', 'TABATINGA', 13),
(131, '1304104', 'TAPAUA', 13),
(132, '1304203', 'TEFE', 13),
(133, '1304237', 'TONANTINS', 13),
(134, '1304260', 'UARINI', 13),
(135, '1304302', 'URUCARA', 13),
(136, '1304401', 'URUCURITUBA', 13),
(137, '1400027', 'AMAJARI', 14),
(138, '1400050', 'ALTO ALEGRE', 14),
(139, '1400100', 'BOA VISTA', 14),
(140, '1400159', 'BONFIM', 14),
(141, '1400175', 'CANTA', 14),
(142, '1400209', 'CARACARAI', 14),
(143, '1400233', 'CAROEBE', 14),
(144, '1400282', 'IRACEMA', 14),
(145, '1400308', 'MUCAJAI', 14),
(146, '1400407', 'NORMANDIA', 14),
(147, '1400456', 'PACARAIMA', 14),
(148, '1400472', 'RORAINOPOLIS', 14),
(149, '1400506', 'SAO JOAO DA BALIZA', 14),
(150, '1400605', 'SAO LUIZ', 14),
(151, '1400704', 'UIRAMUTA', 14),
(152, '1500107', 'ABAETETUBA', 15),
(153, '1500131', 'ABEL FIGUEIREDO', 15),
(154, '1500206', 'ACARA', 15),
(155, '1500305', 'AFUA', 15),
(156, '1500347', 'AGUA AZUL DO NORTE', 15),
(157, '1500404', 'ALENQUER', 15),
(158, '1500503', 'ALMEIRIM', 15),
(159, '1500602', 'ALTAMIRA', 15),
(160, '1500701', 'ANAJAS', 15),
(161, '1500800', 'ANANINDEUA', 15),
(162, '1500859', 'ANAPU', 15),
(163, '1500909', 'AUGUSTO CORREA', 15),
(164, '1500958', 'AURORA DO PARA', 15),
(165, '1501006', 'AVEIRO', 15),
(166, '1501105', 'BAGRE', 15),
(167, '1501204', 'BAIAO', 15),
(168, '1501253', 'BANNACH', 15),
(169, '1501303', 'BARCARENA', 15),
(170, '1501402', 'BELEM', 15),
(171, '1501451', 'BELTERRA', 15),
(172, '1501501', 'BENEVIDES', 15),
(173, '1501576', 'BOM JESUS DO TOCANTINS', 15),
(174, '1501600', 'BONITO', 15),
(175, '1501709', 'BRAGANCA', 15),
(176, '1501725', 'BRASIL NOVO', 15),
(177, '1501758', 'BREJO GRANDE DO ARAGUAIA', 15),
(178, '1501782', 'BREU BRANCO', 15),
(179, '1501808', 'BREVES', 15),
(180, '1501907', 'BUJARU', 15),
(181, '1501956', 'CACHOEIRA DO PIRIA', 15),
(182, '1502004', 'CACHOEIRA DO ARARI', 15),
(183, '1502103', 'CAMETA', 15),
(184, '1502152', 'CANAA DOS CARAJAS', 15),
(185, '1502202', 'CAPANEMA', 15),
(186, '1502301', 'CAPITAO POCO', 15),
(187, '1502400', 'CASTANHAL', 15),
(188, '1502509', 'CHAVES', 15),
(189, '1502608', 'COLARES', 15),
(190, '1502707', 'CONCEICAO DO ARAGUAIA', 15),
(191, '1502756', 'CONCORDIA DO PARA', 15),
(192, '1502764', 'CUMARU DO NORTE', 15),
(193, '1502772', 'CURIONOPOLIS', 15),
(194, '1502806', 'CURRALINHO', 15),
(195, '1502855', 'CURUA', 15),
(196, '1502905', 'CURUCA', 15),
(197, '1502939', 'DOM ELISEU', 15),
(198, '1502954', 'ELDORADO DO CARAJAS', 15),
(199, '1503002', 'FARO', 15),
(200, '1503044', 'FLORESTA DO ARAGUAIA', 15),
(201, '1503077', 'GARRAFAO DO NORTE', 15),
(202, '1503093', 'GOIANESIA DO PARA', 15),
(203, '1503101', 'GURUPA', 15),
(204, '1503200', 'IGARAPE-ACU', 15),
(205, '1503309', 'IGARAPE-MIRI', 15),
(206, '1503408', 'INHANGAPI', 15),
(207, '1503457', 'IPIXUNA DO PARA', 15),
(208, '1503507', 'IRITUIA', 15),
(209, '1503606', 'ITAITUBA', 15),
(210, '1503705', 'ITUPIRANGA', 15),
(211, '1503754', 'JACAREACANGA', 15),
(212, '1503804', 'JACUNDA', 15),
(213, '1503903', 'JURUTI', 15),
(214, '1504000', 'LIMOEIRO DO AJURU', 15),
(215, '1504059', 'MAE DO RIO', 15),
(216, '1504109', 'MAGALHAES BARATA', 15),
(217, '1504208', 'MARABA', 15),
(218, '1504307', 'MARACANA', 15),
(219, '1504406', 'MARAPANIM', 15),
(220, '1504422', 'MARITUBA', 15),
(221, '1504455', 'MEDICILANDIA', 15),
(222, '1504505', 'MELGACO', 15),
(223, '1504604', 'MOCAJUBA', 15),
(224, '1504703', 'MOJU', 15),
(225, '1504752', 'MOJUI DOS CAMPOS', 15),
(226, '1504802', 'MONTE ALEGRE', 15),
(227, '1504901', 'MUANA', 15),
(228, '1504950', 'NOVA ESPERANCA DO PIRIA', 15),
(229, '1504976', 'NOVA IPIXUNA', 15),
(230, '1505007', 'NOVA TIMBOTEUA', 15),
(231, '1505031', 'NOVO PROGRESSO', 15),
(232, '1505064', 'NOVO REPARTIMENTO', 15),
(233, '1505106', 'OBIDOS', 15),
(234, '1505205', 'OEIRAS DO PARA', 15),
(235, '1505304', 'ORIXIMINA', 15),
(236, '1505403', 'OUREM', 15),
(237, '1505437', 'OURILANDIA DO NORTE', 15),
(238, '1505486', 'PACAJA', 15),
(239, '1505494', 'PALESTINA DO PARA', 15),
(240, '1505502', 'PARAGOMINAS', 15),
(241, '1505536', 'PARAUAPEBAS', 15),
(242, '1505551', 'PAU D\'ARCO', 15),
(243, '1505601', 'PEIXE-BOI', 15),
(244, '1505635', 'PICARRA', 15),
(245, '1505650', 'PLACAS', 15),
(246, '1505700', 'PONTA DE PEDRAS', 15),
(247, '1505809', 'PORTEL', 15),
(248, '1505908', 'PORTO DE MOZ', 15),
(249, '1506005', 'PRAINHA', 15),
(250, '1506104', 'PRIMAVERA', 15),
(251, '1506112', 'QUATIPURU', 15),
(252, '1506138', 'REDENCAO', 15),
(253, '1506161', 'RIO MARIA', 15),
(254, '1506187', 'RONDON DO PARA', 15),
(255, '1506195', 'RUROPOLIS', 15),
(256, '1506203', 'SALINOPOLIS', 15),
(257, '1506302', 'SALVATERRA', 15),
(258, '1506351', 'SANTA BARBARA DO PARA', 15),
(259, '1506401', 'SANTA CRUZ DO ARARI', 15),
(260, '1506500', 'SANTA IZABEL DO PARA', 15),
(261, '1506559', 'SANTA LUZIA DO PARA', 15),
(262, '1506583', 'SANTA MARIA DAS BARREIRAS', 15),
(263, '1506609', 'SANTA MARIA DO PARA', 15),
(264, '1506708', 'SANTANA DO ARAGUAIA', 15),
(265, '1506807', 'SANTAREM', 15),
(266, '1506906', 'SANTAREM NOVO', 15),
(267, '1507003', 'SANTO ANTONIO DO TAUA', 15),
(268, '1507102', 'SAO CAETANO DE ODIVELAS', 15),
(269, '1507151', 'SAO DOMINGOS DO ARAGUAIA', 15),
(270, '1507201', 'SAO DOMINGOS DO CAPIM', 15),
(271, '1507300', 'SAO FELIX DO XINGU', 15),
(272, '1507409', 'SAO FRANCISCO DO PARA', 15),
(273, '1507458', 'SAO GERALDO DO ARAGUAIA', 15),
(274, '1507466', 'SAO JOAO DA PONTA', 15),
(275, '1507474', 'SAO JOAO DE PIRABAS', 15),
(276, '1507508', 'SAO JOAO DO ARAGUAIA', 15),
(277, '1507607', 'SAO MIGUEL DO GUAMA', 15),
(278, '1507706', 'SAO SEBASTIAO DA BOA VISTA', 15),
(279, '1507755', 'SAPUCAIA', 15),
(280, '1507805', 'SENADOR JOSE PORFIRIO', 15),
(281, '1507904', 'SOURE', 15),
(282, '1507953', 'TAILANDIA', 15),
(283, '1507961', 'TERRA ALTA', 15),
(284, '1507979', 'TERRA SANTA', 15),
(285, '1508001', 'TOME-ACU', 15),
(286, '1508035', 'TRACUATEUA', 15),
(287, '1508050', 'TRAIRAO', 15),
(288, '1508084', 'TUCUMA', 15),
(289, '1508100', 'TUCURUI', 15),
(290, '1508126', 'ULIANOPOLIS', 15),
(291, '1508159', 'URUARA', 15),
(292, '1508209', 'VIGIA', 15),
(293, '1508308', 'VISEU', 15),
(294, '1508357', 'VITORIA DO XINGU', 15),
(295, '1508407', 'XINGUARA', 15),
(296, '1600055', 'SERRA DO NAVIO', 16),
(297, '1600105', 'AMAPA', 16),
(298, '1600154', 'PEDRA BRANCA DO AMAPARI', 16),
(299, '1600204', 'CALCOENE', 16),
(300, '1600212', 'CUTIAS', 16),
(301, '1600238', 'FERREIRA GOMES', 16),
(302, '1600253', 'ITAUBAL', 16),
(303, '1600279', 'LARANJAL DO JARI', 16),
(304, '1600303', 'MACAPA', 16),
(305, '1600402', 'MAZAGAO', 16),
(306, '1600501', 'OIAPOQUE', 16),
(307, '1600535', 'PORTO GRANDE', 16),
(308, '1600550', 'PRACUUBA', 16),
(309, '1600600', 'SANTANA', 16),
(310, '1600709', 'TARTARUGALZINHO', 16),
(311, '1600808', 'VITORIA DO JARI', 16),
(312, '1700251', 'ABREULANDIA', 17),
(313, '1700301', 'AGUIARNOPOLIS', 17),
(314, '1700350', 'ALIANCA DO TOCANTINS', 17),
(315, '1700400', 'ALMAS', 17),
(316, '1700707', 'ALVORADA', 17),
(317, '1701002', 'ANANAS', 17),
(318, '1701051', 'ANGICO', 17),
(319, '1701101', 'APARECIDA DO RIO NEGRO', 17),
(320, '1701309', 'ARAGOMINAS', 17),
(321, '1701903', 'ARAGUACEMA', 17),
(322, '1702000', 'ARAGUACU', 17),
(323, '1702109', 'ARAGUAINA', 17),
(324, '1702158', 'ARAGUANA', 17),
(325, '1702208', 'ARAGUATINS', 17),
(326, '1702307', 'ARAPOEMA', 17),
(327, '1702406', 'ARRAIAS', 17),
(328, '1702554', 'AUGUSTINOPOLIS', 17),
(329, '1702703', 'AURORA DO TOCANTINS', 17),
(330, '1702901', 'AXIXA DO TOCANTINS', 17),
(331, '1703008', 'BABACULANDIA', 17),
(332, '1703057', 'BANDEIRANTES DO TOCANTINS', 17),
(333, '1703073', 'BARRA DO OURO', 17),
(334, '1703107', 'BARROLANDIA', 17),
(335, '1703206', 'BERNARDO SAYAO', 17),
(336, '1703305', 'BOM JESUS DO TOCANTINS', 17),
(337, '1703602', 'BRASILANDIA DO TOCANTINS', 17),
(338, '1703701', 'BREJINHO DE NAZARE', 17),
(339, '1703800', 'BURITI DO TOCANTINS', 17),
(340, '1703826', 'CACHOEIRINHA', 17),
(341, '1703842', 'CAMPOS LINDOS', 17),
(342, '1703867', 'CARIRI DO TOCANTINS', 17),
(343, '1703883', 'CARMOLANDIA', 17),
(344, '1703891', 'CARRASCO BONITO', 17),
(345, '1703909', 'CASEARA', 17),
(346, '1704105', 'CENTENARIO', 17),
(347, '1704600', 'CHAPADA DE AREIA', 17),
(348, '1705102', 'CHAPADA DA NATIVIDADE', 17),
(349, '1705508', 'COLINAS DO TOCANTINS', 17),
(350, '1705557', 'COMBINADO', 17),
(351, '1705607', 'CONCEICAO DO TOCANTINS', 17),
(352, '1706001', 'COUTO MAGALHAES', 17),
(353, '1706100', 'CRISTALANDIA', 17),
(354, '1706258', 'CRIXAS DO TOCANTINS', 17),
(355, '1706506', 'DARCINOPOLIS', 17),
(356, '1707009', 'DIANOPOLIS', 17),
(357, '1707108', 'DIVINOPOLIS DO TOCANTINS', 17),
(358, '1707207', 'DOIS IRMAOS DO TOCANTINS', 17),
(359, '1707306', 'DUERE', 17),
(360, '1707405', 'ESPERANTINA', 17),
(361, '1707553', 'FATIMA', 17),
(362, '1707652', 'FIGUEIROPOLIS', 17),
(363, '1707702', 'FILADELFIA', 17),
(364, '1708205', 'FORMOSO DO ARAGUAIA', 17),
(365, '1708254', 'FORTALEZA DO TABOCAO', 17),
(366, '1708304', 'GOIANORTE', 17),
(367, '1709005', 'GOIATINS', 17),
(368, '1709302', 'GUARAI', 17),
(369, '1709500', 'GURUPI', 17),
(370, '1709807', 'IPUEIRAS', 17),
(371, '1710508', 'ITACAJA', 17),
(372, '1710706', 'ITAGUATINS', 17),
(373, '1710904', 'ITAPIRATINS', 17),
(374, '1711100', 'ITAPORA DO TOCANTINS', 17),
(375, '1711506', 'JAU DO TOCANTINS', 17),
(376, '1711803', 'JUARINA', 17),
(377, '1711902', 'LAGOA DA CONFUSAO', 17),
(378, '1711951', 'LAGOA DO TOCANTINS', 17),
(379, '1712009', 'LAJEADO', 17),
(380, '1712157', 'LAVANDEIRA', 17),
(381, '1712405', 'LIZARDA', 17),
(382, '1712454', 'LUZINOPOLIS', 17),
(383, '1712504', 'MARIANOPOLIS DO TOCANTINS', 17),
(384, '1712702', 'MATEIROS', 17),
(385, '1712801', 'MAURILANDIA DO TOCANTINS', 17),
(386, '1713205', 'MIRACEMA DO TOCANTINS', 17),
(387, '1713304', 'MIRANORTE', 17),
(388, '1713601', 'MONTE DO CARMO', 17),
(389, '1713700', 'MONTE SANTO DO TOCANTINS', 17),
(390, '1713809', 'PALMEIRAS DO TOCANTINS', 17),
(391, '1713957', 'MURICILANDIA', 17),
(392, '1714203', 'NATIVIDADE', 17),
(393, '1714302', 'NAZARE', 17),
(394, '1714880', 'NOVA OLINDA', 17),
(395, '1715002', 'NOVA ROSALANDIA', 17),
(396, '1715101', 'NOVO ACORDO', 17),
(397, '1715150', 'NOVO ALEGRE', 17),
(398, '1715259', 'NOVO JARDIM', 17),
(399, '1715507', 'OLIVEIRA DE FATIMA', 17),
(400, '1715705', 'PALMEIRANTE', 17),
(401, '1715754', 'PALMEIROPOLIS', 17),
(402, '1716109', 'PARAISO DO TOCANTINS', 17),
(403, '1716208', 'PARANA', 17),
(404, '1716307', 'PAU D\'ARCO', 17),
(405, '1716505', 'PEDRO AFONSO', 17),
(406, '1716604', 'PEIXE', 17),
(407, '1716653', 'PEQUIZEIRO', 17),
(408, '1716703', 'COLMEIA', 17),
(409, '1717008', 'PINDORAMA DO TOCANTINS', 17),
(410, '1717206', 'PIRAQUE', 17),
(411, '1717503', 'PIUM', 17),
(412, '1717800', 'PONTE ALTA DO BOM JESUS', 17),
(413, '1717909', 'PONTE ALTA DO TOCANTINS', 17),
(414, '1718006', 'PORTO ALEGRE DO TOCANTINS', 17),
(415, '1718204', 'PORTO NACIONAL', 17),
(416, '1718303', 'PRAIA NORTE', 17),
(417, '1718402', 'PRESIDENTE KENNEDY', 17),
(418, '1718451', 'PUGMIL', 17),
(419, '1718501', 'RECURSOLANDIA', 17),
(420, '1718550', 'RIACHINHO', 17),
(421, '1718659', 'RIO DA CONCEICAO', 17),
(422, '1718709', 'RIO DOS BOIS', 17),
(423, '1718758', 'RIO SONO', 17),
(424, '1718808', 'SAMPAIO', 17),
(425, '1718840', 'SANDOLANDIA', 17),
(426, '1718865', 'SANTA FE DO ARAGUAIA', 17),
(427, '1718881', 'SANTA MARIA DO TOCANTINS', 17),
(428, '1718899', 'SANTA RITA DO TOCANTINS', 17),
(429, '1718907', 'SANTA ROSA DO TOCANTINS', 17),
(430, '1719004', 'SANTA TEREZA DO TOCANTINS', 17),
(431, '1720002', 'SANTA TEREZINHA DO TOCANTINS', 17),
(432, '1720101', 'SAO BENTO DO TOCANTINS', 17),
(433, '1720150', 'SAO FELIX DO TOCANTINS', 17),
(434, '1720200', 'SAO MIGUEL DO TOCANTINS', 17),
(435, '1720259', 'SAO SALVADOR DO TOCANTINS', 17),
(436, '1720309', 'SAO SEBASTIAO DO TOCANTINS', 17),
(437, '1720499', 'SAO VALERIO', 17),
(438, '1720655', 'SILVANOPOLIS', 17),
(439, '1720804', 'SITIO NOVO DO TOCANTINS', 17),
(440, '1720853', 'SUCUPIRA', 17),
(441, '1720903', 'TAGUATINGA', 17),
(442, '1720937', 'TAIPAS DO TOCANTINS', 17),
(443, '1720978', 'TALISMA', 17),
(444, '1721000', 'PALMAS', 17),
(445, '1721109', 'TOCANTINIA', 17),
(446, '1721208', 'TOCANTINOPOLIS', 17),
(447, '1721257', 'TUPIRAMA', 17),
(448, '1721307', 'TUPIRATINS', 17),
(449, '1722081', 'WANDERLANDIA', 17),
(450, '1722107', 'XAMBIOA', 17),
(451, '2100055', 'ACAILANDIA', 21),
(452, '2100105', 'AFONSO CUNHA', 21),
(453, '2100154', 'AGUA DOCE DO MARANHAO', 21),
(454, '2100204', 'ALCANTARA', 21),
(455, '2100303', 'ALDEIAS ALTAS', 21),
(456, '2100402', 'ALTAMIRA DO MARANHAO', 21),
(457, '2100436', 'ALTO ALEGRE DO MARANHAO', 21),
(458, '2100477', 'ALTO ALEGRE DO PINDARE', 21),
(459, '2100501', 'ALTO PARNAIBA', 21),
(460, '2100550', 'AMAPA DO MARANHAO', 21),
(461, '2100600', 'AMARANTE DO MARANHAO', 21),
(462, '2100709', 'ANAJATUBA', 21),
(463, '2100808', 'ANAPURUS', 21),
(464, '2100832', 'APICUM-ACU', 21),
(465, '2100873', 'ARAGUANA', 21),
(466, '2100907', 'ARAIOSES', 21),
(467, '2100956', 'ARAME', 21),
(468, '2101004', 'ARARI', 21),
(469, '2101103', 'AXIXA', 21),
(470, '2101202', 'BACABAL', 21),
(471, '2101251', 'BACABEIRA', 21),
(472, '2101301', 'BACURI', 21),
(473, '2101350', 'BACURITUBA', 21),
(474, '2101400', 'BALSAS', 21),
(475, '2101509', 'BARAO DE GRAJAU', 21),
(476, '2101608', 'BARRA DO CORDA', 21),
(477, '2101707', 'BARREIRINHAS', 21),
(478, '2101731', 'BELAGUA', 21),
(479, '2101772', 'BELA VISTA DO MARANHAO', 21),
(480, '2101806', 'BENEDITO LEITE', 21),
(481, '2101905', 'BEQUIMAO', 21),
(482, '2101939', 'BERNARDO DO MEARIM', 21),
(483, '2101970', 'BOA VISTA DO GURUPI', 21),
(484, '2102002', 'BOM JARDIM', 21),
(485, '2102036', 'BOM JESUS DAS SELVAS', 21),
(486, '2102077', 'BOM LUGAR', 21),
(487, '2102101', 'BREJO', 21),
(488, '2102150', 'BREJO DE AREIA', 21),
(489, '2102200', 'BURITI', 21),
(490, '2102309', 'BURITI BRAVO', 21),
(491, '2102325', 'BURITICUPU', 21),
(492, '2102358', 'BURITIRANA', 21),
(493, '2102374', 'CACHOEIRA GRANDE', 21),
(494, '2102408', 'CAJAPIO', 21),
(495, '2102507', 'CAJARI', 21),
(496, '2102556', 'CAMPESTRE DO MARANHAO', 21),
(497, '2102606', 'CANDIDO MENDES', 21),
(498, '2102705', 'CANTANHEDE', 21),
(499, '2102754', 'CAPINZAL DO NORTE', 21),
(500, '2102804', 'CAROLINA', 21),
(501, '2102903', 'CARUTAPERA', 21),
(502, '2103000', 'CAXIAS', 21),
(503, '2103109', 'CEDRAL', 21),
(504, '2103125', 'CENTRAL DO MARANHAO', 21),
(505, '2103158', 'CENTRO DO GUILHERME', 21),
(506, '2103174', 'CENTRO NOVO DO MARANHAO', 21),
(507, '2103208', 'CHAPADINHA', 21),
(508, '2103257', 'CIDELANDIA', 21),
(509, '2103307', 'CODO', 21),
(510, '2103406', 'COELHO NETO', 21),
(511, '2103505', 'COLINAS', 21),
(512, '2103554', 'CONCEICAO DO LAGO-ACU', 21),
(513, '2103604', 'COROATA', 21),
(514, '2103703', 'CURURUPU', 21),
(515, '2103752', 'DAVINOPOLIS', 21),
(516, '2103802', 'DOM PEDRO', 21),
(517, '2103901', 'DUQUE BACELAR', 21),
(518, '2104008', 'ESPERANTINOPOLIS', 21),
(519, '2104057', 'ESTREITO', 21),
(520, '2104073', 'FEIRA NOVA DO MARANHAO', 21),
(521, '2104081', 'FERNANDO FALCAO', 21),
(522, '2104099', 'FORMOSA DA SERRA NEGRA', 21),
(523, '2104107', 'FORTALEZA DOS NOGUEIRAS', 21),
(524, '2104206', 'FORTUNA', 21),
(525, '2104305', 'GODOFREDO VIANA', 21),
(526, '2104404', 'GONCALVES DIAS', 21),
(527, '2104503', 'GOVERNADOR ARCHER', 21),
(528, '2104552', 'GOVERNADOR EDISON LOBAO', 21),
(529, '2104602', 'GOVERNADOR EUGENIO BARROS', 21),
(530, '2104628', 'GOVERNADOR LUIZ ROCHA', 21),
(531, '2104651', 'GOVERNADOR NEWTON BELLO', 21),
(532, '2104677', 'GOVERNADOR NUNES FREIRE', 21),
(533, '2104701', 'GRACA ARANHA', 21),
(534, '2104800', 'GRAJAU', 21),
(535, '2104909', 'GUIMARAES', 21),
(536, '2105005', 'HUMBERTO DE CAMPOS', 21),
(537, '2105104', 'ICATU', 21),
(538, '2105153', 'IGARAPE DO MEIO', 21),
(539, '2105203', 'IGARAPE GRANDE', 21),
(540, '2105302', 'IMPERATRIZ', 21),
(541, '2105351', 'ITAIPAVA DO GRAJAU', 21),
(542, '2105401', 'ITAPECURU MIRIM', 21),
(543, '2105427', 'ITINGA DO MARANHAO', 21),
(544, '2105450', 'JATOBA', 21),
(545, '2105476', 'JENIPAPO DOS VIEIRAS', 21),
(546, '2105500', 'JOAO LISBOA', 21),
(547, '2105609', 'JOSELANDIA', 21),
(548, '2105658', 'JUNCO DO MARANHAO', 21),
(549, '2105708', 'LAGO DA PEDRA', 21),
(550, '2105807', 'LAGO DO JUNCO', 21),
(551, '2105906', 'LAGO VERDE', 21),
(552, '2105922', 'LAGOA DO MATO', 21),
(553, '2105948', 'LAGO DOS RODRIGUES', 21),
(554, '2105963', 'LAGOA GRANDE DO MARANHAO', 21),
(555, '2105989', 'LAJEADO NOVO', 21),
(556, '2106003', 'LIMA CAMPOS', 21),
(557, '2106102', 'LORETO', 21),
(558, '2106201', 'LUIS DOMINGUES', 21),
(559, '2106300', 'MAGALHAES DE ALMEIDA', 21),
(560, '2106326', 'MARACACUME', 21),
(561, '2106359', 'MARAJA DO SENA', 21),
(562, '2106375', 'MARANHAOZINHO', 21),
(563, '2106409', 'MATA ROMA', 21),
(564, '2106508', 'MATINHA', 21),
(565, '2106607', 'MATOES', 21),
(566, '2106631', 'MATOES DO NORTE', 21),
(567, '2106672', 'MILAGRES DO MARANHAO', 21),
(568, '2106706', 'MIRADOR', 21),
(569, '2106755', 'MIRANDA DO NORTE', 21),
(570, '2106805', 'MIRINZAL', 21),
(571, '2106904', 'MONCAO', 21),
(572, '2107001', 'MONTES ALTOS', 21),
(573, '2107100', 'MORROS', 21),
(574, '2107209', 'NINA RODRIGUES', 21),
(575, '2107258', 'NOVA COLINAS', 21),
(576, '2107308', 'NOVA IORQUE', 21),
(577, '2107357', 'NOVA OLINDA DO MARANHAO', 21),
(578, '2107407', 'OLHO D\'AGUA DAS CUNHAS', 21),
(579, '2107456', 'OLINDA NOVA DO MARANHAO', 21),
(580, '2107506', 'PACO DO LUMIAR', 21),
(581, '2107605', 'PALMEIRANDIA', 21),
(582, '2107704', 'PARAIBANO', 21),
(583, '2107803', 'PARNARAMA', 21),
(584, '2107902', 'PASSAGEM FRANCA', 21),
(585, '2108009', 'PASTOS BONS', 21),
(586, '2108058', 'PAULINO NEVES', 21),
(587, '2108108', 'PAULO RAMOS', 21),
(588, '2108207', 'PEDREIRAS', 21),
(589, '2108256', 'PEDRO DO ROSARIO', 21),
(590, '2108306', 'PENALVA', 21),
(591, '2108405', 'PERI MIRIM', 21),
(592, '2108454', 'PERITORO', 21),
(593, '2108504', 'PINDARE-MIRIM', 21),
(594, '2108603', 'PINHEIRO', 21),
(595, '2108702', 'PIO XII', 21),
(596, '2108801', 'PIRAPEMAS', 21),
(597, '2108900', 'POCAO DE PEDRAS', 21),
(598, '2109007', 'PORTO FRANCO', 21),
(599, '2109056', 'PORTO RICO DO MARANHAO', 21),
(600, '2109106', 'PRESIDENTE DUTRA', 21),
(601, '2109205', 'PRESIDENTE JUSCELINO', 21),
(602, '2109239', 'PRESIDENTE MEDICI', 21),
(603, '2109270', 'PRESIDENTE SARNEY', 21),
(604, '2109304', 'PRESIDENTE VARGAS', 21),
(605, '2109403', 'PRIMEIRA CRUZ', 21),
(606, '2109452', 'RAPOSA', 21),
(607, '2109502', 'RIACHAO', 21),
(608, '2109551', 'RIBAMAR FIQUENE', 21),
(609, '2109601', 'ROSARIO', 21),
(610, '2109700', 'SAMBAIBA', 21),
(611, '2109759', 'SANTA FILOMENA DO MARANHAO', 21),
(612, '2109809', 'SANTA HELENA', 21),
(613, '2109908', 'SANTA INES', 21),
(614, '2110005', 'SANTA LUZIA', 21),
(615, '2110039', 'SANTA LUZIA DO PARUA', 21),
(616, '2110104', 'SANTA QUITERIA DO MARANHAO', 21),
(617, '2110203', 'SANTA RITA', 21),
(618, '2110237', 'SANTANA DO MARANHAO', 21),
(619, '2110278', 'SANTO AMARO DO MARANHAO', 21),
(620, '2110302', 'SANTO ANTONIO DOS LOPES', 21),
(621, '2110401', 'SAO BENEDITO DO RIO PRETO', 21),
(622, '2110500', 'SAO BENTO', 21),
(623, '2110609', 'SAO BERNARDO', 21),
(624, '2110658', 'SAO DOMINGOS DO AZEITAO', 21),
(625, '2110708', 'SAO DOMINGOS DO MARANHAO', 21),
(626, '2110807', 'SAO FELIX DE BALSAS', 21),
(627, '2110856', 'SAO FRANCISCO DO BREJAO', 21),
(628, '2110906', 'SAO FRANCISCO DO MARANHAO', 21),
(629, '2111003', 'SAO JOAO BATISTA', 21),
(630, '2111029', 'SAO JOAO DO CARU', 21),
(631, '2111052', 'SAO JOAO DO PARAISO', 21),
(632, '2111078', 'SAO JOAO DO SOTER', 21),
(633, '2111102', 'SAO JOAO DOS PATOS', 21),
(634, '2111201', 'SAO JOSE DE RIBAMAR', 21),
(635, '2111250', 'SAO JOSE DOS BASILIOS', 21),
(636, '2111300', 'SAO LUIS', 21),
(637, '2111409', 'SAO LUIS GONZAGA DO MARANHAO', 21),
(638, '2111508', 'SAO MATEUS DO MARANHAO', 21),
(639, '2111532', 'SAO PEDRO DA AGUA BRANCA', 21),
(640, '2111573', 'SAO PEDRO DOS CRENTES', 21),
(641, '2111607', 'SAO RAIMUNDO DAS MANGABEIRAS', 21),
(642, '2111631', 'SAO RAIMUNDO DO DOCA BEZERRA', 21),
(643, '2111672', 'SAO ROBERTO', 21),
(644, '2111706', 'SAO VICENTE FERRER', 21),
(645, '2111722', 'SATUBINHA', 21),
(646, '2111748', 'SENADOR ALEXANDRE COSTA', 21),
(647, '2111763', 'SENADOR LA ROCQUE', 21),
(648, '2111789', 'SERRANO DO MARANHAO', 21),
(649, '2111805', 'SITIO NOVO', 21),
(650, '2111904', 'SUCUPIRA DO NORTE', 21),
(651, '2111953', 'SUCUPIRA DO RIACHAO', 21),
(652, '2112001', 'TASSO FRAGOSO', 21),
(653, '2112100', 'TIMBIRAS', 21),
(654, '2112209', 'TIMON', 21),
(655, '2112233', 'TRIZIDELA DO VALE', 21),
(656, '2112274', 'TUFILANDIA', 21),
(657, '2112308', 'TUNTUM', 21),
(658, '2112407', 'TURIACU', 21),
(659, '2112456', 'TURILANDIA', 21),
(660, '2112506', 'TUTOIA', 21),
(661, '2112605', 'URBANO SANTOS', 21),
(662, '2112704', 'VARGEM GRANDE', 21),
(663, '2112803', 'VIANA', 21),
(664, '2112852', 'VILA NOVA DOS MARTIRIOS', 21),
(665, '2112902', 'VITORIA DO MEARIM', 21),
(666, '2113009', 'VITORINO FREIRE', 21),
(667, '2114007', 'ZE DOCA', 21),
(668, '2200053', 'ACAUA', 22),
(669, '2200103', 'AGRICOLANDIA', 22),
(670, '2200202', 'AGUA BRANCA', 22),
(671, '2200251', 'ALAGOINHA DO PIAUI', 22),
(672, '2200277', 'ALEGRETE DO PIAUI', 22),
(673, '2200301', 'ALTO LONGA', 22),
(674, '2200400', 'ALTOS', 22),
(675, '2200459', 'ALVORADA DO GURGUEIA', 22),
(676, '2200509', 'AMARANTE', 22),
(677, '2200608', 'ANGICAL DO PIAUI', 22),
(678, '2200707', 'ANISIO DE ABREU', 22),
(679, '2200806', 'ANTONIO ALMEIDA', 22),
(680, '2200905', 'AROAZES', 22),
(681, '2200954', 'AROEIRAS DO ITAIM', 22),
(682, '2201002', 'ARRAIAL', 22),
(683, '2201051', 'ASSUNCAO DO PIAUI', 22),
(684, '2201101', 'AVELINO LOPES', 22),
(685, '2201150', 'BAIXA GRANDE DO RIBEIRO', 22),
(686, '2201176', 'BARRA D\'ALCANTARA', 22),
(687, '2201200', 'BARRAS', 22),
(688, '2201309', 'BARREIRAS DO PIAUI', 22),
(689, '2201408', 'BARRO DURO', 22),
(690, '2201507', 'BATALHA', 22),
(691, '2201556', 'BELA VISTA DO PIAUI', 22),
(692, '2201572', 'BELEM DO PIAUI', 22),
(693, '2201606', 'BENEDITINOS', 22),
(694, '2201705', 'BERTOLINIA', 22),
(695, '2201739', 'BETANIA DO PIAUI', 22),
(696, '2201770', 'BOA HORA', 22),
(697, '2201804', 'BOCAINA', 22),
(698, '2201903', 'BOM JESUS', 22),
(699, '2201919', 'BOM PRINCIPIO DO PIAUI', 22),
(700, '2201929', 'BONFIM DO PIAUI', 22),
(701, '2201945', 'BOQUEIRAO DO PIAUI', 22),
(702, '2201960', 'BRASILEIRA', 22),
(703, '2201988', 'BREJO DO PIAUI', 22),
(704, '2202000', 'BURITI DOS LOPES', 22),
(705, '2202026', 'BURITI DOS MONTES', 22),
(706, '2202059', 'CABECEIRAS DO PIAUI', 22),
(707, '2202075', 'CAJAZEIRAS DO PIAUI', 22),
(708, '2202083', 'CAJUEIRO DA PRAIA', 22),
(709, '2202091', 'CALDEIRAO GRANDE DO PIAUI', 22),
(710, '2202109', 'CAMPINAS DO PIAUI', 22),
(711, '2202117', 'CAMPO ALEGRE DO FIDALGO', 22),
(712, '2202133', 'CAMPO GRANDE DO PIAUI', 22),
(713, '2202174', 'CAMPO LARGO DO PIAUI', 22),
(714, '2202208', 'CAMPO MAIOR', 22),
(715, '2202251', 'CANAVIEIRA', 22),
(716, '2202307', 'CANTO DO BURITI', 22),
(717, '2202406', 'CAPITAO DE CAMPOS', 22),
(718, '2202455', 'CAPITAO GERVASIO OLIVEIRA', 22),
(719, '2202505', 'CARACOL', 22),
(720, '2202539', 'CARAUBAS DO PIAUI', 22),
(721, '2202554', 'CARIDADE DO PIAUI', 22),
(722, '2202604', 'CASTELO DO PIAUI', 22),
(723, '2202653', 'CAXINGO', 22),
(724, '2202703', 'COCAL', 22),
(725, '2202711', 'COCAL DE TELHA', 22),
(726, '2202729', 'COCAL DOS ALVES', 22),
(727, '2202737', 'COIVARAS', 22),
(728, '2202752', 'COLONIA DO GURGUEIA', 22),
(729, '2202778', 'COLONIA DO PIAUI', 22),
(730, '2202802', 'CONCEICAO DO CANINDE', 22),
(731, '2202851', 'CORONEL JOSE DIAS', 22),
(732, '2202901', 'CORRENTE', 22),
(733, '2203008', 'CRISTALANDIA DO PIAUI', 22),
(734, '2203107', 'CRISTINO CASTRO', 22),
(735, '2203206', 'CURIMATA', 22),
(736, '2203230', 'CURRAIS', 22),
(737, '2203255', 'CURRALINHOS', 22),
(738, '2203271', 'CURRAL NOVO DO PIAUI', 22),
(739, '2203305', 'DEMERVAL LOBAO', 22),
(740, '2203354', 'DIRCEU ARCOVERDE', 22),
(741, '2203404', 'DOM EXPEDITO LOPES', 22),
(742, '2203420', 'DOMINGOS MOURAO', 22),
(743, '2203453', 'DOM INOCENCIO', 22),
(744, '2203503', 'ELESBAO VELOSO', 22),
(745, '2203602', 'ELISEU MARTINS', 22),
(746, '2203701', 'ESPERANTINA', 22),
(747, '2203750', 'FARTURA DO PIAUI', 22),
(748, '2203800', 'FLORES DO PIAUI', 22),
(749, '2203859', 'FLORESTA DO PIAUI', 22),
(750, '2203909', 'FLORIANO', 22),
(751, '2204006', 'FRANCINOPOLIS', 22),
(752, '2204105', 'FRANCISCO AYRES', 22),
(753, '2204154', 'FRANCISCO MACEDO', 22),
(754, '2204204', 'FRANCISCO SANTOS', 22),
(755, '2204303', 'FRONTEIRAS', 22),
(756, '2204352', 'GEMINIANO', 22),
(757, '2204402', 'GILBUES', 22),
(758, '2204501', 'GUADALUPE', 22),
(759, '2204550', 'GUARIBAS', 22),
(760, '2204600', 'HUGO NAPOLEAO', 22),
(761, '2204659', 'ILHA GRANDE', 22),
(762, '2204709', 'INHUMA', 22),
(763, '2204808', 'IPIRANGA DO PIAUI', 22),
(764, '2204907', 'ISAIAS COELHO', 22),
(765, '2205003', 'ITAINOPOLIS', 22),
(766, '2205102', 'ITAUEIRA', 22),
(767, '2205151', 'JACOBINA DO PIAUI', 22),
(768, '2205201', 'JAICOS', 22),
(769, '2205250', 'JARDIM DO MULATO', 22),
(770, '2205276', 'JATOBA DO PIAUI', 22),
(771, '2205300', 'JERUMENHA', 22),
(772, '2205359', 'JOAO COSTA', 22),
(773, '2205409', 'JOAQUIM PIRES', 22),
(774, '2205458', 'JOCA MARQUES', 22),
(775, '2205508', 'JOSE DE FREITAS', 22),
(776, '2205516', 'JUAZEIRO DO PIAUI', 22),
(777, '2205524', 'JULIO BORGES', 22),
(778, '2205532', 'JUREMA', 22),
(779, '2205540', 'LAGOINHA DO PIAUI', 22),
(780, '2205557', 'LAGOA ALEGRE', 22),
(781, '2205565', 'LAGOA DO BARRO DO PIAUI', 22),
(782, '2205573', 'LAGOA DE SAO FRANCISCO', 22),
(783, '2205581', 'LAGOA DO PIAUI', 22),
(784, '2205599', 'LAGOA DO SITIO', 22),
(785, '2205607', 'LANDRI SALES', 22),
(786, '2205706', 'LUIS CORREIA', 22),
(787, '2205805', 'LUZILANDIA', 22),
(788, '2205854', 'MADEIRO', 22),
(789, '2205904', 'MANOEL EMIDIO', 22),
(790, '2205953', 'MARCOLANDIA', 22),
(791, '2206001', 'MARCOS PARENTE', 22),
(792, '2206050', 'MASSAPE DO PIAUI', 22),
(793, '2206100', 'MATIAS OLIMPIO', 22),
(794, '2206209', 'MIGUEL ALVES', 22),
(795, '2206308', 'MIGUEL LEAO', 22),
(796, '2206357', 'MILTON BRANDAO', 22),
(797, '2206407', 'MONSENHOR GIL', 22),
(798, '2206506', 'MONSENHOR HIPOLITO', 22),
(799, '2206605', 'MONTE ALEGRE DO PIAUI', 22),
(800, '2206654', 'MORRO CABECA NO TEMPO', 22),
(801, '2206670', 'MORRO DO CHAPEU DO PIAUI', 22),
(802, '2206696', 'MURICI DOS PORTELAS', 22),
(803, '2206704', 'NAZARE DO PIAUI', 22),
(804, '2206720', 'NAZARIA', 22),
(805, '2206753', 'NOSSA SENHORA DE NAZARE', 22),
(806, '2206803', 'NOSSA SENHORA DOS REMEDIOS', 22),
(807, '2206902', 'NOVO ORIENTE DO PIAUI', 22),
(808, '2206951', 'NOVO SANTO ANTONIO', 22),
(809, '2207009', 'OEIRAS', 22),
(810, '2207108', 'OLHO D\'AGUA DO PIAUI', 22),
(811, '2207207', 'PADRE MARCOS', 22),
(812, '2207306', 'PAES LANDIM', 22),
(813, '2207355', 'PAJEU DO PIAUI', 22),
(814, '2207405', 'PALMEIRA DO PIAUI', 22),
(815, '2207504', 'PALMEIRAIS', 22),
(816, '2207553', 'PAQUETA', 22),
(817, '2207603', 'PARNAGUA', 22),
(818, '2207702', 'PARNAIBA', 22),
(819, '2207751', 'PASSAGEM FRANCA DO PIAUI', 22),
(820, '2207777', 'PATOS DO PIAUI', 22),
(821, '2207793', 'PAU D\'ARCO DO PIAUI', 22),
(822, '2207801', 'PAULISTANA', 22),
(823, '2207850', 'PAVUSSU', 22),
(824, '2207900', 'PEDRO II', 22),
(825, '2207934', 'PEDRO LAURENTINO', 22),
(826, '2207959', 'NOVA SANTA RITA', 22),
(827, '2208007', 'PICOS', 22),
(828, '2208106', 'PIMENTEIRAS', 22),
(829, '2208205', 'PIO IX', 22),
(830, '2208304', 'PIRACURUCA', 22),
(831, '2208403', 'PIRIPIRI', 22),
(832, '2208502', 'PORTO', 22),
(833, '2208551', 'PORTO ALEGRE DO PIAUI', 22),
(834, '2208601', 'PRATA DO PIAUI', 22),
(835, '2208650', 'QUEIMADA NOVA', 22),
(836, '2208700', 'REDENCAO DO GURGUEIA', 22),
(837, '2208809', 'REGENERACAO', 22),
(838, '2208858', 'RIACHO FRIO', 22),
(839, '2208874', 'RIBEIRA DO PIAUI', 22),
(840, '2208908', 'RIBEIRO GONCALVES', 22),
(841, '2209005', 'RIO GRANDE DO PIAUI', 22),
(842, '2209104', 'SANTA CRUZ DO PIAUI', 22),
(843, '2209153', 'SANTA CRUZ DOS MILAGRES', 22),
(844, '2209203', 'SANTA FILOMENA', 22),
(845, '2209302', 'SANTA LUZ', 22),
(846, '2209351', 'SANTANA DO PIAUI', 22),
(847, '2209377', 'SANTA ROSA DO PIAUI', 22),
(848, '2209401', 'SANTO ANTONIO DE LISBOA', 22),
(849, '2209450', 'SANTO ANTONIO DOS MILAGRES', 22),
(850, '2209500', 'SANTO INACIO DO PIAUI', 22),
(851, '2209559', 'SAO BRAZ DO PIAUI', 22),
(852, '2209609', 'SAO FELIX DO PIAUI', 22),
(853, '2209658', 'SAO FRANCISCO DE ASSIS DO PIAUI', 22),
(854, '2209708', 'SAO FRANCISCO DO PIAUI', 22),
(855, '2209757', 'SAO GONCALO DO GURGUEIA', 22),
(856, '2209807', 'SAO GONCALO DO PIAUI', 22),
(857, '2209856', 'SAO JOAO DA CANABRAVA', 22),
(858, '2209872', 'SAO JOAO DA FRONTEIRA', 22),
(859, '2209906', 'SAO JOAO DA SERRA', 22),
(860, '2209955', 'SAO JOAO DA VARJOTA', 22),
(861, '2209971', 'SAO JOAO DO ARRAIAL', 22),
(862, '2210003', 'SAO JOAO DO PIAUI', 22),
(863, '2210052', 'SAO JOSE DO DIVINO', 22),
(864, '2210102', 'SAO JOSE DO PEIXE', 22),
(865, '2210201', 'SAO JOSE DO PIAUI', 22),
(866, '2210300', 'SAO JULIAO', 22),
(867, '2210359', 'SAO LOURENCO DO PIAUI', 22),
(868, '2210375', 'SAO LUIS DO PIAUI', 22),
(869, '2210383', 'SAO MIGUEL DA BAIXA GRANDE', 22),
(870, '2210391', 'SAO MIGUEL DO FIDALGO', 22),
(871, '2210409', 'SAO MIGUEL DO TAPUIO', 22),
(872, '2210508', 'SAO PEDRO DO PIAUI', 22),
(873, '2210607', 'SAO RAIMUNDO NONATO', 22),
(874, '2210623', 'SEBASTIAO BARROS', 22),
(875, '2210631', 'SEBASTIAO LEAL', 22),
(876, '2210656', 'SIGEFREDO PACHECO', 22),
(877, '2210706', 'SIMOES', 22),
(878, '2210805', 'SIMPLICIO MENDES', 22),
(879, '2210904', 'SOCORRO DO PIAUI', 22),
(880, '2210938', 'SUSSUAPARA', 22),
(881, '2210953', 'TAMBORIL DO PIAUI', 22),
(882, '2210979', 'TANQUE DO PIAUI', 22),
(883, '2211001', 'TERESINA', 22),
(884, '2211100', 'UNIAO', 22),
(885, '2211209', 'URUCUI', 22),
(886, '2211308', 'VALENCA DO PIAUI', 22),
(887, '2211357', 'VARZEA BRANCA', 22),
(888, '2211407', 'VARZEA GRANDE', 22),
(889, '2211506', 'VERA MENDES', 22),
(890, '2211605', 'VILA NOVA DO PIAUI', 22),
(891, '2211704', 'WALL FERRAZ', 22),
(892, '2300101', 'ABAIARA', 23),
(893, '2300150', 'ACARAPE', 23),
(894, '2300200', 'ACARAU', 23),
(895, '2300309', 'ACOPIARA', 23),
(896, '2300408', 'AIUABA', 23),
(897, '2300507', 'ALCANTARAS', 23),
(898, '2300606', 'ALTANEIRA', 23),
(899, '2300705', 'ALTO SANTO', 23),
(900, '2300754', 'AMONTADA', 23),
(901, '2300804', 'ANTONINA DO NORTE', 23),
(902, '2300903', 'APUIARES', 23),
(903, '2301000', 'AQUIRAZ', 23),
(904, '2301109', 'ARACATI', 23),
(905, '2301208', 'ARACOIABA', 23),
(906, '2301257', 'ARARENDA', 23),
(907, '2301307', 'ARARIPE', 23),
(908, '2301406', 'ARATUBA', 23),
(909, '2301505', 'ARNEIROZ', 23),
(910, '2301604', 'ASSARE', 23),
(911, '2301703', 'AURORA', 23),
(912, '2301802', 'BAIXIO', 23),
(913, '2301851', 'BANABUIU', 23),
(914, '2301901', 'BARBALHA', 23),
(915, '2301950', 'BARREIRA', 23),
(916, '2302008', 'BARRO', 23),
(917, '2302057', 'BARROQUINHA', 23),
(918, '2302107', 'BATURITE', 23),
(919, '2302206', 'BEBERIBE', 23),
(920, '2302305', 'BELA CRUZ', 23),
(921, '2302404', 'BOA VIAGEM', 23),
(922, '2302503', 'BREJO SANTO', 23),
(923, '2302602', 'CAMOCIM', 23),
(924, '2302701', 'CAMPOS SALES', 23),
(925, '2302800', 'CANINDE', 23),
(926, '2302909', 'CAPISTRANO', 23),
(927, '2303006', 'CARIDADE', 23),
(928, '2303105', 'CARIRE', 23),
(929, '2303204', 'CARIRIACU', 23),
(930, '2303303', 'CARIUS', 23),
(931, '2303402', 'CARNAUBAL', 23),
(932, '2303501', 'CASCAVEL', 23),
(933, '2303600', 'CATARINA', 23),
(934, '2303659', 'CATUNDA', 23),
(935, '2303709', 'CAUCAIA', 23),
(936, '2303808', 'CEDRO', 23),
(937, '2303907', 'CHAVAL', 23),
(938, '2303931', 'CHORO', 23),
(939, '2303956', 'CHOROZINHO', 23),
(940, '2304004', 'COREAU', 23),
(941, '2304103', 'CRATEUS', 23),
(942, '2304202', 'CRATO', 23),
(943, '2304236', 'CROATA', 23),
(944, '2304251', 'CRUZ', 23),
(945, '2304269', 'DEPUTADO IRAPUAN PINHEIRO', 23),
(946, '2304277', 'ERERE', 23),
(947, '2304285', 'EUSEBIO', 23),
(948, '2304301', 'FARIAS BRITO', 23),
(949, '2304350', 'FORQUILHA', 23),
(950, '2304400', 'FORTALEZA', 23),
(951, '2304459', 'FORTIM', 23),
(952, '2304509', 'FRECHEIRINHA', 23),
(953, '2304608', 'GENERAL SAMPAIO', 23),
(954, '2304657', 'GRACA', 23),
(955, '2304707', 'GRANJA', 23),
(956, '2304806', 'GRANJEIRO', 23),
(957, '2304905', 'GROAIRAS', 23),
(958, '2304954', 'GUAIUBA', 23),
(959, '2305001', 'GUARACIABA DO NORTE', 23),
(960, '2305100', 'GUARAMIRANGA', 23),
(961, '2305209', 'HIDROLANDIA', 23),
(962, '2305233', 'HORIZONTE', 23),
(963, '2305266', 'IBARETAMA', 23),
(964, '2305308', 'IBIAPINA', 23),
(965, '2305332', 'IBICUITINGA', 23),
(966, '2305357', 'ICAPUI', 23),
(967, '2305407', 'ICO', 23),
(968, '2305506', 'IGUATU', 23),
(969, '2305605', 'INDEPENDENCIA', 23),
(970, '2305654', 'IPAPORANGA', 23),
(971, '2305704', 'IPAUMIRIM', 23),
(972, '2305803', 'IPU', 23),
(973, '2305902', 'IPUEIRAS', 23),
(974, '2306009', 'IRACEMA', 23),
(975, '2306108', 'IRAUCUBA', 23),
(976, '2306207', 'ITAICABA', 23),
(977, '2306256', 'ITAITINGA', 23),
(978, '2306306', 'ITAPAJE', 23),
(979, '2306405', 'ITAPIPOCA', 23),
(980, '2306504', 'ITAPIUNA', 23),
(981, '2306553', 'ITAREMA', 23),
(982, '2306603', 'ITATIRA', 23),
(983, '2306702', 'JAGUARETAMA', 23),
(984, '2306801', 'JAGUARIBARA', 23),
(985, '2306900', 'JAGUARIBE', 23),
(986, '2307007', 'JAGUARUANA', 23),
(987, '2307106', 'JARDIM', 23),
(988, '2307205', 'JATI', 23),
(989, '2307254', 'JIJOCA DE JERICOACOARA', 23),
(990, '2307304', 'JUAZEIRO DO NORTE', 23),
(991, '2307403', 'JUCAS', 23),
(992, '2307502', 'LAVRAS DA MANGABEIRA', 23),
(993, '2307601', 'LIMOEIRO DO NORTE', 23),
(994, '2307635', 'MADALENA', 23),
(995, '2307650', 'MARACANAU', 23),
(996, '2307700', 'MARANGUAPE', 23),
(997, '2307809', 'MARCO', 23),
(998, '2307908', 'MARTINOPOLE', 23),
(999, '2308005', 'MASSAPE', 23),
(1000, '2308104', 'MAURITI', 23),
(1001, '2308203', 'MERUOCA', 23),
(1002, '2308302', 'MILAGRES', 23),
(1003, '2308351', 'MILHA', 23),
(1004, '2308377', 'MIRAIMA', 23),
(1005, '2308401', 'MISSAO VELHA', 23),
(1006, '2308500', 'MOMBACA', 23),
(1007, '2308609', 'MONSENHOR TABOSA', 23),
(1008, '2308708', 'MORADA NOVA', 23),
(1009, '2308807', 'MORAUJO', 23),
(1010, '2308906', 'MORRINHOS', 23),
(1011, '2309003', 'MUCAMBO', 23),
(1012, '2309102', 'MULUNGU', 23),
(1013, '2309201', 'NOVA OLINDA', 23),
(1014, '2309300', 'NOVA RUSSAS', 23),
(1015, '2309409', 'NOVO ORIENTE', 23),
(1016, '2309458', 'OCARA', 23),
(1017, '2309508', 'OROS', 23),
(1018, '2309607', 'PACAJUS', 23),
(1019, '2309706', 'PACATUBA', 23),
(1020, '2309805', 'PACOTI', 23),
(1021, '2309904', 'PACUJA', 23),
(1022, '2310001', 'PALHANO', 23),
(1023, '2310100', 'PALMACIA', 23),
(1024, '2310209', 'PARACURU', 23),
(1025, '2310258', 'PARAIPABA', 23),
(1026, '2310308', 'PARAMBU', 23),
(1027, '2310407', 'PARAMOTI', 23),
(1028, '2310506', 'PEDRA BRANCA', 23),
(1029, '2310605', 'PENAFORTE', 23),
(1030, '2310704', 'PENTECOSTE', 23),
(1031, '2310803', 'PEREIRO', 23),
(1032, '2310852', 'PINDORETAMA', 23),
(1033, '2310902', 'PIQUET CARNEIRO', 23),
(1034, '2310951', 'PIRES FERREIRA', 23),
(1035, '2311009', 'PORANGA', 23),
(1036, '2311108', 'PORTEIRAS', 23),
(1037, '2311207', 'POTENGI', 23),
(1038, '2311231', 'POTIRETAMA', 23),
(1039, '2311264', 'QUITERIANOPOLIS', 23),
(1040, '2311306', 'QUIXADA', 23),
(1041, '2311355', 'QUIXELO', 23),
(1042, '2311405', 'QUIXERAMOBIM', 23),
(1043, '2311504', 'QUIXERE', 23),
(1044, '2311603', 'REDENCAO', 23),
(1045, '2311702', 'RERIUTABA', 23),
(1046, '2311801', 'RUSSAS', 23),
(1047, '2311900', 'SABOEIRO', 23),
(1048, '2311959', 'SALITRE', 23),
(1049, '2312007', 'SANTANA DO ACARAU', 23),
(1050, '2312106', 'SANTANA DO CARIRI', 23),
(1051, '2312205', 'SANTA QUITERIA', 23),
(1052, '2312304', 'SAO BENEDITO', 23),
(1053, '2312403', 'SAO GONCALO DO AMARANTE', 23),
(1054, '2312502', 'SAO JOAO DO JAGUARIBE', 23),
(1055, '2312601', 'SAO LUIS DO CURU', 23),
(1056, '2312700', 'SENADOR POMPEU', 23),
(1057, '2312809', 'SENADOR SA', 23),
(1058, '2312908', 'SOBRAL', 23),
(1059, '2313005', 'SOLONOPOLE', 23),
(1060, '2313104', 'TABULEIRO DO NORTE', 23),
(1061, '2313203', 'TAMBORIL', 23),
(1062, '2313252', 'TARRAFAS', 23),
(1063, '2313302', 'TAUA', 23),
(1064, '2313351', 'TEJUCUOCA', 23),
(1065, '2313401', 'TIANGUA', 23),
(1066, '2313500', 'TRAIRI', 23),
(1067, '2313559', 'TURURU', 23),
(1068, '2313609', 'UBAJARA', 23),
(1069, '2313708', 'UMARI', 23),
(1070, '2313757', 'UMIRIM', 23),
(1071, '2313807', 'URUBURETAMA', 23),
(1072, '2313906', 'URUOCA', 23),
(1073, '2313955', 'VARJOTA', 23),
(1074, '2314003', 'VARZEA ALEGRE', 23),
(1075, '2314102', 'VICOSA DO CEARA', 23),
(1076, '2400109', 'ACARI', 24),
(1077, '2400208', 'ACU', 24),
(1078, '2400307', 'AFONSO BEZERRA', 24),
(1079, '2400406', 'AGUA NOVA', 24),
(1080, '2400505', 'ALEXANDRIA', 24),
(1081, '2400604', 'ALMINO AFONSO', 24),
(1082, '2400703', 'ALTO DO RODRIGUES', 24),
(1083, '2400802', 'ANGICOS', 24),
(1084, '2400901', 'ANTONIO MARTINS', 24),
(1085, '2401008', 'APODI', 24),
(1086, '2401107', 'AREIA BRANCA', 24),
(1087, '2401206', 'ARES', 24),
(1088, '2401305', 'AUGUSTO SEVERO (CAMPO GRANDE)', 24),
(1089, '2401404', 'BAIA FORMOSA', 24),
(1090, '2401453', 'BARAUNA', 24),
(1091, '2401503', 'BARCELONA', 24),
(1092, '2401602', 'BENTO FERNANDES', 24),
(1093, '2401651', 'BODO', 24),
(1094, '2401701', 'BOM JESUS', 24),
(1095, '2401800', 'BREJINHO', 24),
(1096, '2401859', 'CAICARA DO NORTE', 24),
(1097, '2401909', 'CAICARA DO RIO DO VENTO', 24),
(1098, '2402006', 'CAICO', 24),
(1099, '2402105', 'CAMPO REDONDO', 24),
(1100, '2402204', 'CANGUARETAMA', 24),
(1101, '2402303', 'CARAUBAS', 24),
(1102, '2402402', 'CARNAUBA DOS DANTAS', 24),
(1103, '2402501', 'CARNAUBAIS', 24),
(1104, '2402600', 'CEARA-MIRIM', 24),
(1105, '2402709', 'CERRO CORA', 24),
(1106, '2402808', 'CORONEL EZEQUIEL', 24),
(1107, '2402907', 'CORONEL JOAO PESSOA', 24),
(1108, '2403004', 'CRUZETA', 24),
(1109, '2403103', 'CURRAIS NOVOS', 24),
(1110, '2403202', 'DOUTOR SEVERIANO', 24),
(1111, '2403251', 'PARNAMIRIM', 24),
(1112, '2403301', 'ENCANTO', 24),
(1113, '2403400', 'EQUADOR', 24),
(1114, '2403509', 'ESPIRITO SANTO', 24),
(1115, '2403608', 'EXTREMOZ', 24),
(1116, '2403707', 'FELIPE GUERRA', 24),
(1117, '2403756', 'FERNANDO PEDROZA', 24),
(1118, '2403806', 'FLORANIA', 24),
(1119, '2403905', 'FRANCISCO DANTAS', 24),
(1120, '2404002', 'FRUTUOSO GOMES', 24),
(1121, '2404101', 'GALINHOS', 24),
(1122, '2404200', 'GOIANINHA', 24),
(1123, '2404309', 'GOVERNADOR DIX-SEPT ROSADO', 24),
(1124, '2404408', 'GROSSOS', 24),
(1125, '2404507', 'GUAMARE', 24),
(1126, '2404606', 'IELMO MARINHO', 24),
(1127, '2404705', 'IPANGUACU', 24),
(1128, '2404804', 'IPUEIRA', 24),
(1129, '2404853', 'ITAJA', 24),
(1130, '2404903', 'ITAU', 24),
(1131, '2405009', 'JACANA', 24),
(1132, '2405108', 'JANDAIRA', 24),
(1133, '2405207', 'JANDUIS', 24),
(1134, '2405306', 'JANUARIO CICCO (BOA SAUDE)', 24),
(1135, '2405405', 'JAPI', 24),
(1136, '2405504', 'JARDIM DE ANGICOS', 24),
(1137, '2405603', 'JARDIM DE PIRANHAS', 24),
(1138, '2405702', 'JARDIM DO SERIDO', 24),
(1139, '2405801', 'JOAO CAMARA', 24),
(1140, '2405900', 'JOAO DIAS', 24),
(1141, '2406007', 'JOSE DA PENHA', 24),
(1142, '2406106', 'JUCURUTU', 24),
(1143, '2406155', 'JUNDIA', 24),
(1144, '2406205', 'LAGOA D\'ANTA', 24),
(1145, '2406304', 'LAGOA DE PEDRAS', 24),
(1146, '2406403', 'LAGOA DE VELHOS', 24),
(1147, '2406502', 'LAGOA NOVA', 24),
(1148, '2406601', 'LAGOA SALGADA', 24),
(1149, '2406700', 'LAJES', 24),
(1150, '2406809', 'LAJES PINTADAS', 24),
(1151, '2406908', 'LUCRECIA', 24),
(1152, '2407005', 'LUIS GOMES', 24),
(1153, '2407104', 'MACAIBA', 24),
(1154, '2407203', 'MACAU', 24),
(1155, '2407252', 'MAJOR SALES', 24),
(1156, '2407302', 'MARCELINO VIEIRA', 24),
(1157, '2407401', 'MARTINS', 24),
(1158, '2407500', 'MAXARANGUAPE', 24),
(1159, '2407609', 'MESSIAS TARGINO', 24),
(1160, '2407708', 'MONTANHAS', 24),
(1161, '2407807', 'MONTE ALEGRE', 24),
(1162, '2407906', 'MONTE DAS GAMELEIRAS', 24),
(1163, '2408003', 'MOSSORO', 24),
(1164, '2408102', 'NATAL', 24),
(1165, '2408201', 'NISIA FLORESTA', 24),
(1166, '2408300', 'NOVA CRUZ', 24),
(1167, '2408409', 'OLHO-D\'AGUA DO BORGES', 24),
(1168, '2408508', 'OURO BRANCO', 24),
(1169, '2408607', 'PARANA', 24),
(1170, '2408706', 'PARAU', 24),
(1171, '2408805', 'PARAZINHO', 24),
(1172, '2408904', 'PARELHAS', 24),
(1173, '2408953', 'RIO DO FOGO', 24),
(1174, '2409100', 'PASSA E FICA', 24),
(1175, '2409209', 'PASSAGEM', 24),
(1176, '2409308', 'PATU', 24),
(1177, '2409332', 'SANTA MARIA', 24),
(1178, '2409407', 'PAU DOS FERROS', 24),
(1179, '2409506', 'PEDRA GRANDE', 24),
(1180, '2409605', 'PEDRA PRETA', 24),
(1181, '2409704', 'PEDRO AVELINO', 24),
(1182, '2409803', 'PEDRO VELHO', 24),
(1183, '2409902', 'PENDENCIAS', 24),
(1184, '2410009', 'PILOES', 24),
(1185, '2410108', 'POCO BRANCO', 24),
(1186, '2410207', 'PORTALEGRE', 24),
(1187, '2410256', 'PORTO DO MANGUE', 24),
(1188, '2410306', 'SERRA CAIADA', 24),
(1189, '2410405', 'PUREZA', 24),
(1190, '2410504', 'RAFAEL FERNANDES', 24),
(1191, '2410603', 'RAFAEL GODEIRO', 24),
(1192, '2410702', 'RIACHO DA CRUZ', 24),
(1193, '2410801', 'RIACHO DE SANTANA', 24),
(1194, '2410900', 'RIACHUELO', 24),
(1195, '2411007', 'RODOLFO FERNANDES', 24),
(1196, '2411056', 'TIBAU', 24),
(1197, '2411106', 'RUY BARBOSA', 24),
(1198, '2411205', 'SANTA CRUZ', 24),
(1199, '2411403', 'SANTANA DO MATOS', 24),
(1200, '2411429', 'SANTANA DO SERIDO', 24),
(1201, '2411502', 'SANTO ANTONIO', 24),
(1202, '2411601', 'SAO BENTO DO NORTE', 24),
(1203, '2411700', 'SAO BENTO DO TRAIRI', 24),
(1204, '2411809', 'SAO FERNANDO', 24),
(1205, '2411908', 'SAO FRANCISCO DO OESTE', 24),
(1206, '2412005', 'SAO GONCALO DO AMARANTE', 24),
(1207, '2412104', 'SAO JOAO DO SABUGI', 24),
(1208, '2412203', 'SAO JOSE DE MIPIBU', 24),
(1209, '2412302', 'SAO JOSE DO CAMPESTRE', 24),
(1210, '2412401', 'SAO JOSE DO SERIDO', 24),
(1211, '2412500', 'SAO MIGUEL', 24),
(1212, '2412559', 'SAO MIGUEL DO GOSTOSO', 24),
(1213, '2412609', 'SAO PAULO DO POTENGI', 24),
(1214, '2412708', 'SAO PEDRO', 24),
(1215, '2412807', 'SAO RAFAEL', 24),
(1216, '2412906', 'SAO TOME', 24),
(1217, '2413003', 'SAO VICENTE', 24),
(1218, '2413102', 'SENADOR ELOI DE SOUZA', 24),
(1219, '2413201', 'SENADOR GEORGINO AVELINO', 24),
(1220, '2413300', 'SERRA DE SAO BENTO', 24),
(1221, '2413359', 'SERRA DO MEL', 24),
(1222, '2413409', 'SERRA NEGRA DO NORTE', 24),
(1223, '2413508', 'SERRINHA', 24),
(1224, '2413557', 'SERRINHA DOS PINTOS', 24),
(1225, '2413607', 'SEVERIANO MELO', 24),
(1226, '2413706', 'SITIO NOVO', 24),
(1227, '2413805', 'TABOLEIRO GRANDE', 24),
(1228, '2413904', 'TAIPU', 24),
(1229, '2414001', 'TANGARA', 24),
(1230, '2414100', 'TENENTE ANANIAS', 24),
(1231, '2414159', 'TENENTE LAURENTINO CRUZ', 24),
(1232, '2414209', 'TIBAU DO SUL', 24),
(1233, '2414308', 'TIMBAUBA DOS BATISTAS', 24),
(1234, '2414407', 'TOUROS', 24),
(1235, '2414456', 'TRIUNFO POTIGUAR', 24),
(1236, '2414506', 'UMARIZAL', 24),
(1237, '2414605', 'UPANEMA', 24),
(1238, '2414704', 'VARZEA', 24),
(1239, '2414753', 'VENHA-VER', 24),
(1240, '2414803', 'VERA CRUZ', 24),
(1241, '2414902', 'VICOSA', 24),
(1242, '2415008', 'VILA FLOR', 24),
(1243, '2500106', 'AGUA BRANCA', 25),
(1244, '2500205', 'AGUIAR', 25),
(1245, '2500304', 'ALAGOA GRANDE', 25),
(1246, '2500403', 'ALAGOA NOVA', 25),
(1247, '2500502', 'ALAGOINHA', 25),
(1248, '2500536', 'ALCANTIL', 25),
(1249, '2500577', 'ALGODAO DE JANDAIRA', 25),
(1250, '2500601', 'ALHANDRA', 25),
(1251, '2500700', 'SAO JOAO DO RIO DO PEIXE', 25),
(1252, '2500734', 'AMPARO', 25),
(1253, '2500775', 'APARECIDA', 25),
(1254, '2500809', 'ARACAGI', 25),
(1255, '2500908', 'ARARA', 25),
(1256, '2501005', 'ARARUNA', 25),
(1257, '2501104', 'AREIA', 25),
(1258, '2501153', 'AREIA DE BARAUNAS', 25),
(1259, '2501203', 'AREIAL', 25),
(1260, '2501302', 'AROEIRAS', 25),
(1261, '2501351', 'ASSUNCAO', 25),
(1262, '2501401', 'BAIA DA TRAICAO', 25),
(1263, '2501500', 'BANANEIRAS', 25),
(1264, '2501534', 'BARAUNA', 25),
(1265, '2501575', 'BARRA DE SANTANA', 25),
(1266, '2501609', 'BARRA DE SANTA ROSA', 25),
(1267, '2501708', 'BARRA DE SAO MIGUEL', 25),
(1268, '2501807', 'BAYEUX', 25),
(1269, '2501906', 'BELEM', 25),
(1270, '2502003', 'BELEM DO BREJO DO CRUZ', 25),
(1271, '2502052', 'BERNARDINO BATISTA', 25),
(1272, '2502102', 'BOA VENTURA', 25),
(1273, '2502151', 'BOA VISTA', 25),
(1274, '2502201', 'BOM JESUS', 25),
(1275, '2502300', 'BOM SUCESSO', 25),
(1276, '2502409', 'BONITO DE SANTA FE', 25),
(1277, '2502508', 'BOQUEIRAO', 25),
(1278, '2502607', 'IGARACY', 25),
(1279, '2502706', 'BORBOREMA', 25),
(1280, '2502805', 'BREJO DO CRUZ', 25),
(1281, '2502904', 'BREJO DOS SANTOS', 25),
(1282, '2503001', 'CAAPORA', 25),
(1283, '2503100', 'CABACEIRAS', 25),
(1284, '2503209', 'CABEDELO', 25),
(1285, '2503308', 'CACHOEIRA DOS INDIOS', 25),
(1286, '2503407', 'CACIMBA DE AREIA', 25),
(1287, '2503506', 'CACIMBA DE DENTRO', 25),
(1288, '2503555', 'CACIMBAS', 25),
(1289, '2503605', 'CAICARA', 25),
(1290, '2503704', 'CAJAZEIRAS', 25),
(1291, '2503753', 'CAJAZEIRINHAS', 25),
(1292, '2503803', 'CALDAS BRANDAO', 25),
(1293, '2503902', 'CAMALAU', 25),
(1294, '2504009', 'CAMPINA GRANDE', 25),
(1295, '2504033', 'CAPIM', 25),
(1296, '2504074', 'CARAUBAS', 25),
(1297, '2504108', 'CARRAPATEIRA', 25),
(1298, '2504157', 'CASSERENGUE', 25),
(1299, '2504207', 'CATINGUEIRA', 25),
(1300, '2504306', 'CATOLE DO ROCHA', 25),
(1301, '2504355', 'CATURITE', 25),
(1302, '2504405', 'CONCEICAO', 25),
(1303, '2504504', 'CONDADO', 25),
(1304, '2504603', 'CONDE', 25),
(1305, '2504702', 'CONGO', 25),
(1306, '2504801', 'COREMAS', 25),
(1307, '2504850', 'COXIXOLA', 25),
(1308, '2504900', 'CRUZ DO ESPIRITO SANTO', 25),
(1309, '2505006', 'CUBATI', 25),
(1310, '2505105', 'CUITE', 25),
(1311, '2505204', 'CUITEGI', 25),
(1312, '2505238', 'CUITE DE MAMANGUAPE', 25),
(1313, '2505279', 'CURRAL DE CIMA', 25),
(1314, '2505303', 'CURRAL VELHO', 25),
(1315, '2505352', 'DAMIAO', 25),
(1316, '2505402', 'DESTERRO', 25),
(1317, '2505501', 'VISTA SERRANA', 25),
(1318, '2505600', 'DIAMANTE', 25),
(1319, '2505709', 'DONA INES', 25),
(1320, '2505808', 'DUAS ESTRADAS', 25),
(1321, '2505907', 'EMAS', 25),
(1322, '2506004', 'ESPERANCA', 25),
(1323, '2506103', 'FAGUNDES', 25),
(1324, '2506202', 'FREI MARTINHO', 25),
(1325, '2506251', 'GADO BRAVO', 25),
(1326, '2506301', 'GUARABIRA', 25),
(1327, '2506400', 'GURINHEM', 25),
(1328, '2506509', 'GURJAO', 25),
(1329, '2506608', 'IBIARA', 25),
(1330, '2506707', 'IMACULADA', 25),
(1331, '2506806', 'INGA', 25),
(1332, '2506905', 'ITABAIANA', 25),
(1333, '2507002', 'ITAPORANGA', 25),
(1334, '2507101', 'ITAPOROROCA', 25),
(1335, '2507200', 'ITATUBA', 25),
(1336, '2507309', 'JACARAU', 25),
(1337, '2507408', 'JERICO', 25),
(1338, '2507507', 'JOAO PESSOA', 25),
(1339, '2507606', 'JUAREZ TAVORA', 25),
(1340, '2507705', 'JUAZEIRINHO', 25),
(1341, '2507804', 'JUNCO DO SERIDO', 25),
(1342, '2507903', 'JURIPIRANGA', 25),
(1343, '2508000', 'JURU', 25),
(1344, '2508109', 'LAGOA', 25),
(1345, '2508208', 'LAGOA DE DENTRO', 25),
(1346, '2508307', 'LAGOA SECA', 25),
(1347, '2508406', 'LASTRO', 25),
(1348, '2508505', 'LIVRAMENTO', 25),
(1349, '2508554', 'LOGRADOURO', 25),
(1350, '2508604', 'LUCENA', 25),
(1351, '2508703', 'MAE D\'AGUA', 25),
(1352, '2508802', 'MALTA', 25),
(1353, '2508901', 'MAMANGUAPE', 25),
(1354, '2509008', 'MANAIRA', 25),
(1355, '2509057', 'MARCACAO', 25),
(1356, '2509107', 'MARI', 25),
(1357, '2509156', 'MARIZOPOLIS', 25),
(1358, '2509206', 'MASSARANDUBA', 25),
(1359, '2509305', 'MATARACA', 25),
(1360, '2509339', 'MATINHAS', 25),
(1361, '2509370', 'MATO GROSSO', 25),
(1362, '2509396', 'MATUREIA', 25),
(1363, '2509404', 'MOGEIRO', 25),
(1364, '2509503', 'MONTADAS', 25),
(1365, '2509602', 'MONTE HOREBE', 25),
(1366, '2509701', 'MONTEIRO', 25),
(1367, '2509800', 'MULUNGU', 25),
(1368, '2509909', 'NATUBA', 25),
(1369, '2510006', 'NAZAREZINHO', 25),
(1370, '2510105', 'NOVA FLORESTA', 25),
(1371, '2510204', 'NOVA OLINDA', 25),
(1372, '2510303', 'NOVA PALMEIRA', 25);
INSERT INTO `territories` (`id`, `code_ibge`, `name`, `uf_id`) VALUES
(1373, '2510402', 'OLHO D\'AGUA', 25),
(1374, '2510501', 'OLIVEDOS', 25),
(1375, '2510600', 'OURO VELHO', 25),
(1376, '2510659', 'PARARI', 25),
(1377, '2510709', 'PASSAGEM', 25),
(1378, '2510808', 'PATOS', 25),
(1379, '2510907', 'PAULISTA', 25),
(1380, '2511004', 'PEDRA BRANCA', 25),
(1381, '2511103', 'PEDRA LAVRADA', 25),
(1382, '2511202', 'PEDRAS DE FOGO', 25),
(1383, '2511301', 'PIANCO', 25),
(1384, '2511400', 'PICUI', 25),
(1385, '2511509', 'PILAR', 25),
(1386, '2511608', 'PILOES', 25),
(1387, '2511707', 'PILOEZINHOS', 25),
(1388, '2511806', 'PIRPIRITUBA', 25),
(1389, '2511905', 'PITIMBU', 25),
(1390, '2512002', 'POCINHOS', 25),
(1391, '2512036', 'POCO DANTAS', 25),
(1392, '2512077', 'POCO DE JOSE DE MOURA', 25),
(1393, '2512101', 'POMBAL', 25),
(1394, '2512200', 'PRATA', 25),
(1395, '2512309', 'PRINCESA ISABEL', 25),
(1396, '2512408', 'PUXINANA', 25),
(1397, '2512507', 'QUEIMADAS', 25),
(1398, '2512606', 'QUIXABA', 25),
(1399, '2512705', 'REMIGIO', 25),
(1400, '2512721', 'PEDRO REGIS', 25),
(1401, '2512747', 'RIACHAO', 25),
(1402, '2512754', 'RIACHAO DO BACAMARTE', 25),
(1403, '2512762', 'RIACHAO DO POCO', 25),
(1404, '2512788', 'RIACHO DE SANTO ANTONIO', 25),
(1405, '2512804', 'RIACHO DOS CAVALOS', 25),
(1406, '2512903', 'RIO TINTO', 25),
(1407, '2513000', 'SALGADINHO', 25),
(1408, '2513109', 'SALGADO DE SAO FELIX', 25),
(1409, '2513158', 'SANTA CECILIA', 25),
(1410, '2513208', 'SANTA CRUZ', 25),
(1411, '2513307', 'SANTA HELENA', 25),
(1412, '2513356', 'SANTA INES', 25),
(1413, '2513406', 'SANTA LUZIA', 25),
(1414, '2513505', 'SANTANA DE MANGUEIRA', 25),
(1415, '2513604', 'SANTANA DOS GARROTES', 25),
(1416, '2513653', 'JOCA CLAUDINO', 25),
(1417, '2513703', 'SANTA RITA', 25),
(1418, '2513802', 'SANTA TERESINHA', 25),
(1419, '2513851', 'SANTO ANDRE', 25),
(1420, '2513901', 'SAO BENTO', 25),
(1421, '2513927', 'SAO BENTINHO', 25),
(1422, '2513943', 'SAO DOMINGOS DO CARIRI', 25),
(1423, '2513968', 'SAO DOMINGOS', 25),
(1424, '2513984', 'SAO FRANCISCO', 25),
(1425, '2514008', 'SAO JOAO DO CARIRI', 25),
(1426, '2514107', 'SAO JOAO DO TIGRE', 25),
(1427, '2514206', 'SAO JOSE DA LAGOA TAPADA', 25),
(1428, '2514305', 'SAO JOSE DE CAIANA', 25),
(1429, '2514404', 'SAO JOSE DE ESPINHARAS', 25),
(1430, '2514453', 'SAO JOSE DOS RAMOS', 25),
(1431, '2514503', 'SAO JOSE DE PIRANHAS', 25),
(1432, '2514552', 'SAO JOSE DE PRINCESA', 25),
(1433, '2514602', 'SAO JOSE DO BONFIM', 25),
(1434, '2514651', 'SAO JOSE DO BREJO DO CRUZ', 25),
(1435, '2514701', 'SAO JOSE DO SABUGI', 25),
(1436, '2514800', 'SAO JOSE DOS CORDEIROS', 25),
(1437, '2514909', 'SAO MAMEDE', 25),
(1438, '2515005', 'SAO MIGUEL DE TAIPU', 25),
(1439, '2515104', 'SAO SEBASTIAO DE LAGOA DE ROCA', 25),
(1440, '2515203', 'SAO SEBASTIAO DO UMBUZEIRO', 25),
(1441, '2515302', 'SAPE', 25),
(1442, '2515401', 'SAO VICENTE DO SERIDO', 25),
(1443, '2515500', 'SERRA BRANCA', 25),
(1444, '2515609', 'SERRA DA RAIZ', 25),
(1445, '2515708', 'SERRA GRANDE', 25),
(1446, '2515807', 'SERRA REDONDA', 25),
(1447, '2515906', 'SERRARIA', 25),
(1448, '2515930', 'SERTAOZINHO', 25),
(1449, '2515971', 'SOBRADO', 25),
(1450, '2516003', 'SOLANEA', 25),
(1451, '2516102', 'SOLEDADE', 25),
(1452, '2516151', 'SOSSEGO', 25),
(1453, '2516201', 'SOUSA', 25),
(1454, '2516300', 'SUME', 25),
(1455, '2516409', 'TACIMA', 25),
(1456, '2516508', 'TAPEROA', 25),
(1457, '2516607', 'TAVARES', 25),
(1458, '2516706', 'TEIXEIRA', 25),
(1459, '2516755', 'TENORIO', 25),
(1460, '2516805', 'TRIUNFO', 25),
(1461, '2516904', 'UIRAUNA', 25),
(1462, '2517001', 'UMBUZEIRO', 25),
(1463, '2517100', 'VARZEA', 25),
(1464, '2517209', 'VIEIROPOLIS', 25),
(1465, '2517407', 'ZABELE', 25),
(1466, '2600054', 'ABREU E LIMA', 26),
(1467, '2600104', 'AFOGADOS DA INGAZEIRA', 26),
(1468, '2600203', 'AFRANIO', 26),
(1469, '2600302', 'AGRESTINA', 26),
(1470, '2600401', 'AGUA PRETA', 26),
(1471, '2600500', 'AGUAS BELAS', 26),
(1472, '2600609', 'ALAGOINHA', 26),
(1473, '2600708', 'ALIANCA', 26),
(1474, '2600807', 'ALTINHO', 26),
(1475, '2600906', 'AMARAJI', 26),
(1476, '2601003', 'ANGELIM', 26),
(1477, '2601052', 'ARACOIABA', 26),
(1478, '2601102', 'ARARIPINA', 26),
(1479, '2601201', 'ARCOVERDE', 26),
(1480, '2601300', 'BARRA DE GUABIRABA', 26),
(1481, '2601409', 'BARREIROS', 26),
(1482, '2601508', 'BELEM DE MARIA', 26),
(1483, '2601607', 'BELEM DO SAO FRANCISCO', 26),
(1484, '2601706', 'BELO JARDIM', 26),
(1485, '2601805', 'BETANIA', 26),
(1486, '2601904', 'BEZERROS', 26),
(1487, '2602001', 'BODOCO', 26),
(1488, '2602100', 'BOM CONSELHO', 26),
(1489, '2602209', 'BOM JARDIM', 26),
(1490, '2602308', 'BONITO', 26),
(1491, '2602407', 'BREJAO', 26),
(1492, '2602506', 'BREJINHO', 26),
(1493, '2602605', 'BREJO DA MADRE DE DEUS', 26),
(1494, '2602704', 'BUENOS AIRES', 26),
(1495, '2602803', 'BUIQUE', 26),
(1496, '2602902', 'CABO DE SANTO AGOSTINHO', 26),
(1497, '2603009', 'CABROBO', 26),
(1498, '2603108', 'CACHOEIRINHA', 26),
(1499, '2603207', 'CAETES', 26),
(1500, '2603306', 'CALCADO', 26),
(1501, '2603405', 'CALUMBI', 26),
(1502, '2603454', 'CAMARAGIBE', 26),
(1503, '2603504', 'CAMOCIM DE SAO FELIX', 26),
(1504, '2603603', 'CAMUTANGA', 26),
(1505, '2603702', 'CANHOTINHO', 26),
(1506, '2603801', 'CAPOEIRAS', 26),
(1507, '2603900', 'CARNAIBA', 26),
(1508, '2603926', 'CARNAUBEIRA DA PENHA', 26),
(1509, '2604007', 'CARPINA', 26),
(1510, '2604106', 'CARUARU', 26),
(1511, '2604155', 'CASINHAS', 26),
(1512, '2604205', 'CATENDE', 26),
(1513, '2604304', 'CEDRO', 26),
(1514, '2604403', 'CHA DE ALEGRIA', 26),
(1515, '2604502', 'CHA GRANDE', 26),
(1516, '2604601', 'CONDADO', 26),
(1517, '2604700', 'CORRENTES', 26),
(1518, '2604809', 'CORTES', 26),
(1519, '2604908', 'CUMARU', 26),
(1520, '2605004', 'CUPIRA', 26),
(1521, '2605103', 'CUSTODIA', 26),
(1522, '2605152', 'DORMENTES', 26),
(1523, '2605202', 'ESCADA', 26),
(1524, '2605301', 'EXU', 26),
(1525, '2605400', 'FEIRA NOVA', 26),
(1526, '2605459', 'FERNANDO DE NORONHA', 26),
(1527, '2605509', 'FERREIROS', 26),
(1528, '2605608', 'FLORES', 26),
(1529, '2605707', 'FLORESTA', 26),
(1530, '2605806', 'FREI MIGUELINHO', 26),
(1531, '2605905', 'GAMELEIRA', 26),
(1532, '2606002', 'GARANHUNS', 26),
(1533, '2606101', 'GLORIA DO GOITA', 26),
(1534, '2606200', 'GOIANA', 26),
(1535, '2606309', 'GRANITO', 26),
(1536, '2606408', 'GRAVATA', 26),
(1537, '2606507', 'IATI', 26),
(1538, '2606606', 'IBIMIRIM', 26),
(1539, '2606705', 'IBIRAJUBA', 26),
(1540, '2606804', 'IGARASSU', 26),
(1541, '2606903', 'IGUARACY', 26),
(1542, '2607000', 'INAJA', 26),
(1543, '2607109', 'INGAZEIRA', 26),
(1544, '2607208', 'IPOJUCA', 26),
(1545, '2607307', 'IPUBI', 26),
(1546, '2607406', 'ITACURUBA', 26),
(1547, '2607505', 'ITAIBA', 26),
(1548, '2607604', 'ILHA DE ITAMARACA', 26),
(1549, '2607653', 'ITAMBE', 26),
(1550, '2607703', 'ITAPETIM', 26),
(1551, '2607752', 'ITAPISSUMA', 26),
(1552, '2607802', 'ITAQUITINGA', 26),
(1553, '2607901', 'JABOATAO DOS GUARARAPES', 26),
(1554, '2607950', 'JAQUEIRA', 26),
(1555, '2608008', 'JATAUBA', 26),
(1556, '2608057', 'JATOBA', 26),
(1557, '2608107', 'JOAO ALFREDO', 26),
(1558, '2608206', 'JOAQUIM NABUCO', 26),
(1559, '2608255', 'JUCATI', 26),
(1560, '2608305', 'JUPI', 26),
(1561, '2608404', 'JUREMA', 26),
(1562, '2608453', 'LAGOA DO CARRO', 26),
(1563, '2608503', 'LAGOA DE ITAENGA', 26),
(1564, '2608602', 'LAGOA DO OURO', 26),
(1565, '2608701', 'LAGOA DOS GATOS', 26),
(1566, '2608750', 'LAGOA GRANDE', 26),
(1567, '2608800', 'LAJEDO', 26),
(1568, '2608909', 'LIMOEIRO', 26),
(1569, '2609006', 'MACAPARANA', 26),
(1570, '2609105', 'MACHADOS', 26),
(1571, '2609154', 'MANARI', 26),
(1572, '2609204', 'MARAIAL', 26),
(1573, '2609303', 'MIRANDIBA', 26),
(1574, '2609402', 'MORENO', 26),
(1575, '2609501', 'NAZARE DA MATA', 26),
(1576, '2609600', 'OLINDA', 26),
(1577, '2609709', 'OROBO', 26),
(1578, '2609808', 'OROCO', 26),
(1579, '2609907', 'OURICURI', 26),
(1580, '2610004', 'PALMARES', 26),
(1581, '2610103', 'PALMEIRINA', 26),
(1582, '2610202', 'PANELAS', 26),
(1583, '2610301', 'PARANATAMA', 26),
(1584, '2610400', 'PARNAMIRIM', 26),
(1585, '2610509', 'PASSIRA', 26),
(1586, '2610608', 'PAUDALHO', 26),
(1587, '2610707', 'PAULISTA', 26),
(1588, '2610806', 'PEDRA', 26),
(1589, '2610905', 'PESQUEIRA', 26),
(1590, '2611002', 'PETROLANDIA', 26),
(1591, '2611101', 'PETROLINA', 26),
(1592, '2611200', 'POCAO', 26),
(1593, '2611309', 'POMBOS', 26),
(1594, '2611408', 'PRIMAVERA', 26),
(1595, '2611507', 'QUIPAPA', 26),
(1596, '2611533', 'QUIXABA', 26),
(1597, '2611606', 'RECIFE', 26),
(1598, '2611705', 'RIACHO DAS ALMAS', 26),
(1599, '2611804', 'RIBEIRAO', 26),
(1600, '2611903', 'RIO FORMOSO', 26),
(1601, '2612000', 'SAIRE', 26),
(1602, '2612109', 'SALGADINHO', 26),
(1603, '2612208', 'SALGUEIRO', 26),
(1604, '2612307', 'SALOA', 26),
(1605, '2612406', 'SANHARO', 26),
(1606, '2612455', 'SANTA CRUZ', 26),
(1607, '2612471', 'SANTA CRUZ DA BAIXA VERDE', 26),
(1608, '2612505', 'SANTA CRUZ DO CAPIBARIBE', 26),
(1609, '2612554', 'SANTA FILOMENA', 26),
(1610, '2612604', 'SANTA MARIA DA BOA VISTA', 26),
(1611, '2612703', 'SANTA MARIA DO CAMBUCA', 26),
(1612, '2612802', 'SANTA TEREZINHA', 26),
(1613, '2612901', 'SAO BENEDITO DO SUL', 26),
(1614, '2613008', 'SAO BENTO DO UNA', 26),
(1615, '2613107', 'SAO CAETANO', 26),
(1616, '2613206', 'SAO JOAO', 26),
(1617, '2613305', 'SAO JOAQUIM DO MONTE', 26),
(1618, '2613404', 'SAO JOSE DA COROA GRANDE', 26),
(1619, '2613503', 'SAO JOSE DO BELMONTE', 26),
(1620, '2613602', 'SAO JOSE DO EGITO', 26),
(1621, '2613701', 'SAO LOURENCO DA MATA', 26),
(1622, '2613800', 'SAO VICENTE FERRER', 26),
(1623, '2613909', 'SERRA TALHADA', 26),
(1624, '2614006', 'SERRITA', 26),
(1625, '2614105', 'SERTANIA', 26),
(1626, '2614204', 'SIRINHAEM', 26),
(1627, '2614303', 'MOREILANDIA', 26),
(1628, '2614402', 'SOLIDAO', 26),
(1629, '2614501', 'SURUBIM', 26),
(1630, '2614600', 'TABIRA', 26),
(1631, '2614709', 'TACAIMBO', 26),
(1632, '2614808', 'TACARATU', 26),
(1633, '2614857', 'TAMANDARE', 26),
(1634, '2615003', 'TAQUARITINGA DO NORTE', 26),
(1635, '2615102', 'TEREZINHA', 26),
(1636, '2615201', 'TERRA NOVA', 26),
(1637, '2615300', 'TIMBAUBA', 26),
(1638, '2615409', 'TORITAMA', 26),
(1639, '2615508', 'TRACUNHAEM', 26),
(1640, '2615607', 'TRINDADE', 26),
(1641, '2615706', 'TRIUNFO', 26),
(1642, '2615805', 'TUPANATINGA', 26),
(1643, '2615904', 'TUPARETAMA', 26),
(1644, '2616001', 'VENTUROSA', 26),
(1645, '2616100', 'VERDEJANTE', 26),
(1646, '2616183', 'VERTENTE DO LERIO', 26),
(1647, '2616209', 'VERTENTES', 26),
(1648, '2616308', 'VICENCIA', 26),
(1649, '2616407', 'VITORIA DE SANTO ANTAO', 26),
(1650, '2616506', 'XEXEU', 26),
(1651, '2700102', 'AGUA BRANCA', 27),
(1652, '2700201', 'ANADIA', 27),
(1653, '2700300', 'ARAPIRACA', 27),
(1654, '2700409', 'ATALAIA', 27),
(1655, '2700508', 'BARRA DE SANTO ANTONIO', 27),
(1656, '2700607', 'BARRA DE SAO MIGUEL', 27),
(1657, '2700706', 'BATALHA', 27),
(1658, '2700805', 'BELEM', 27),
(1659, '2700904', 'BELO MONTE', 27),
(1660, '2701001', 'BOCA DA MATA', 27),
(1661, '2701100', 'BRANQUINHA', 27),
(1662, '2701209', 'CACIMBINHAS', 27),
(1663, '2701308', 'CAJUEIRO', 27),
(1664, '2701357', 'CAMPESTRE', 27),
(1665, '2701407', 'CAMPO ALEGRE', 27),
(1666, '2701506', 'CAMPO GRANDE', 27),
(1667, '2701605', 'CANAPI', 27),
(1668, '2701704', 'CAPELA', 27),
(1669, '2701803', 'CARNEIROS', 27),
(1670, '2701902', 'CHA PRETA', 27),
(1671, '2702009', 'COITE DO NOIA', 27),
(1672, '2702108', 'COLONIA LEOPOLDINA', 27),
(1673, '2702207', 'COQUEIRO SECO', 27),
(1674, '2702306', 'CORURIPE', 27),
(1675, '2702355', 'CRAIBAS', 27),
(1676, '2702405', 'DELMIRO GOUVEIA', 27),
(1677, '2702504', 'DOIS RIACHOS', 27),
(1678, '2702553', 'ESTRELA DE ALAGOAS', 27),
(1679, '2702603', 'FEIRA GRANDE', 27),
(1680, '2702702', 'FELIZ DESERTO', 27),
(1681, '2702801', 'FLEXEIRAS', 27),
(1682, '2702900', 'GIRAU DO PONCIANO', 27),
(1683, '2703007', 'IBATEGUARA', 27),
(1684, '2703106', 'IGACI', 27),
(1685, '2703205', 'IGREJA NOVA', 27),
(1686, '2703304', 'INHAPI', 27),
(1687, '2703403', 'JACARE DOS HOMENS', 27),
(1688, '2703502', 'JACUIPE', 27),
(1689, '2703601', 'JAPARATINGA', 27),
(1690, '2703700', 'JARAMATAIA', 27),
(1691, '2703759', 'JEQUIA DA PRAIA', 27),
(1692, '2703809', 'JOAQUIM GOMES', 27),
(1693, '2703908', 'JUNDIA', 27),
(1694, '2704005', 'JUNQUEIRO', 27),
(1695, '2704104', 'LAGOA DA CANOA', 27),
(1696, '2704203', 'LIMOEIRO DE ANADIA', 27),
(1697, '2704302', 'MACEIO', 27),
(1698, '2704401', 'MAJOR ISIDORO', 27),
(1699, '2704500', 'MARAGOGI', 27),
(1700, '2704609', 'MARAVILHA', 27),
(1701, '2704708', 'MARECHAL DEODORO', 27),
(1702, '2704807', 'MARIBONDO', 27),
(1703, '2704906', 'MAR VERMELHO', 27),
(1704, '2705002', 'MATA GRANDE', 27),
(1705, '2705101', 'MATRIZ DE CAMARAGIBE', 27),
(1706, '2705200', 'MESSIAS', 27),
(1707, '2705309', 'MINADOR DO NEGRAO', 27),
(1708, '2705408', 'MONTEIROPOLIS', 27),
(1709, '2705507', 'MURICI', 27),
(1710, '2705606', 'NOVO LINO', 27),
(1711, '2705705', 'OLHO D\'AGUA DAS FLORES', 27),
(1712, '2705804', 'OLHO D\'AGUA DO CASADO', 27),
(1713, '2705903', 'OLHO D\'AGUA GRANDE', 27),
(1714, '2706000', 'OLIVENCA', 27),
(1715, '2706109', 'OURO BRANCO', 27),
(1716, '2706208', 'PALESTINA', 27),
(1717, '2706307', 'PALMEIRA DOS INDIOS', 27),
(1718, '2706406', 'PAO DE ACUCAR', 27),
(1719, '2706422', 'PARICONHA', 27),
(1720, '2706448', 'PARIPUEIRA', 27),
(1721, '2706505', 'PASSO DE CAMARAGIBE', 27),
(1722, '2706604', 'PAULO JACINTO', 27),
(1723, '2706703', 'PENEDO', 27),
(1724, '2706802', 'PIACABUCU', 27),
(1725, '2706901', 'PILAR', 27),
(1726, '2707008', 'PINDOBA', 27),
(1727, '2707107', 'PIRANHAS', 27),
(1728, '2707206', 'POCO DAS TRINCHEIRAS', 27),
(1729, '2707305', 'PORTO CALVO', 27),
(1730, '2707404', 'PORTO DE PEDRAS', 27),
(1731, '2707503', 'PORTO REAL DO COLEGIO', 27),
(1732, '2707602', 'QUEBRANGULO', 27),
(1733, '2707701', 'RIO LARGO', 27),
(1734, '2707800', 'ROTEIRO', 27),
(1735, '2707909', 'SANTA LUZIA DO NORTE', 27),
(1736, '2708006', 'SANTANA DO IPANEMA', 27),
(1737, '2708105', 'SANTANA DO MUNDAU', 27),
(1738, '2708204', 'SAO BRAS', 27),
(1739, '2708303', 'SAO JOSE DA LAJE', 27),
(1740, '2708402', 'SAO JOSE DA TAPERA', 27),
(1741, '2708501', 'SAO LUIS DO QUITUNDE', 27),
(1742, '2708600', 'SAO MIGUEL DOS CAMPOS', 27),
(1743, '2708709', 'SAO MIGUEL DOS MILAGRES', 27),
(1744, '2708808', 'SAO SEBASTIAO', 27),
(1745, '2708907', 'SATUBA', 27),
(1746, '2708956', 'SENADOR RUI PALMEIRA', 27),
(1747, '2709004', 'TANQUE D\'ARCA', 27),
(1748, '2709103', 'TAQUARANA', 27),
(1749, '2709152', 'TEOTONIO VILELA', 27),
(1750, '2709202', 'TRAIPU', 27),
(1751, '2709301', 'UNIAO DOS PALMARES', 27),
(1752, '2709400', 'VICOSA', 27),
(1753, '2800100', 'AMPARO DE SAO FRANCISCO', 28),
(1754, '2800209', 'AQUIDABA', 28),
(1755, '2800308', 'ARACAJU', 28),
(1756, '2800407', 'ARAUA', 28),
(1757, '2800506', 'AREIA BRANCA', 28),
(1758, '2800605', 'BARRA DOS COQUEIROS', 28),
(1759, '2800670', 'BOQUIM', 28),
(1760, '2800704', 'BREJO GRANDE', 28),
(1761, '2801009', 'CAMPO DO BRITO', 28),
(1762, '2801108', 'CANHOBA', 28),
(1763, '2801207', 'CANINDE DE SAO FRANCISCO', 28),
(1764, '2801306', 'CAPELA', 28),
(1765, '2801405', 'CARIRA', 28),
(1766, '2801504', 'CARMOPOLIS', 28),
(1767, '2801603', 'CEDRO DE SAO JOAO', 28),
(1768, '2801702', 'CRISTINAPOLIS', 28),
(1769, '2801900', 'CUMBE', 28),
(1770, '2802007', 'DIVINA PASTORA', 28),
(1771, '2802106', 'ESTANCIA', 28),
(1772, '2802205', 'FEIRA NOVA', 28),
(1773, '2802304', 'FREI PAULO', 28),
(1774, '2802403', 'GARARU', 28),
(1775, '2802502', 'GENERAL MAYNARD', 28),
(1776, '2802601', 'GRACHO CARDOSO', 28),
(1777, '2802700', 'ILHA DAS FLORES', 28),
(1778, '2802809', 'INDIAROBA', 28),
(1779, '2802908', 'ITABAIANA', 28),
(1780, '2803005', 'ITABAIANINHA', 28),
(1781, '2803104', 'ITABI', 28),
(1782, '2803203', 'ITAPORANGA D\'AJUDA', 28),
(1783, '2803302', 'JAPARATUBA', 28),
(1784, '2803401', 'JAPOATA', 28),
(1785, '2803500', 'LAGARTO', 28),
(1786, '2803609', 'LARANJEIRAS', 28),
(1787, '2803708', 'MACAMBIRA', 28),
(1788, '2803807', 'MALHADA DOS BOIS', 28),
(1789, '2803906', 'MALHADOR', 28),
(1790, '2804003', 'MARUIM', 28),
(1791, '2804102', 'MOITA BONITA', 28),
(1792, '2804201', 'MONTE ALEGRE DE SERGIPE', 28),
(1793, '2804300', 'MURIBECA', 28),
(1794, '2804409', 'NEOPOLIS', 28),
(1795, '2804458', 'NOSSA SENHORA APARECIDA', 28),
(1796, '2804508', 'NOSSA SENHORA DA GLORIA', 28),
(1797, '2804607', 'NOSSA SENHORA DAS DORES', 28),
(1798, '2804706', 'NOSSA SENHORA DE LOURDES', 28),
(1799, '2804805', 'NOSSA SENHORA DO SOCORRO', 28),
(1800, '2804904', 'PACATUBA', 28),
(1801, '2805000', 'PEDRA MOLE', 28),
(1802, '2805109', 'PEDRINHAS', 28),
(1803, '2805208', 'PINHAO', 28),
(1804, '2805307', 'PIRAMBU', 28),
(1805, '2805406', 'POCO REDONDO', 28),
(1806, '2805505', 'POCO VERDE', 28),
(1807, '2805604', 'PORTO DA FOLHA', 28),
(1808, '2805703', 'PROPRIA', 28),
(1809, '2805802', 'RIACHAO DO DANTAS', 28),
(1810, '2805901', 'RIACHUELO', 28),
(1811, '2806008', 'RIBEIROPOLIS', 28),
(1812, '2806107', 'ROSARIO DO CATETE', 28),
(1813, '2806206', 'SALGADO', 28),
(1814, '2806305', 'SANTA LUZIA DO ITANHY', 28),
(1815, '2806404', 'SANTANA DO SAO FRANCISCO', 28),
(1816, '2806503', 'SANTA ROSA DE LIMA', 28),
(1817, '2806602', 'SANTO AMARO DAS BROTAS', 28),
(1818, '2806701', 'SAO CRISTOVAO', 28),
(1819, '2806800', 'SAO DOMINGOS', 28),
(1820, '2806909', 'SAO FRANCISCO', 28),
(1821, '2807006', 'SAO MIGUEL DO ALEIXO', 28),
(1822, '2807105', 'SIMAO DIAS', 28),
(1823, '2807204', 'SIRIRI', 28),
(1824, '2807303', 'TELHA', 28),
(1825, '2807402', 'TOBIAS BARRETO', 28),
(1826, '2807501', 'TOMAR DO GERU', 28),
(1827, '2807600', 'UMBAUBA', 28),
(1828, '2900108', 'ABAIRA', 29),
(1829, '2900207', 'ABARE', 29),
(1830, '2900306', 'ACAJUTIBA', 29),
(1831, '2900355', 'ADUSTINA', 29),
(1832, '2900405', 'AGUA FRIA', 29),
(1833, '2900504', 'ERICO CARDOSO', 29),
(1834, '2900603', 'AIQUARA', 29),
(1835, '2900702', 'ALAGOINHAS', 29),
(1836, '2900801', 'ALCOBACA', 29),
(1837, '2900900', 'ALMADINA', 29),
(1838, '2901007', 'AMARGOSA', 29),
(1839, '2901106', 'AMELIA RODRIGUES', 29),
(1840, '2901155', 'AMERICA DOURADA', 29),
(1841, '2901205', 'ANAGE', 29),
(1842, '2901304', 'ANDARAI', 29),
(1843, '2901353', 'ANDORINHA', 29),
(1844, '2901403', 'ANGICAL', 29),
(1845, '2901502', 'ANGUERA', 29),
(1846, '2901601', 'ANTAS', 29),
(1847, '2901700', 'ANTONIO CARDOSO', 29),
(1848, '2901809', 'ANTONIO GONCALVES', 29),
(1849, '2901908', 'APORA', 29),
(1850, '2901957', 'APUAREMA', 29),
(1851, '2902005', 'ARACATU', 29),
(1852, '2902054', 'ARACAS', 29),
(1853, '2902104', 'ARACI', 29),
(1854, '2902203', 'ARAMARI', 29),
(1855, '2902252', 'ARATACA', 29),
(1856, '2902302', 'ARATUIPE', 29),
(1857, '2902401', 'AURELINO LEAL', 29),
(1858, '2902500', 'BAIANOPOLIS', 29),
(1859, '2902609', 'BAIXA GRANDE', 29),
(1860, '2902658', 'BANZAE', 29),
(1861, '2902708', 'BARRA', 29),
(1862, '2902807', 'BARRA DA ESTIVA', 29),
(1863, '2902906', 'BARRA DO CHOCA', 29),
(1864, '2903003', 'BARRA DO MENDES', 29),
(1865, '2903102', 'BARRA DO ROCHA', 29),
(1866, '2903201', 'BARREIRAS', 29),
(1867, '2903235', 'BARRO ALTO', 29),
(1868, '2903276', 'BARROCAS', 29),
(1869, '2903300', 'BARRO PRETO', 29),
(1870, '2903409', 'BELMONTE', 29),
(1871, '2903508', 'BELO CAMPO', 29),
(1872, '2903607', 'BIRITINGA', 29),
(1873, '2903706', 'BOA NOVA', 29),
(1874, '2903805', 'BOA VISTA DO TUPIM', 29),
(1875, '2903904', 'BOM JESUS DA LAPA', 29),
(1876, '2903953', 'BOM JESUS DA SERRA', 29),
(1877, '2904001', 'BONINAL', 29),
(1878, '2904050', 'BONITO', 29),
(1879, '2904100', 'BOQUIRA', 29),
(1880, '2904209', 'BOTUPORA', 29),
(1881, '2904308', 'BREJOES', 29),
(1882, '2904407', 'BREJOLANDIA', 29),
(1883, '2904506', 'BROTAS DE MACAUBAS', 29),
(1884, '2904605', 'BRUMADO', 29),
(1885, '2904704', 'BUERAREMA', 29),
(1886, '2904753', 'BURITIRAMA', 29),
(1887, '2904803', 'CAATIBA', 29),
(1888, '2904852', 'CABACEIRAS DO PARAGUACU', 29),
(1889, '2904902', 'CACHOEIRA', 29),
(1890, '2905008', 'CACULE', 29),
(1891, '2905107', 'CAEM', 29),
(1892, '2905156', 'CAETANOS', 29),
(1893, '2905206', 'CAETITE', 29),
(1894, '2905305', 'CAFARNAUM', 29),
(1895, '2905404', 'CAIRU', 29),
(1896, '2905503', 'CALDEIRAO GRANDE', 29),
(1897, '2905602', 'CAMACAN', 29),
(1898, '2905701', 'CAMACARI', 29),
(1899, '2905800', 'CAMAMU', 29),
(1900, '2905909', 'CAMPO ALEGRE DE LOURDES', 29),
(1901, '2906006', 'CAMPO FORMOSO', 29),
(1902, '2906105', 'CANAPOLIS', 29),
(1903, '2906204', 'CANARANA', 29),
(1904, '2906303', 'CANAVIEIRAS', 29),
(1905, '2906402', 'CANDEAL', 29),
(1906, '2906501', 'CANDEIAS', 29),
(1907, '2906600', 'CANDIBA', 29),
(1908, '2906709', 'CANDIDO SALES', 29),
(1909, '2906808', 'CANSANCAO', 29),
(1910, '2906824', 'CANUDOS', 29),
(1911, '2906857', 'CAPELA DO ALTO ALEGRE', 29),
(1912, '2906873', 'CAPIM GROSSO', 29),
(1913, '2906899', 'CARAIBAS', 29),
(1914, '2906907', 'CARAVELAS', 29),
(1915, '2907004', 'CARDEAL DA SILVA', 29),
(1916, '2907103', 'CARINHANHA', 29),
(1917, '2907202', 'CASA NOVA', 29),
(1918, '2907301', 'CASTRO ALVES', 29),
(1919, '2907400', 'CATOLANDIA', 29),
(1920, '2907509', 'CATU', 29),
(1921, '2907558', 'CATURAMA', 29),
(1922, '2907608', 'CENTRAL', 29),
(1923, '2907707', 'CHORROCHO', 29),
(1924, '2907806', 'CICERO DANTAS', 29),
(1925, '2907905', 'CIPO', 29),
(1926, '2908002', 'COARACI', 29),
(1927, '2908101', 'COCOS', 29),
(1928, '2908200', 'CONCEICAO DA FEIRA', 29),
(1929, '2908309', 'CONCEICAO DO ALMEIDA', 29),
(1930, '2908408', 'CONCEICAO DO COITE', 29),
(1931, '2908507', 'CONCEICAO DO JACUIPE', 29),
(1932, '2908606', 'CONDE', 29),
(1933, '2908705', 'CONDEUBA', 29),
(1934, '2908804', 'CONTENDAS DO SINCORA', 29),
(1935, '2908903', 'CORACAO DE MARIA', 29),
(1936, '2909000', 'CORDEIROS', 29),
(1937, '2909109', 'CORIBE', 29),
(1938, '2909208', 'CORONEL JOAO SA', 29),
(1939, '2909307', 'CORRENTINA', 29),
(1940, '2909406', 'COTEGIPE', 29),
(1941, '2909505', 'CRAVOLANDIA', 29),
(1942, '2909604', 'CRISOPOLIS', 29),
(1943, '2909703', 'CRISTOPOLIS', 29),
(1944, '2909802', 'CRUZ DAS ALMAS', 29),
(1945, '2909901', 'CURACA', 29),
(1946, '2910008', 'DARIO MEIRA', 29),
(1947, '2910057', 'DIAS D\'AVILA', 29),
(1948, '2910107', 'DOM BASILIO', 29),
(1949, '2910206', 'DOM MACEDO COSTA', 29),
(1950, '2910305', 'ELISIO MEDRADO', 29),
(1951, '2910404', 'ENCRUZILHADA', 29),
(1952, '2910503', 'ENTRE RIOS', 29),
(1953, '2910602', 'ESPLANADA', 29),
(1954, '2910701', 'EUCLIDES DA CUNHA', 29),
(1955, '2910727', 'EUNAPOLIS', 29),
(1956, '2910750', 'FATIMA', 29),
(1957, '2910776', 'FEIRA DA MATA', 29),
(1958, '2910800', 'FEIRA DE SANTANA', 29),
(1959, '2910859', 'FILADELFIA', 29),
(1960, '2910909', 'FIRMINO ALVES', 29),
(1961, '2911006', 'FLORESTA AZUL', 29),
(1962, '2911105', 'FORMOSA DO RIO PRETO', 29),
(1963, '2911204', 'GANDU', 29),
(1964, '2911253', 'GAVIAO', 29),
(1965, '2911303', 'GENTIO DO OURO', 29),
(1966, '2911402', 'GLORIA', 29),
(1967, '2911501', 'GONGOGI', 29),
(1968, '2911600', 'GOVERNADOR MANGABEIRA', 29),
(1969, '2911659', 'GUAJERU', 29),
(1970, '2911709', 'GUANAMBI', 29),
(1971, '2911808', 'GUARATINGA', 29),
(1972, '2911857', 'HELIOPOLIS', 29),
(1973, '2911907', 'IACU', 29),
(1974, '2912004', 'IBIASSUCE', 29),
(1975, '2912103', 'IBICARAI', 29),
(1976, '2912202', 'IBICOARA', 29),
(1977, '2912301', 'IBICUI', 29),
(1978, '2912400', 'IBIPEBA', 29),
(1979, '2912509', 'IBIPITANGA', 29),
(1980, '2912608', 'IBIQUERA', 29),
(1981, '2912707', 'IBIRAPITANGA', 29),
(1982, '2912806', 'IBIRAPUA', 29),
(1983, '2912905', 'IBIRATAIA', 29),
(1984, '2913002', 'IBITIARA', 29),
(1985, '2913101', 'IBITITA', 29),
(1986, '2913200', 'IBOTIRAMA', 29),
(1987, '2913309', 'ICHU', 29),
(1988, '2913408', 'IGAPORA', 29),
(1989, '2913457', 'IGRAPIUNA', 29),
(1990, '2913507', 'IGUAI', 29),
(1991, '2913606', 'ILHEUS', 29),
(1992, '2913705', 'INHAMBUPE', 29),
(1993, '2913804', 'IPECAETA', 29),
(1994, '2913903', 'IPIAU', 29),
(1995, '2914000', 'IPIRA', 29),
(1996, '2914109', 'IPUPIARA', 29),
(1997, '2914208', 'IRAJUBA', 29),
(1998, '2914307', 'IRAMAIA', 29),
(1999, '2914406', 'IRAQUARA', 29),
(2000, '2914505', 'IRARA', 29),
(2001, '2914604', 'IRECE', 29),
(2002, '2914653', 'ITABELA', 29),
(2003, '2914703', 'ITABERABA', 29),
(2004, '2914802', 'ITABUNA', 29),
(2005, '2914901', 'ITACARE', 29),
(2006, '2915007', 'ITAETE', 29),
(2007, '2915106', 'ITAGI', 29),
(2008, '2915205', 'ITAGIBA', 29),
(2009, '2915304', 'ITAGIMIRIM', 29),
(2010, '2915353', 'ITAGUACU DA BAHIA', 29),
(2011, '2915403', 'ITAJU DO COLONIA', 29),
(2012, '2915502', 'ITAJUIPE', 29),
(2013, '2915601', 'ITAMARAJU', 29),
(2014, '2915700', 'ITAMARI', 29),
(2015, '2915809', 'ITAMBE', 29),
(2016, '2915908', 'ITANAGRA', 29),
(2017, '2916005', 'ITANHEM', 29),
(2018, '2916104', 'ITAPARICA', 29),
(2019, '2916203', 'ITAPE', 29),
(2020, '2916302', 'ITAPEBI', 29),
(2021, '2916401', 'ITAPETINGA', 29),
(2022, '2916500', 'ITAPICURU', 29),
(2023, '2916609', 'ITAPITANGA', 29),
(2024, '2916708', 'ITAQUARA', 29),
(2025, '2916807', 'ITARANTIM', 29),
(2026, '2916856', 'ITATIM', 29),
(2027, '2916906', 'ITIRUCU', 29),
(2028, '2917003', 'ITIUBA', 29),
(2029, '2917102', 'ITORORO', 29),
(2030, '2917201', 'ITUACU', 29),
(2031, '2917300', 'ITUBERA', 29),
(2032, '2917334', 'IUIU', 29),
(2033, '2917359', 'JABORANDI', 29),
(2034, '2917409', 'JACARACI', 29),
(2035, '2917508', 'JACOBINA', 29),
(2036, '2917607', 'JAGUAQUARA', 29),
(2037, '2917706', 'JAGUARARI', 29),
(2038, '2917805', 'JAGUARIPE', 29),
(2039, '2917904', 'JANDAIRA', 29),
(2040, '2918001', 'JEQUIE', 29),
(2041, '2918100', 'JEREMOABO', 29),
(2042, '2918209', 'JIQUIRICA', 29),
(2043, '2918308', 'JITAUNA', 29),
(2044, '2918357', 'JOAO DOURADO', 29),
(2045, '2918407', 'JUAZEIRO', 29),
(2046, '2918456', 'JUCURUCU', 29),
(2047, '2918506', 'JUSSARA', 29),
(2048, '2918555', 'JUSSARI', 29),
(2049, '2918605', 'JUSSIAPE', 29),
(2050, '2918704', 'LAFAIETE COUTINHO', 29),
(2051, '2918753', 'LAGOA REAL', 29),
(2052, '2918803', 'LAJE', 29),
(2053, '2918902', 'LAJEDAO', 29),
(2054, '2919009', 'LAJEDINHO', 29),
(2055, '2919058', 'LAJEDO DO TABOCAL', 29),
(2056, '2919108', 'LAMARAO', 29),
(2057, '2919157', 'LAPAO', 29),
(2058, '2919207', 'LAURO DE FREITAS', 29),
(2059, '2919306', 'LENCOIS', 29),
(2060, '2919405', 'LICINIO DE ALMEIDA', 29),
(2061, '2919504', 'LIVRAMENTO DE NOSSA SENHORA', 29),
(2062, '2919553', 'LUIS EDUARDO MAGALHAES', 29),
(2063, '2919603', 'MACAJUBA', 29),
(2064, '2919702', 'MACARANI', 29),
(2065, '2919801', 'MACAUBAS', 29),
(2066, '2919900', 'MACURURE', 29),
(2067, '2919926', 'MADRE DE DEUS', 29),
(2068, '2919959', 'MAETINGA', 29),
(2069, '2920007', 'MAIQUINIQUE', 29),
(2070, '2920106', 'MAIRI', 29),
(2071, '2920205', 'MALHADA', 29),
(2072, '2920304', 'MALHADA DE PEDRAS', 29),
(2073, '2920403', 'MANOEL VITORINO', 29),
(2074, '2920452', 'MANSIDAO', 29),
(2075, '2920502', 'MARACAS', 29),
(2076, '2920601', 'MARAGOGIPE', 29),
(2077, '2920700', 'MARAU', 29),
(2078, '2920809', 'MARCIONILIO SOUZA', 29),
(2079, '2920908', 'MASCOTE', 29),
(2080, '2921005', 'MATA DE SAO JOAO', 29),
(2081, '2921054', 'MATINA', 29),
(2082, '2921104', 'MEDEIROS NETO', 29),
(2083, '2921203', 'MIGUEL CALMON', 29),
(2084, '2921302', 'MILAGRES', 29),
(2085, '2921401', 'MIRANGABA', 29),
(2086, '2921450', 'MIRANTE', 29),
(2087, '2921500', 'MONTE SANTO', 29),
(2088, '2921609', 'MORPARA', 29),
(2089, '2921708', 'MORRO DO CHAPEU', 29),
(2090, '2921807', 'MORTUGABA', 29),
(2091, '2921906', 'MUCUGE', 29),
(2092, '2922003', 'MUCURI', 29),
(2093, '2922052', 'MULUNGU DO MORRO', 29),
(2094, '2922102', 'MUNDO NOVO', 29),
(2095, '2922201', 'MUNIZ FERREIRA', 29),
(2096, '2922250', 'MUQUEM DE SAO FRANCISCO', 29),
(2097, '2922300', 'MURITIBA', 29),
(2098, '2922409', 'MUTUIPE', 29),
(2099, '2922508', 'NAZARE', 29),
(2100, '2922607', 'NILO PECANHA', 29),
(2101, '2922656', 'NORDESTINA', 29),
(2102, '2922706', 'NOVA CANAA', 29),
(2103, '2922730', 'NOVA FATIMA', 29),
(2104, '2922755', 'NOVA IBIA', 29),
(2105, '2922805', 'NOVA ITARANA', 29),
(2106, '2922854', 'NOVA REDENCAO', 29),
(2107, '2922904', 'NOVA SOURE', 29),
(2108, '2923001', 'NOVA VICOSA', 29),
(2109, '2923035', 'NOVO HORIZONTE', 29),
(2110, '2923050', 'NOVO TRIUNFO', 29),
(2111, '2923100', 'OLINDINA', 29),
(2112, '2923209', 'OLIVEIRA DOS BREJINHOS', 29),
(2113, '2923308', 'OURICANGAS', 29),
(2114, '2923357', 'OUROLANDIA', 29),
(2115, '2923407', 'PALMAS DE MONTE ALTO', 29),
(2116, '2923506', 'PALMEIRAS', 29),
(2117, '2923605', 'PARAMIRIM', 29),
(2118, '2923704', 'PARATINGA', 29),
(2119, '2923803', 'PARIPIRANGA', 29),
(2120, '2923902', 'PAU BRASIL', 29),
(2121, '2924009', 'PAULO AFONSO', 29),
(2122, '2924058', 'PE DE SERRA', 29),
(2123, '2924108', 'PEDRAO', 29),
(2124, '2924207', 'PEDRO ALEXANDRE', 29),
(2125, '2924306', 'PIATA', 29),
(2126, '2924405', 'PILAO ARCADO', 29),
(2127, '2924504', 'PINDAI', 29),
(2128, '2924603', 'PINDOBACU', 29),
(2129, '2924652', 'PINTADAS', 29),
(2130, '2924678', 'PIRAI DO NORTE', 29),
(2131, '2924702', 'PIRIPA', 29),
(2132, '2924801', 'PIRITIBA', 29),
(2133, '2924900', 'PLANALTINO', 29),
(2134, '2925006', 'PLANALTO', 29),
(2135, '2925105', 'POCOES', 29),
(2136, '2925204', 'POJUCA', 29),
(2137, '2925253', 'PONTO NOVO', 29),
(2138, '2925303', 'PORTO SEGURO', 29),
(2139, '2925402', 'POTIRAGUA', 29),
(2140, '2925501', 'PRADO', 29),
(2141, '2925600', 'PRESIDENTE DUTRA', 29),
(2142, '2925709', 'PRESIDENTE JANIO QUADROS', 29),
(2143, '2925758', 'PRESIDENTE TANCREDO NEVES', 29),
(2144, '2925808', 'QUEIMADAS', 29),
(2145, '2925907', 'QUIJINGUE', 29),
(2146, '2925931', 'QUIXABEIRA', 29),
(2147, '2925956', 'RAFAEL JAMBEIRO', 29),
(2148, '2926004', 'REMANSO', 29),
(2149, '2926103', 'RETIROLANDIA', 29),
(2150, '2926202', 'RIACHAO DAS NEVES', 29),
(2151, '2926301', 'RIACHAO DO JACUIPE', 29),
(2152, '2926400', 'RIACHO DE SANTANA', 29),
(2153, '2926509', 'RIBEIRA DO AMPARO', 29),
(2154, '2926608', 'RIBEIRA DO POMBAL', 29),
(2155, '2926657', 'RIBEIRAO DO LARGO', 29),
(2156, '2926707', 'RIO DE CONTAS', 29),
(2157, '2926806', 'RIO DO ANTONIO', 29),
(2158, '2926905', 'RIO DO PIRES', 29),
(2159, '2927002', 'RIO REAL', 29),
(2160, '2927101', 'RODELAS', 29),
(2161, '2927200', 'RUY BARBOSA', 29),
(2162, '2927309', 'SALINAS DA MARGARIDA', 29),
(2163, '2927408', 'SALVADOR', 29),
(2164, '2927507', 'SANTA BARBARA', 29),
(2165, '2927606', 'SANTA BRIGIDA', 29),
(2166, '2927705', 'SANTA CRUZ CABRALIA', 29),
(2167, '2927804', 'SANTA CRUZ DA VITORIA', 29),
(2168, '2927903', 'SANTA INES', 29),
(2169, '2928000', 'SANTALUZ', 29),
(2170, '2928059', 'SANTA LUZIA', 29),
(2171, '2928109', 'SANTA MARIA DA VITORIA', 29),
(2172, '2928208', 'SANTANA', 29),
(2173, '2928307', 'SANTANOPOLIS', 29),
(2174, '2928406', 'SANTA RITA DE CASSIA', 29),
(2175, '2928505', 'SANTA TERESINHA', 29),
(2176, '2928604', 'SANTO AMARO', 29),
(2177, '2928703', 'SANTO ANTONIO DE JESUS', 29),
(2178, '2928802', 'SANTO ESTEVAO', 29),
(2179, '2928901', 'SAO DESIDERIO', 29),
(2180, '2928950', 'SAO DOMINGOS', 29),
(2181, '2929008', 'SAO FELIX', 29),
(2182, '2929057', 'SAO FELIX DO CORIBE', 29),
(2183, '2929107', 'SAO FELIPE', 29),
(2184, '2929206', 'SAO FRANCISCO DO CONDE', 29),
(2185, '2929255', 'SAO GABRIEL', 29),
(2186, '2929305', 'SAO GONCALO DOS CAMPOS', 29),
(2187, '2929354', 'SAO JOSE DA VITORIA', 29),
(2188, '2929370', 'SAO JOSE DO JACUIPE', 29),
(2189, '2929404', 'SAO MIGUEL DAS MATAS', 29),
(2190, '2929503', 'SAO SEBASTIAO DO PASSE', 29),
(2191, '2929602', 'SAPEACU', 29),
(2192, '2929701', 'SATIRO DIAS', 29),
(2193, '2929750', 'SAUBARA', 29),
(2194, '2929800', 'SAUDE', 29),
(2195, '2929909', 'SEABRA', 29),
(2196, '2930006', 'SEBASTIAO LARANJEIRAS', 29),
(2197, '2930105', 'SENHOR DO BONFIM', 29),
(2198, '2930154', 'SERRA DO RAMALHO', 29),
(2199, '2930204', 'SENTO SE', 29),
(2200, '2930303', 'SERRA DOURADA', 29),
(2201, '2930402', 'SERRA PRETA', 29),
(2202, '2930501', 'SERRINHA', 29),
(2203, '2930600', 'SERROLANDIA', 29),
(2204, '2930709', 'SIMOES FILHO', 29),
(2205, '2930758', 'SITIO DO MATO', 29),
(2206, '2930766', 'SITIO DO QUINTO', 29),
(2207, '2930774', 'SOBRADINHO', 29),
(2208, '2930808', 'SOUTO SOARES', 29),
(2209, '2930907', 'TABOCAS DO BREJO VELHO', 29),
(2210, '2931004', 'TANHACU', 29),
(2211, '2931053', 'TANQUE NOVO', 29),
(2212, '2931103', 'TANQUINHO', 29),
(2213, '2931202', 'TAPEROA', 29),
(2214, '2931301', 'TAPIRAMUTA', 29),
(2215, '2931350', 'TEIXEIRA DE FREITAS', 29),
(2216, '2931400', 'TEODORO SAMPAIO', 29),
(2217, '2931509', 'TEOFILANDIA', 29),
(2218, '2931608', 'TEOLANDIA', 29),
(2219, '2931707', 'TERRA NOVA', 29),
(2220, '2931806', 'TREMEDAL', 29),
(2221, '2931905', 'TUCANO', 29),
(2222, '2932002', 'UAUA', 29),
(2223, '2932101', 'UBAIRA', 29),
(2224, '2932200', 'UBAITABA', 29),
(2225, '2932309', 'UBATA', 29),
(2226, '2932408', 'UIBAI', 29),
(2227, '2932457', 'UMBURANAS', 29),
(2228, '2932507', 'UNA', 29),
(2229, '2932606', 'URANDI', 29),
(2230, '2932705', 'URUCUCA', 29),
(2231, '2932804', 'UTINGA', 29),
(2232, '2932903', 'VALENCA', 29),
(2233, '2933000', 'VALENTE', 29),
(2234, '2933059', 'VARZEA DA ROCA', 29),
(2235, '2933109', 'VARZEA DO POCO', 29),
(2236, '2933158', 'VARZEA NOVA', 29),
(2237, '2933174', 'VARZEDO', 29),
(2238, '2933208', 'VERA CRUZ', 29),
(2239, '2933257', 'VEREDA', 29),
(2240, '2933307', 'VITORIA DA CONQUISTA', 29),
(2241, '2933406', 'WAGNER', 29),
(2242, '2933455', 'WANDERLEY', 29),
(2243, '2933505', 'WENCESLAU GUIMARAES', 29),
(2244, '2933604', 'XIQUE-XIQUE', 29),
(2245, '3100104', 'ABADIA DOS DOURADOS', 31),
(2246, '3100203', 'ABAETE', 31),
(2247, '3100302', 'ABRE CAMPO', 31),
(2248, '3100401', 'ACAIACA', 31),
(2249, '3100500', 'ACUCENA', 31),
(2250, '3100609', 'AGUA BOA', 31),
(2251, '3100708', 'AGUA COMPRIDA', 31),
(2252, '3100807', 'AGUANIL', 31),
(2253, '3100906', 'AGUAS FORMOSAS', 31),
(2254, '3101003', 'AGUAS VERMELHAS', 31),
(2255, '3101102', 'AIMORES', 31),
(2256, '3101201', 'AIURUOCA', 31),
(2257, '3101300', 'ALAGOA', 31),
(2258, '3101409', 'ALBERTINA', 31),
(2259, '3101508', 'ALEM PARAIBA', 31),
(2260, '3101607', 'ALFENAS', 31),
(2261, '3101631', 'ALFREDO VASCONCELOS', 31),
(2262, '3101706', 'ALMENARA', 31),
(2263, '3101805', 'ALPERCATA', 31),
(2264, '3101904', 'ALPINOPOLIS', 31),
(2265, '3102001', 'ALTEROSA', 31),
(2266, '3102050', 'ALTO CAPARAO', 31),
(2267, '3102100', 'ALTO RIO DOCE', 31),
(2268, '3102209', 'ALVARENGA', 31),
(2269, '3102308', 'ALVINOPOLIS', 31),
(2270, '3102407', 'ALVORADA DE MINAS', 31),
(2271, '3102506', 'AMPARO DO SERRA', 31),
(2272, '3102605', 'ANDRADAS', 31),
(2273, '3102704', 'CACHOEIRA DE PAJEU', 31),
(2274, '3102803', 'ANDRELANDIA', 31),
(2275, '3102852', 'ANGELANDIA', 31),
(2276, '3102902', 'ANTONIO CARLOS', 31),
(2277, '3103009', 'ANTONIO DIAS', 31),
(2278, '3103108', 'ANTONIO PRADO DE MINAS', 31),
(2279, '3103207', 'ARACAI', 31),
(2280, '3103306', 'ARACITABA', 31),
(2281, '3103405', 'ARACUAI', 31),
(2282, '3103504', 'ARAGUARI', 31),
(2283, '3103603', 'ARANTINA', 31),
(2284, '3103702', 'ARAPONGA', 31),
(2285, '3103751', 'ARAPORA', 31),
(2286, '3103801', 'ARAPUA', 31),
(2287, '3103900', 'ARAUJOS', 31),
(2288, '3104007', 'ARAXA', 31),
(2289, '3104106', 'ARCEBURGO', 31),
(2290, '3104205', 'ARCOS', 31),
(2291, '3104304', 'AREADO', 31),
(2292, '3104403', 'ARGIRITA', 31),
(2293, '3104452', 'ARICANDUVA', 31),
(2294, '3104502', 'ARINOS', 31),
(2295, '3104601', 'ASTOLFO DUTRA', 31),
(2296, '3104700', 'ATALEIA', 31),
(2297, '3104809', 'AUGUSTO DE LIMA', 31),
(2298, '3104908', 'BAEPENDI', 31),
(2299, '3105004', 'BALDIM', 31),
(2300, '3105103', 'BAMBUI', 31),
(2301, '3105202', 'BANDEIRA', 31),
(2302, '3105301', 'BANDEIRA DO SUL', 31),
(2303, '3105400', 'BARAO DE COCAIS', 31),
(2304, '3105509', 'BARAO DE MONTE ALTO', 31),
(2305, '3105608', 'BARBACENA', 31),
(2306, '3105707', 'BARRA LONGA', 31),
(2307, '3105905', 'BARROSO', 31),
(2308, '3106002', 'BELA VISTA DE MINAS', 31),
(2309, '3106101', 'BELMIRO BRAGA', 31),
(2310, '3106200', 'BELO HORIZONTE', 31),
(2311, '3106309', 'BELO ORIENTE', 31),
(2312, '3106408', 'BELO VALE', 31),
(2313, '3106507', 'BERILO', 31),
(2314, '3106606', 'BERTOPOLIS', 31),
(2315, '3106655', 'BERIZAL', 31),
(2316, '3106705', 'BETIM', 31),
(2317, '3106804', 'BIAS FORTES', 31),
(2318, '3106903', 'BICAS', 31),
(2319, '3107000', 'BIQUINHAS', 31),
(2320, '3107109', 'BOA ESPERANCA', 31),
(2321, '3107208', 'BOCAINA DE MINAS', 31),
(2322, '3107307', 'BOCAIUVA', 31),
(2323, '3107406', 'BOM DESPACHO', 31),
(2324, '3107505', 'BOM JARDIM DE MINAS', 31),
(2325, '3107604', 'BOM JESUS DA PENHA', 31),
(2326, '3107703', 'BOM JESUS DO AMPARO', 31),
(2327, '3107802', 'BOM JESUS DO GALHO', 31),
(2328, '3107901', 'BOM REPOUSO', 31),
(2329, '3108008', 'BOM SUCESSO', 31),
(2330, '3108107', 'BONFIM', 31),
(2331, '3108206', 'BONFINOPOLIS DE MINAS', 31),
(2332, '3108255', 'BONITO DE MINAS', 31),
(2333, '3108305', 'BORDA DA MATA', 31),
(2334, '3108404', 'BOTELHOS', 31),
(2335, '3108503', 'BOTUMIRIM', 31),
(2336, '3108552', 'BRASILANDIA DE MINAS', 31),
(2337, '3108602', 'BRASILIA DE MINAS', 31),
(2338, '3108701', 'BRAS PIRES', 31),
(2339, '3108800', 'BRAUNAS', 31),
(2340, '3108909', 'BRAZOPOLIS', 31),
(2341, '3109006', 'BRUMADINHO', 31),
(2342, '3109105', 'BUENO BRANDAO', 31),
(2343, '3109204', 'BUENOPOLIS', 31),
(2344, '3109253', 'BUGRE', 31),
(2345, '3109303', 'BURITIS', 31),
(2346, '3109402', 'BURITIZEIRO', 31),
(2347, '3109451', 'CABECEIRA GRANDE', 31),
(2348, '3109501', 'CABO VERDE', 31),
(2349, '3109600', 'CACHOEIRA DA PRATA', 31),
(2350, '3109709', 'CACHOEIRA DE MINAS', 31),
(2351, '3109808', 'CACHOEIRA DOURADA', 31),
(2352, '3109907', 'CAETANOPOLIS', 31),
(2353, '3110004', 'CAETE', 31),
(2354, '3110103', 'CAIANA', 31),
(2355, '3110202', 'CAJURI', 31),
(2356, '3110301', 'CALDAS', 31),
(2357, '3110400', 'CAMACHO', 31),
(2358, '3110509', 'CAMANDUCAIA', 31),
(2359, '3110608', 'CAMBUI', 31),
(2360, '3110707', 'CAMBUQUIRA', 31),
(2361, '3110806', 'CAMPANARIO', 31),
(2362, '3110905', 'CAMPANHA', 31),
(2363, '3111002', 'CAMPESTRE', 31),
(2364, '3111101', 'CAMPINA VERDE', 31),
(2365, '3111150', 'CAMPO AZUL', 31),
(2366, '3111200', 'CAMPO BELO', 31),
(2367, '3111309', 'CAMPO DO MEIO', 31),
(2368, '3111408', 'CAMPO FLORIDO', 31),
(2369, '3111507', 'CAMPOS ALTOS', 31),
(2370, '3111606', 'CAMPOS GERAIS', 31),
(2371, '3111705', 'CANAA', 31),
(2372, '3111804', 'CANAPOLIS', 31),
(2373, '3111903', 'CANA VERDE', 31),
(2374, '3112000', 'CANDEIAS', 31),
(2375, '3112059', 'CANTAGALO', 31),
(2376, '3112109', 'CAPARAO', 31),
(2377, '3112208', 'CAPELA NOVA', 31),
(2378, '3112307', 'CAPELINHA', 31),
(2379, '3112406', 'CAPETINGA', 31),
(2380, '3112505', 'CAPIM BRANCO', 31),
(2381, '3112604', 'CAPINOPOLIS', 31),
(2382, '3112653', 'CAPITAO ANDRADE', 31),
(2383, '3112703', 'CAPITAO ENEAS', 31),
(2384, '3112802', 'CAPITOLIO', 31),
(2385, '3112901', 'CAPUTIRA', 31),
(2386, '3113008', 'CARAI', 31),
(2387, '3113107', 'CARANAIBA', 31),
(2388, '3113206', 'CARANDAI', 31),
(2389, '3113305', 'CARANGOLA', 31),
(2390, '3113404', 'CARATINGA', 31),
(2391, '3113503', 'CARBONITA', 31),
(2392, '3113602', 'CAREACU', 31),
(2393, '3113701', 'CARLOS CHAGAS', 31),
(2394, '3113800', 'CARMESIA', 31),
(2395, '3113909', 'CARMO DA CACHOEIRA', 31),
(2396, '3114006', 'CARMO DA MATA', 31),
(2397, '3114105', 'CARMO DE MINAS', 31),
(2398, '3114204', 'CARMO DO CAJURU', 31),
(2399, '3114303', 'CARMO DO PARANAIBA', 31),
(2400, '3114402', 'CARMO DO RIO CLARO', 31),
(2401, '3114501', 'CARMOPOLIS DE MINAS', 31),
(2402, '3114550', 'CARNEIRINHO', 31),
(2403, '3114600', 'CARRANCAS', 31),
(2404, '3114709', 'CARVALHOPOLIS', 31),
(2405, '3114808', 'CARVALHOS', 31),
(2406, '3114907', 'CASA GRANDE', 31),
(2407, '3115003', 'CASCALHO RICO', 31),
(2408, '3115102', 'CASSIA', 31),
(2409, '3115201', 'CONCEICAO DA BARRA DE MINAS', 31),
(2410, '3115300', 'CATAGUASES', 31),
(2411, '3115359', 'CATAS ALTAS', 31),
(2412, '3115409', 'CATAS ALTAS DA NORUEGA', 31),
(2413, '3115458', 'CATUJI', 31),
(2414, '3115474', 'CATUTI', 31),
(2415, '3115508', 'CAXAMBU', 31),
(2416, '3115607', 'CEDRO DO ABAETE', 31),
(2417, '3115706', 'CENTRAL DE MINAS', 31),
(2418, '3115805', 'CENTRALINA', 31),
(2419, '3115904', 'CHACARA', 31),
(2420, '3116001', 'CHALE', 31),
(2421, '3116100', 'CHAPADA DO NORTE', 31),
(2422, '3116159', 'CHAPADA GAUCHA', 31),
(2423, '3116209', 'CHIADOR', 31),
(2424, '3116308', 'CIPOTANEA', 31),
(2425, '3116407', 'CLARAVAL', 31),
(2426, '3116506', 'CLARO DOS POCOES', 31),
(2427, '3116605', 'CLAUDIO', 31),
(2428, '3116704', 'COIMBRA', 31),
(2429, '3116803', 'COLUNA', 31),
(2430, '3116902', 'COMENDADOR GOMES', 31),
(2431, '3117009', 'COMERCINHO', 31),
(2432, '3117108', 'CONCEICAO DA APARECIDA', 31),
(2433, '3117207', 'CONCEICAO DAS PEDRAS', 31),
(2434, '3117306', 'CONCEICAO DAS ALAGOAS', 31),
(2435, '3117405', 'CONCEICAO DE IPANEMA', 31),
(2436, '3117504', 'CONCEICAO DO MATO DENTRO', 31),
(2437, '3117603', 'CONCEICAO DO PARA', 31),
(2438, '3117702', 'CONCEICAO DO RIO VERDE', 31),
(2439, '3117801', 'CONCEICAO DOS OUROS', 31),
(2440, '3117836', 'CONEGO MARINHO', 31),
(2441, '3117876', 'CONFINS', 31),
(2442, '3117900', 'CONGONHAL', 31),
(2443, '3118007', 'CONGONHAS', 31),
(2444, '3118106', 'CONGONHAS DO NORTE', 31),
(2445, '3118205', 'CONQUISTA', 31),
(2446, '3118304', 'CONSELHEIRO LAFAIETE', 31),
(2447, '3118403', 'CONSELHEIRO PENA', 31),
(2448, '3118502', 'CONSOLACAO', 31),
(2449, '3118601', 'CONTAGEM', 31),
(2450, '3118700', 'COQUEIRAL', 31),
(2451, '3118809', 'CORACAO DE JESUS', 31),
(2452, '3118908', 'CORDISBURGO', 31),
(2453, '3119005', 'CORDISLANDIA', 31),
(2454, '3119104', 'CORINTO', 31),
(2455, '3119203', 'COROACI', 31),
(2456, '3119302', 'COROMANDEL', 31),
(2457, '3119401', 'CORONEL FABRICIANO', 31),
(2458, '3119500', 'CORONEL MURTA', 31),
(2459, '3119609', 'CORONEL PACHECO', 31),
(2460, '3119708', 'CORONEL XAVIER CHAVES', 31),
(2461, '3119807', 'CORREGO DANTA', 31),
(2462, '3119906', 'CORREGO DO BOM JESUS', 31),
(2463, '3119955', 'CORREGO FUNDO', 31),
(2464, '3120003', 'CORREGO NOVO', 31),
(2465, '3120102', 'COUTO DE MAGALHAES DE MINAS', 31),
(2466, '3120151', 'CRISOLITA', 31),
(2467, '3120201', 'CRISTAIS', 31),
(2468, '3120300', 'CRISTALIA', 31),
(2469, '3120409', 'CRISTIANO OTONI', 31),
(2470, '3120508', 'CRISTINA', 31),
(2471, '3120607', 'CRUCILANDIA', 31),
(2472, '3120706', 'CRUZEIRO DA FORTALEZA', 31),
(2473, '3120805', 'CRUZILIA', 31),
(2474, '3120839', 'CUPARAQUE', 31),
(2475, '3120870', 'CURRAL DE DENTRO', 31),
(2476, '3120904', 'CURVELO', 31),
(2477, '3121001', 'DATAS', 31),
(2478, '3121100', 'DELFIM MOREIRA', 31),
(2479, '3121209', 'DELFINOPOLIS', 31),
(2480, '3121258', 'DELTA', 31),
(2481, '3121308', 'DESCOBERTO', 31),
(2482, '3121407', 'DESTERRO DE ENTRE RIOS', 31),
(2483, '3121506', 'DESTERRO DO MELO', 31),
(2484, '3121605', 'DIAMANTINA', 31),
(2485, '3121704', 'DIOGO DE VASCONCELOS', 31),
(2486, '3121803', 'DIONISIO', 31),
(2487, '3121902', 'DIVINESIA', 31),
(2488, '3122009', 'DIVINO', 31),
(2489, '3122108', 'DIVINO DAS LARANJEIRAS', 31),
(2490, '3122207', 'DIVINOLANDIA DE MINAS', 31),
(2491, '3122306', 'DIVINOPOLIS', 31),
(2492, '3122355', 'DIVISA ALEGRE', 31),
(2493, '3122405', 'DIVISA NOVA', 31),
(2494, '3122454', 'DIVISOPOLIS', 31),
(2495, '3122470', 'DOM BOSCO', 31),
(2496, '3122504', 'DOM CAVATI', 31),
(2497, '3122603', 'DOM JOAQUIM', 31),
(2498, '3122702', 'DOM SILVERIO', 31),
(2499, '3122801', 'DOM VICOSO', 31),
(2500, '3122900', 'DONA EUSEBIA', 31),
(2501, '3123007', 'DORES DE CAMPOS', 31),
(2502, '3123106', 'DORES DE GUANHAES', 31),
(2503, '3123205', 'DORES DO INDAIA', 31),
(2504, '3123304', 'DORES DO TURVO', 31),
(2505, '3123403', 'DORESOPOLIS', 31),
(2506, '3123502', 'DOURADOQUARA', 31),
(2507, '3123528', 'DURANDE', 31),
(2508, '3123601', 'ELOI MENDES', 31),
(2509, '3123700', 'ENGENHEIRO CALDAS', 31),
(2510, '3123809', 'ENGENHEIRO NAVARRO', 31),
(2511, '3123858', 'ENTRE FOLHAS', 31),
(2512, '3123908', 'ENTRE RIOS DE MINAS', 31),
(2513, '3124005', 'ERVALIA', 31),
(2514, '3124104', 'ESMERALDAS', 31),
(2515, '3124203', 'ESPERA FELIZ', 31),
(2516, '3124302', 'ESPINOSA', 31),
(2517, '3124401', 'ESPIRITO SANTO DO DOURADO', 31),
(2518, '3124500', 'ESTIVA', 31),
(2519, '3124609', 'ESTRELA DALVA', 31),
(2520, '3124708', 'ESTRELA DO INDAIA', 31),
(2521, '3124807', 'ESTRELA DO SUL', 31),
(2522, '3124906', 'EUGENOPOLIS', 31),
(2523, '3125002', 'EWBANK DA CAMARA', 31),
(2524, '3125101', 'EXTREMA', 31),
(2525, '3125200', 'FAMA', 31),
(2526, '3125309', 'FARIA LEMOS', 31),
(2527, '3125408', 'FELICIO DOS SANTOS', 31),
(2528, '3125507', 'SAO GONCALO DO RIO PRETO', 31),
(2529, '3125606', 'FELISBURGO', 31),
(2530, '3125705', 'FELIXLANDIA', 31),
(2531, '3125804', 'FERNANDES TOURINHO', 31),
(2532, '3125903', 'FERROS', 31),
(2533, '3125952', 'FERVEDOURO', 31),
(2534, '3126000', 'FLORESTAL', 31),
(2535, '3126109', 'FORMIGA', 31),
(2536, '3126208', 'FORMOSO', 31),
(2537, '3126307', 'FORTALEZA DE MINAS', 31),
(2538, '3126406', 'FORTUNA DE MINAS', 31),
(2539, '3126505', 'FRANCISCO BADARO', 31),
(2540, '3126604', 'FRANCISCO DUMONT', 31),
(2541, '3126703', 'FRANCISCO SA', 31),
(2542, '3126752', 'FRANCISCOPOLIS', 31),
(2543, '3126802', 'FREI GASPAR', 31),
(2544, '3126901', 'FREI INOCENCIO', 31),
(2545, '3126950', 'FREI LAGONEGRO', 31),
(2546, '3127008', 'FRONTEIRA', 31),
(2547, '3127057', 'FRONTEIRA DOS VALES', 31),
(2548, '3127073', 'FRUTA DE LEITE', 31),
(2549, '3127107', 'FRUTAL', 31),
(2550, '3127206', 'FUNILANDIA', 31),
(2551, '3127305', 'GALILEIA', 31),
(2552, '3127339', 'GAMELEIRAS', 31),
(2553, '3127354', 'GLAUCILANDIA', 31),
(2554, '3127370', 'GOIABEIRA', 31),
(2555, '3127388', 'GOIANA', 31),
(2556, '3127404', 'GONCALVES', 31),
(2557, '3127503', 'GONZAGA', 31),
(2558, '3127602', 'GOUVEIA', 31),
(2559, '3127701', 'GOVERNADOR VALADARES', 31),
(2560, '3127800', 'GRAO MOGOL', 31),
(2561, '3127909', 'GRUPIARA', 31),
(2562, '3128006', 'GUANHAES', 31),
(2563, '3128105', 'GUAPE', 31),
(2564, '3128204', 'GUARACIABA', 31),
(2565, '3128253', 'GUARACIAMA', 31),
(2566, '3128303', 'GUARANESIA', 31),
(2567, '3128402', 'GUARANI', 31),
(2568, '3128501', 'GUARARA', 31),
(2569, '3128600', 'GUARDA-MOR', 31),
(2570, '3128709', 'GUAXUPE', 31),
(2571, '3128808', 'GUIDOVAL', 31),
(2572, '3128907', 'GUIMARANIA', 31),
(2573, '3129004', 'GUIRICEMA', 31),
(2574, '3129103', 'GURINHATA', 31),
(2575, '3129202', 'HELIODORA', 31),
(2576, '3129301', 'IAPU', 31),
(2577, '3129400', 'IBERTIOGA', 31),
(2578, '3129509', 'IBIA', 31),
(2579, '3129608', 'IBIAI', 31),
(2580, '3129657', 'IBIRACATU', 31),
(2581, '3129707', 'IBIRACI', 31),
(2582, '3129806', 'IBIRITE', 31),
(2583, '3129905', 'IBITIURA DE MINAS', 31),
(2584, '3130002', 'IBITURUNA', 31),
(2585, '3130051', 'ICARAI DE MINAS', 31),
(2586, '3130101', 'IGARAPE', 31),
(2587, '3130200', 'IGARATINGA', 31),
(2588, '3130309', 'IGUATAMA', 31),
(2589, '3130408', 'IJACI', 31),
(2590, '3130507', 'ILICINEA', 31),
(2591, '3130556', 'IMBE DE MINAS', 31),
(2592, '3130606', 'INCONFIDENTES', 31),
(2593, '3130655', 'INDAIABIRA', 31),
(2594, '3130705', 'INDIANOPOLIS', 31),
(2595, '3130804', 'INGAI', 31),
(2596, '3130903', 'INHAPIM', 31),
(2597, '3131000', 'INHAUMA', 31),
(2598, '3131109', 'INIMUTABA', 31),
(2599, '3131158', 'IPABA', 31),
(2600, '3131208', 'IPANEMA', 31),
(2601, '3131307', 'IPATINGA', 31),
(2602, '3131406', 'IPIACU', 31),
(2603, '3131505', 'IPUIUNA', 31),
(2604, '3131604', 'IRAI DE MINAS', 31),
(2605, '3131703', 'ITABIRA', 31),
(2606, '3131802', 'ITABIRINHA', 31),
(2607, '3131901', 'ITABIRITO', 31),
(2608, '3132008', 'ITACAMBIRA', 31),
(2609, '3132107', 'ITACARAMBI', 31),
(2610, '3132206', 'ITAGUARA', 31),
(2611, '3132305', 'ITAIPE', 31),
(2612, '3132404', 'ITAJUBA', 31),
(2613, '3132503', 'ITAMARANDIBA', 31),
(2614, '3132602', 'ITAMARATI DE MINAS', 31),
(2615, '3132701', 'ITAMBACURI', 31),
(2616, '3132800', 'ITAMBE DO MATO DENTRO', 31),
(2617, '3132909', 'ITAMOGI', 31),
(2618, '3133006', 'ITAMONTE', 31),
(2619, '3133105', 'ITANHANDU', 31),
(2620, '3133204', 'ITANHOMI', 31),
(2621, '3133303', 'ITAOBIM', 31),
(2622, '3133402', 'ITAPAGIPE', 31),
(2623, '3133501', 'ITAPECERICA', 31),
(2624, '3133600', 'ITAPEVA', 31),
(2625, '3133709', 'ITATIAIUCU', 31),
(2626, '3133758', 'ITAU DE MINAS', 31),
(2627, '3133808', 'ITAUNA', 31),
(2628, '3133907', 'ITAVERAVA', 31),
(2629, '3134004', 'ITINGA', 31),
(2630, '3134103', 'ITUETA', 31),
(2631, '3134202', 'ITUIUTABA', 31),
(2632, '3134301', 'ITUMIRIM', 31),
(2633, '3134400', 'ITURAMA', 31),
(2634, '3134509', 'ITUTINGA', 31),
(2635, '3134608', 'JABOTICATUBAS', 31),
(2636, '3134707', 'JACINTO', 31),
(2637, '3134806', 'JACUI', 31),
(2638, '3134905', 'JACUTINGA', 31),
(2639, '3135001', 'JAGUARACU', 31),
(2640, '3135050', 'JAIBA', 31),
(2641, '3135076', 'JAMPRUCA', 31),
(2642, '3135100', 'JANAUBA', 31),
(2643, '3135209', 'JANUARIA', 31),
(2644, '3135308', 'JAPARAIBA', 31),
(2645, '3135357', 'JAPONVAR', 31),
(2646, '3135407', 'JECEABA', 31),
(2647, '3135456', 'JENIPAPO DE MINAS', 31),
(2648, '3135506', 'JEQUERI', 31),
(2649, '3135605', 'JEQUITAI', 31),
(2650, '3135704', 'JEQUITIBA', 31),
(2651, '3135803', 'JEQUITINHONHA', 31),
(2652, '3135902', 'JESUANIA', 31),
(2653, '3136009', 'JOAIMA', 31),
(2654, '3136108', 'JOANESIA', 31),
(2655, '3136207', 'JOAO MONLEVADE', 31),
(2656, '3136306', 'JOAO PINHEIRO', 31),
(2657, '3136405', 'JOAQUIM FELICIO', 31),
(2658, '3136504', 'JORDANIA', 31),
(2659, '3136520', 'JOSE GONCALVES DE MINAS', 31),
(2660, '3136553', 'JOSE RAYDAN', 31),
(2661, '3136579', 'JOSENOPOLIS', 31),
(2662, '3136603', 'NOVA UNIAO', 31),
(2663, '3136652', 'JUATUBA', 31),
(2664, '3136702', 'JUIZ DE FORA', 31),
(2665, '3136801', 'JURAMENTO', 31),
(2666, '3136900', 'JURUAIA', 31),
(2667, '3136959', 'JUVENILIA', 31),
(2668, '3137007', 'LADAINHA', 31),
(2669, '3137106', 'LAGAMAR', 31),
(2670, '3137205', 'LAGOA DA PRATA', 31),
(2671, '3137304', 'LAGOA DOS PATOS', 31),
(2672, '3137403', 'LAGOA DOURADA', 31),
(2673, '3137502', 'LAGOA FORMOSA', 31),
(2674, '3137536', 'LAGOA GRANDE', 31),
(2675, '3137601', 'LAGOA SANTA', 31),
(2676, '3137700', 'LAJINHA', 31),
(2677, '3137809', 'LAMBARI', 31),
(2678, '3137908', 'LAMIM', 31),
(2679, '3138005', 'LARANJAL', 31),
(2680, '3138104', 'LASSANCE', 31),
(2681, '3138203', 'LAVRAS', 31),
(2682, '3138302', 'LEANDRO FERREIRA', 31),
(2683, '3138351', 'LEME DO PRADO', 31),
(2684, '3138401', 'LEOPOLDINA', 31),
(2685, '3138500', 'LIBERDADE', 31),
(2686, '3138609', 'LIMA DUARTE', 31),
(2687, '3138625', 'LIMEIRA DO OESTE', 31),
(2688, '3138658', 'LONTRA', 31),
(2689, '3138674', 'LUISBURGO', 31),
(2690, '3138682', 'LUISLANDIA', 31),
(2691, '3138708', 'LUMINARIAS', 31),
(2692, '3138807', 'LUZ', 31),
(2693, '3138906', 'MACHACALIS', 31),
(2694, '3139003', 'MACHADO', 31),
(2695, '3139102', 'MADRE DE DEUS DE MINAS', 31),
(2696, '3139201', 'MALACACHETA', 31),
(2697, '3139250', 'MAMONAS', 31),
(2698, '3139300', 'MANGA', 31),
(2699, '3139409', 'MANHUACU', 31),
(2700, '3139508', 'MANHUMIRIM', 31),
(2701, '3139607', 'MANTENA', 31),
(2702, '3139706', 'MARAVILHAS', 31),
(2703, '3139805', 'MAR DE ESPANHA', 31),
(2704, '3139904', 'MARIA DA FE', 31),
(2705, '3140001', 'MARIANA', 31),
(2706, '3140100', 'MARILAC', 31),
(2707, '3140159', 'MARIO CAMPOS', 31),
(2708, '3140209', 'MARIPA DE MINAS', 31),
(2709, '3140308', 'MARLIERIA', 31),
(2710, '3140407', 'MARMELOPOLIS', 31),
(2711, '3140506', 'MARTINHO CAMPOS', 31),
(2712, '3140530', 'MARTINS SOARES', 31),
(2713, '3140555', 'MATA VERDE', 31),
(2714, '3140605', 'MATERLANDIA', 31),
(2715, '3140704', 'MATEUS LEME', 31),
(2716, '3140803', 'MATIAS BARBOSA', 31),
(2717, '3140852', 'MATIAS CARDOSO', 31),
(2718, '3140902', 'MATIPO', 31),
(2719, '3141009', 'MATO VERDE', 31),
(2720, '3141108', 'MATOZINHOS', 31),
(2721, '3141207', 'MATUTINA', 31),
(2722, '3141306', 'MEDEIROS', 31),
(2723, '3141405', 'MEDINA', 31),
(2724, '3141504', 'MENDES PIMENTEL', 31),
(2725, '3141603', 'MERCES', 31),
(2726, '3141702', 'MESQUITA', 31),
(2727, '3141801', 'MINAS NOVAS', 31),
(2728, '3141900', 'MINDURI', 31),
(2729, '3142007', 'MIRABELA', 31),
(2730, '3142106', 'MIRADOURO', 31),
(2731, '3142205', 'MIRAI', 31),
(2732, '3142254', 'MIRAVANIA', 31),
(2733, '3142304', 'MOEDA', 31),
(2734, '3142403', 'MOEMA', 31),
(2735, '3142502', 'MONJOLOS', 31),
(2736, '3142601', 'MONSENHOR PAULO', 31),
(2737, '3142700', 'MONTALVANIA', 31),
(2738, '3142809', 'MONTE ALEGRE DE MINAS', 31),
(2739, '3142908', 'MONTE AZUL', 31),
(2740, '3143005', 'MONTE BELO', 31),
(2741, '3143104', 'MONTE CARMELO', 31),
(2742, '3143153', 'MONTE FORMOSO', 31),
(2743, '3143203', 'MONTE SANTO DE MINAS', 31),
(2744, '3143302', 'MONTES CLAROS', 31),
(2745, '3143401', 'MONTE SIAO', 31),
(2746, '3143450', 'MONTEZUMA', 31),
(2747, '3143500', 'MORADA NOVA DE MINAS', 31),
(2748, '3143609', 'MORRO DA GARCA', 31),
(2749, '3143708', 'MORRO DO PILAR', 31),
(2750, '3143807', 'MUNHOZ', 31),
(2751, '3143906', 'MURIAE', 31),
(2752, '3144003', 'MUTUM', 31),
(2753, '3144102', 'MUZAMBINHO', 31),
(2754, '3144201', 'NACIP RAYDAN', 31),
(2755, '3144300', 'NANUQUE', 31),
(2756, '3144359', 'NAQUE', 31),
(2757, '3144375', 'NATALANDIA', 31),
(2758, '3144409', 'NATERCIA', 31),
(2759, '3144508', 'NAZARENO', 31),
(2760, '3144607', 'NEPOMUCENO', 31),
(2761, '3144656', 'NINHEIRA', 31),
(2762, '3144672', 'NOVA BELEM', 31),
(2763, '3144706', 'NOVA ERA', 31),
(2764, '3144805', 'NOVA LIMA', 31);
INSERT INTO `territories` (`id`, `code_ibge`, `name`, `uf_id`) VALUES
(2765, '3144904', 'NOVA MODICA', 31),
(2766, '3145000', 'NOVA PONTE', 31),
(2767, '3145059', 'NOVA PORTEIRINHA', 31),
(2768, '3145109', 'NOVA RESENDE', 31),
(2769, '3145208', 'NOVA SERRANA', 31),
(2770, '3145307', 'NOVO CRUZEIRO', 31),
(2771, '3145356', 'NOVO ORIENTE DE MINAS', 31),
(2772, '3145372', 'NOVORIZONTE', 31),
(2773, '3145406', 'OLARIA', 31),
(2774, '3145455', 'OLHOS D\'AGUA', 31),
(2775, '3145505', 'OLIMPIO NORONHA', 31),
(2776, '3145604', 'OLIVEIRA', 31),
(2777, '3145703', 'OLIVEIRA FORTES', 31),
(2778, '3145802', 'ONCA DE PITANGUI', 31),
(2779, '3145851', 'ORATORIOS', 31),
(2780, '3145877', 'ORIZANIA', 31),
(2781, '3145901', 'OURO BRANCO', 31),
(2782, '3146008', 'OURO FINO', 31),
(2783, '3146107', 'OURO PRETO', 31),
(2784, '3146206', 'OURO VERDE DE MINAS', 31),
(2785, '3146255', 'PADRE CARVALHO', 31),
(2786, '3146305', 'PADRE PARAISO', 31),
(2787, '3146404', 'PAINEIRAS', 31),
(2788, '3146503', 'PAINS', 31),
(2789, '3146552', 'PAI PEDRO', 31),
(2790, '3146602', 'PAIVA', 31),
(2791, '3146701', 'PALMA', 31),
(2792, '3146750', 'PALMOPOLIS', 31),
(2793, '3146909', 'PAPAGAIOS', 31),
(2794, '3147006', 'PARACATU', 31),
(2795, '3147105', 'PARA DE MINAS', 31),
(2796, '3147204', 'PARAGUACU', 31),
(2797, '3147303', 'PARAISOPOLIS', 31),
(2798, '3147402', 'PARAOPEBA', 31),
(2799, '3147501', 'PASSABEM', 31),
(2800, '3147600', 'PASSA QUATRO', 31),
(2801, '3147709', 'PASSA TEMPO', 31),
(2802, '3147808', 'PASSA-VINTE', 31),
(2803, '3147907', 'PASSOS', 31),
(2804, '3147956', 'PATIS', 31),
(2805, '3148004', 'PATOS DE MINAS', 31),
(2806, '3148103', 'PATROCINIO', 31),
(2807, '3148202', 'PATROCINIO DO MURIAE', 31),
(2808, '3148301', 'PAULA CANDIDO', 31),
(2809, '3148400', 'PAULISTAS', 31),
(2810, '3148509', 'PAVAO', 31),
(2811, '3148608', 'PECANHA', 31),
(2812, '3148707', 'PEDRA AZUL', 31),
(2813, '3148756', 'PEDRA BONITA', 31),
(2814, '3148806', 'PEDRA DO ANTA', 31),
(2815, '3148905', 'PEDRA DO INDAIA', 31),
(2816, '3149002', 'PEDRA DOURADA', 31),
(2817, '3149101', 'PEDRALVA', 31),
(2818, '3149150', 'PEDRAS DE MARIA DA CRUZ', 31),
(2819, '3149200', 'PEDRINOPOLIS', 31),
(2820, '3149309', 'PEDRO LEOPOLDO', 31),
(2821, '3149408', 'PEDRO TEIXEIRA', 31),
(2822, '3149507', 'PEQUERI', 31),
(2823, '3149606', 'PEQUI', 31),
(2824, '3149705', 'PERDIGAO', 31),
(2825, '3149804', 'PERDIZES', 31),
(2826, '3149903', 'PERDOES', 31),
(2827, '3149952', 'PERIQUITO', 31),
(2828, '3150000', 'PESCADOR', 31),
(2829, '3150109', 'PIAU', 31),
(2830, '3150158', 'PIEDADE DE CARATINGA', 31),
(2831, '3150208', 'PIEDADE DE PONTE NOVA', 31),
(2832, '3150307', 'PIEDADE DO RIO GRANDE', 31),
(2833, '3150406', 'PIEDADE DOS GERAIS', 31),
(2834, '3150505', 'PIMENTA', 31),
(2835, '3150539', 'PINGO-D\'AGUA', 31),
(2836, '3150570', 'PINTOPOLIS', 31),
(2837, '3150604', 'PIRACEMA', 31),
(2838, '3150703', 'PIRAJUBA', 31),
(2839, '3150802', 'PIRANGA', 31),
(2840, '3150901', 'PIRANGUCU', 31),
(2841, '3151008', 'PIRANGUINHO', 31),
(2842, '3151107', 'PIRAPETINGA', 31),
(2843, '3151206', 'PIRAPORA', 31),
(2844, '3151305', 'PIRAUBA', 31),
(2845, '3151404', 'PITANGUI', 31),
(2846, '3151503', 'PIUMHI', 31),
(2847, '3151602', 'PLANURA', 31),
(2848, '3151701', 'POCO FUNDO', 31),
(2849, '3151800', 'POCOS DE CALDAS', 31),
(2850, '3151909', 'POCRANE', 31),
(2851, '3152006', 'POMPEU', 31),
(2852, '3152105', 'PONTE NOVA', 31),
(2853, '3152131', 'PONTO CHIQUE', 31),
(2854, '3152170', 'PONTO DOS VOLANTES', 31),
(2855, '3152204', 'PORTEIRINHA', 31),
(2856, '3152303', 'PORTO FIRME', 31),
(2857, '3152402', 'POTE', 31),
(2858, '3152501', 'POUSO ALEGRE', 31),
(2859, '3152600', 'POUSO ALTO', 31),
(2860, '3152709', 'PRADOS', 31),
(2861, '3152808', 'PRATA', 31),
(2862, '3152907', 'PRATAPOLIS', 31),
(2863, '3153004', 'PRATINHA', 31),
(2864, '3153103', 'PRESIDENTE BERNARDES', 31),
(2865, '3153202', 'PRESIDENTE JUSCELINO', 31),
(2866, '3153301', 'PRESIDENTE KUBITSCHEK', 31),
(2867, '3153400', 'PRESIDENTE OLEGARIO', 31),
(2868, '3153509', 'ALTO JEQUITIBA', 31),
(2869, '3153608', 'PRUDENTE DE MORAIS', 31),
(2870, '3153707', 'QUARTEL GERAL', 31),
(2871, '3153806', 'QUELUZITO', 31),
(2872, '3153905', 'RAPOSOS', 31),
(2873, '3154002', 'RAUL SOARES', 31),
(2874, '3154101', 'RECREIO', 31),
(2875, '3154150', 'REDUTO', 31),
(2876, '3154200', 'RESENDE COSTA', 31),
(2877, '3154309', 'RESPLENDOR', 31),
(2878, '3154408', 'RESSAQUINHA', 31),
(2879, '3154457', 'RIACHINHO', 31),
(2880, '3154507', 'RIACHO DOS MACHADOS', 31),
(2881, '3154606', 'RIBEIRAO DAS NEVES', 31),
(2882, '3154705', 'RIBEIRAO VERMELHO', 31),
(2883, '3154804', 'RIO ACIMA', 31),
(2884, '3154903', 'RIO CASCA', 31),
(2885, '3155009', 'RIO DOCE', 31),
(2886, '3155108', 'RIO DO PRADO', 31),
(2887, '3155207', 'RIO ESPERA', 31),
(2888, '3155306', 'RIO MANSO', 31),
(2889, '3155405', 'RIO NOVO', 31),
(2890, '3155504', 'RIO PARANAIBA', 31),
(2891, '3155603', 'RIO PARDO DE MINAS', 31),
(2892, '3155702', 'RIO PIRACICABA', 31),
(2893, '3155801', 'RIO POMBA', 31),
(2894, '3155900', 'RIO PRETO', 31),
(2895, '3156007', 'RIO VERMELHO', 31),
(2896, '3156106', 'RITAPOLIS', 31),
(2897, '3156205', 'ROCHEDO DE MINAS', 31),
(2898, '3156304', 'RODEIRO', 31),
(2899, '3156403', 'ROMARIA', 31),
(2900, '3156452', 'ROSARIO DA LIMEIRA', 31),
(2901, '3156502', 'RUBELITA', 31),
(2902, '3156601', 'RUBIM', 31),
(2903, '3156700', 'SABARA', 31),
(2904, '3156809', 'SABINOPOLIS', 31),
(2905, '3156908', 'SACRAMENTO', 31),
(2906, '3157005', 'SALINAS', 31),
(2907, '3157104', 'SALTO DA DIVISA', 31),
(2908, '3157203', 'SANTA BARBARA', 31),
(2909, '3157252', 'SANTA BARBARA DO LESTE', 31),
(2910, '3157278', 'SANTA BARBARA DO MONTE VERDE', 31),
(2911, '3157302', 'SANTA BARBARA DO TUGURIO', 31),
(2912, '3157336', 'SANTA CRUZ DE MINAS', 31),
(2913, '3157377', 'SANTA CRUZ DE SALINAS', 31),
(2914, '3157401', 'SANTA CRUZ DO ESCALVADO', 31),
(2915, '3157500', 'SANTA EFIGENIA DE MINAS', 31),
(2916, '3157609', 'SANTA FE DE MINAS', 31),
(2917, '3157658', 'SANTA HELENA DE MINAS', 31),
(2918, '3157708', 'SANTA JULIANA', 31),
(2919, '3157807', 'SANTA LUZIA', 31),
(2920, '3157906', 'SANTA MARGARIDA', 31),
(2921, '3158003', 'SANTA MARIA DE ITABIRA', 31),
(2922, '3158102', 'SANTA MARIA DO SALTO', 31),
(2923, '3158201', 'SANTA MARIA DO SUACUI', 31),
(2924, '3158300', 'SANTANA DA VARGEM', 31),
(2925, '3158409', 'SANTANA DE CATAGUASES', 31),
(2926, '3158508', 'SANTANA DE PIRAPAMA', 31),
(2927, '3158607', 'SANTANA DO DESERTO', 31),
(2928, '3158706', 'SANTANA DO GARAMBEU', 31),
(2929, '3158805', 'SANTANA DO JACARE', 31),
(2930, '3158904', 'SANTANA DO MANHUACU', 31),
(2931, '3158953', 'SANTANA DO PARAISO', 31),
(2932, '3159001', 'SANTANA DO RIACHO', 31),
(2933, '3159100', 'SANTANA DOS MONTES', 31),
(2934, '3159209', 'SANTA RITA DE CALDAS', 31),
(2935, '3159308', 'SANTA RITA DE JACUTINGA', 31),
(2936, '3159357', 'SANTA RITA DE MINAS', 31),
(2937, '3159407', 'SANTA RITA DE IBITIPOCA', 31),
(2938, '3159506', 'SANTA RITA DO ITUETO', 31),
(2939, '3159605', 'SANTA RITA DO SAPUCAI', 31),
(2940, '3159704', 'SANTA ROSA DA SERRA', 31),
(2941, '3159803', 'SANTA VITORIA', 31),
(2942, '3159902', 'SANTO ANTONIO DO AMPARO', 31),
(2943, '3160009', 'SANTO ANTONIO DO AVENTUREIRO', 31),
(2944, '3160108', 'SANTO ANTONIO DO GRAMA', 31),
(2945, '3160207', 'SANTO ANTONIO DO ITAMBE', 31),
(2946, '3160306', 'SANTO ANTONIO DO JACINTO', 31),
(2947, '3160405', 'SANTO ANTONIO DO MONTE', 31),
(2948, '3160454', 'SANTO ANTONIO DO RETIRO', 31),
(2949, '3160504', 'SANTO ANTONIO DO RIO ABAIXO', 31),
(2950, '3160603', 'SANTO HIPOLITO', 31),
(2951, '3160702', 'SANTOS DUMONT', 31),
(2952, '3160801', 'SAO BENTO ABADE', 31),
(2953, '3160900', 'SAO BRAS DO SUACUI', 31),
(2954, '3160959', 'SAO DOMINGOS DAS DORES', 31),
(2955, '3161007', 'SAO DOMINGOS DO PRATA', 31),
(2956, '3161056', 'SAO FELIX DE MINAS', 31),
(2957, '3161106', 'SAO FRANCISCO', 31),
(2958, '3161205', 'SAO FRANCISCO DE PAULA', 31),
(2959, '3161304', 'SAO FRANCISCO DE SALES', 31),
(2960, '3161403', 'SAO FRANCISCO DO GLORIA', 31),
(2961, '3161502', 'SAO GERALDO', 31),
(2962, '3161601', 'SAO GERALDO DA PIEDADE', 31),
(2963, '3161650', 'SAO GERALDO DO BAIXIO', 31),
(2964, '3161700', 'SAO GONCALO DO ABAETE', 31),
(2965, '3161809', 'SAO GONCALO DO PARA', 31),
(2966, '3161908', 'SAO GONCALO DO RIO ABAIXO', 31),
(2967, '3162005', 'SAO GONCALO DO SAPUCAI', 31),
(2968, '3162104', 'SAO GOTARDO', 31),
(2969, '3162203', 'SAO JOAO BATISTA DO GLORIA', 31),
(2970, '3162252', 'SAO JOAO DA LAGOA', 31),
(2971, '3162302', 'SAO JOAO DA MATA', 31),
(2972, '3162401', 'SAO JOAO DA PONTE', 31),
(2973, '3162450', 'SAO JOAO DAS MISSOES', 31),
(2974, '3162500', 'SAO JOAO DEL REI', 31),
(2975, '3162559', 'SAO JOAO DO MANHUACU', 31),
(2976, '3162575', 'SAO JOAO DO MANTENINHA', 31),
(2977, '3162609', 'SAO JOAO DO ORIENTE', 31),
(2978, '3162658', 'SAO JOAO DO PACUI', 31),
(2979, '3162708', 'SAO JOAO DO PARAISO', 31),
(2980, '3162807', 'SAO JOAO EVANGELISTA', 31),
(2981, '3162906', 'SAO JOAO NEPOMUCENO', 31),
(2982, '3162922', 'SAO JOAQUIM DE BICAS', 31),
(2983, '3162948', 'SAO JOSE DA BARRA', 31),
(2984, '3162955', 'SAO JOSE DA LAPA', 31),
(2985, '3163003', 'SAO JOSE DA SAFIRA', 31),
(2986, '3163102', 'SAO JOSE DA VARGINHA', 31),
(2987, '3163201', 'SAO JOSE DO ALEGRE', 31),
(2988, '3163300', 'SAO JOSE DO DIVINO', 31),
(2989, '3163409', 'SAO JOSE DO GOIABAL', 31),
(2990, '3163508', 'SAO JOSE DO JACURI', 31),
(2991, '3163607', 'SAO JOSE DO MANTIMENTO', 31),
(2992, '3163706', 'SAO LOURENCO', 31),
(2993, '3163805', 'SAO MIGUEL DO ANTA', 31),
(2994, '3163904', 'SAO PEDRO DA UNIAO', 31),
(2995, '3164001', 'SAO PEDRO DOS FERROS', 31),
(2996, '3164100', 'SAO PEDRO DO SUACUI', 31),
(2997, '3164209', 'SAO ROMAO', 31),
(2998, '3164308', 'SAO ROQUE DE MINAS', 31),
(2999, '3164407', 'SAO SEBASTIAO DA BELA VISTA', 31),
(3000, '3164431', 'SAO SEBASTIAO DA VARGEM ALEGRE', 31),
(3001, '3164472', 'SAO SEBASTIAO DO ANTA', 31),
(3002, '3164506', 'SAO SEBASTIAO DO MARANHAO', 31),
(3003, '3164605', 'SAO SEBASTIAO DO OESTE', 31),
(3004, '3164704', 'SAO SEBASTIAO DO PARAISO', 31),
(3005, '3164803', 'SAO SEBASTIAO DO RIO PRETO', 31),
(3006, '3164902', 'SAO SEBASTIAO DO RIO VERDE', 31),
(3007, '3165008', 'SAO TIAGO', 31),
(3008, '3165107', 'SAO TOMAS DE AQUINO', 31),
(3009, '3165206', 'SAO THOME DAS LETRAS', 31),
(3010, '3165305', 'SAO VICENTE DE MINAS', 31),
(3011, '3165404', 'SAPUCAI-MIRIM', 31),
(3012, '3165503', 'SARDOA', 31),
(3013, '3165537', 'SARZEDO', 31),
(3014, '3165552', 'SETUBINHA', 31),
(3015, '3165560', 'SEM-PEIXE', 31),
(3016, '3165578', 'SENADOR AMARAL', 31),
(3017, '3165602', 'SENADOR CORTES', 31),
(3018, '3165701', 'SENADOR FIRMINO', 31),
(3019, '3165800', 'SENADOR JOSE BENTO', 31),
(3020, '3165909', 'SENADOR MODESTINO GONCALVES', 31),
(3021, '3166006', 'SENHORA DE OLIVEIRA', 31),
(3022, '3166105', 'SENHORA DO PORTO', 31),
(3023, '3166204', 'SENHORA DOS REMEDIOS', 31),
(3024, '3166303', 'SERICITA', 31),
(3025, '3166402', 'SERITINGA', 31),
(3026, '3166501', 'SERRA AZUL DE MINAS', 31),
(3027, '3166600', 'SERRA DA SAUDADE', 31),
(3028, '3166709', 'SERRA DOS AIMORES', 31),
(3029, '3166808', 'SERRA DO SALITRE', 31),
(3030, '3166907', 'SERRANIA', 31),
(3031, '3166956', 'SERRANOPOLIS DE MINAS', 31),
(3032, '3167004', 'SERRANOS', 31),
(3033, '3167103', 'SERRO', 31),
(3034, '3167202', 'SETE LAGOAS', 31),
(3035, '3167301', 'SILVEIRANIA', 31),
(3036, '3167400', 'SILVIANOPOLIS', 31),
(3037, '3167509', 'SIMAO PEREIRA', 31),
(3038, '3167608', 'SIMONESIA', 31),
(3039, '3167707', 'SOBRALIA', 31),
(3040, '3167806', 'SOLEDADE DE MINAS', 31),
(3041, '3167905', 'TABULEIRO', 31),
(3042, '3168002', 'TAIOBEIRAS', 31),
(3043, '3168051', 'TAPARUBA', 31),
(3044, '3168101', 'TAPIRA', 31),
(3045, '3168200', 'TAPIRAI', 31),
(3046, '3168309', 'TAQUARACU DE MINAS', 31),
(3047, '3168408', 'TARUMIRIM', 31),
(3048, '3168507', 'TEIXEIRAS', 31),
(3049, '3168606', 'TEOFILO OTONI', 31),
(3050, '3168705', 'TIMOTEO', 31),
(3051, '3168804', 'TIRADENTES', 31),
(3052, '3168903', 'TIROS', 31),
(3053, '3169000', 'TOCANTINS', 31),
(3054, '3169059', 'TOCOS DO MOJI', 31),
(3055, '3169109', 'TOLEDO', 31),
(3056, '3169208', 'TOMBOS', 31),
(3057, '3169307', 'TRES CORACOES', 31),
(3058, '3169356', 'TRES MARIAS', 31),
(3059, '3169406', 'TRES PONTAS', 31),
(3060, '3169505', 'TUMIRITINGA', 31),
(3061, '3169604', 'TUPACIGUARA', 31),
(3062, '3169703', 'TURMALINA', 31),
(3063, '3169802', 'TURVOLANDIA', 31),
(3064, '3169901', 'UBA', 31),
(3065, '3170008', 'UBAI', 31),
(3066, '3170057', 'UBAPORANGA', 31),
(3067, '3170107', 'UBERABA', 31),
(3068, '3170206', 'UBERLANDIA', 31),
(3069, '3170305', 'UMBURATIBA', 31),
(3070, '3170404', 'UNAI', 31),
(3071, '3170438', 'UNIAO DE MINAS', 31),
(3072, '3170479', 'URUANA DE MINAS', 31),
(3073, '3170503', 'URUCANIA', 31),
(3074, '3170529', 'URUCUIA', 31),
(3075, '3170578', 'VARGEM ALEGRE', 31),
(3076, '3170602', 'VARGEM BONITA', 31),
(3077, '3170651', 'VARGEM GRANDE DO RIO PARDO', 31),
(3078, '3170701', 'VARGINHA', 31),
(3079, '3170750', 'VARJAO DE MINAS', 31),
(3080, '3170800', 'VARZEA DA PALMA', 31),
(3081, '3170909', 'VARZELANDIA', 31),
(3082, '3171006', 'VAZANTE', 31),
(3083, '3171030', 'VERDELANDIA', 31),
(3084, '3171071', 'VEREDINHA', 31),
(3085, '3171105', 'VERISSIMO', 31),
(3086, '3171154', 'VERMELHO NOVO', 31),
(3087, '3171204', 'VESPASIANO', 31),
(3088, '3171303', 'VICOSA', 31),
(3089, '3171402', 'VIEIRAS', 31),
(3090, '3171501', 'MATHIAS LOBATO', 31),
(3091, '3171600', 'VIRGEM DA LAPA', 31),
(3092, '3171709', 'VIRGINIA', 31),
(3093, '3171808', 'VIRGINOPOLIS', 31),
(3094, '3171907', 'VIRGOLANDIA', 31),
(3095, '3172004', 'VISCONDE DO RIO BRANCO', 31),
(3096, '3172103', 'VOLTA GRANDE', 31),
(3097, '3172202', 'WENCESLAU BRAZ', 31),
(3098, '3200102', 'AFONSO CLAUDIO', 32),
(3099, '3200136', 'AGUIA BRANCA', 32),
(3100, '3200169', 'AGUA DOCE DO NORTE', 32),
(3101, '3200201', 'ALEGRE', 32),
(3102, '3200300', 'ALFREDO CHAVES', 32),
(3103, '3200359', 'ALTO RIO NOVO', 32),
(3104, '3200409', 'ANCHIETA', 32),
(3105, '3200508', 'APIACA', 32),
(3106, '3200607', 'ARACRUZ', 32),
(3107, '3200706', 'ATILIO VIVACQUA', 32),
(3108, '3200805', 'BAIXO GUANDU', 32),
(3109, '3200904', 'BARRA DE SAO FRANCISCO', 32),
(3110, '3201001', 'BOA ESPERANCA', 32),
(3111, '3201100', 'BOM JESUS DO NORTE', 32),
(3112, '3201159', 'BREJETUBA', 32),
(3113, '3201209', 'CACHOEIRO DE ITAPEMIRIM', 32),
(3114, '3201308', 'CARIACICA', 32),
(3115, '3201407', 'CASTELO', 32),
(3116, '3201506', 'COLATINA', 32),
(3117, '3201605', 'CONCEICAO DA BARRA', 32),
(3118, '3201704', 'CONCEICAO DO CASTELO', 32),
(3119, '3201803', 'DIVINO DE SAO LOURENCO', 32),
(3120, '3201902', 'DOMINGOS MARTINS', 32),
(3121, '3202009', 'DORES DO RIO PRETO', 32),
(3122, '3202108', 'ECOPORANGA', 32),
(3123, '3202207', 'FUNDAO', 32),
(3124, '3202256', 'GOVERNADOR LINDENBERG', 32),
(3125, '3202306', 'GUACUI', 32),
(3126, '3202405', 'GUARAPARI', 32),
(3127, '3202454', 'IBATIBA', 32),
(3128, '3202504', 'IBIRACU', 32),
(3129, '3202553', 'IBITIRAMA', 32),
(3130, '3202603', 'ICONHA', 32),
(3131, '3202652', 'IRUPI', 32),
(3132, '3202702', 'ITAGUACU', 32),
(3133, '3202801', 'ITAPEMIRIM', 32),
(3134, '3202900', 'ITARANA', 32),
(3135, '3203007', 'IUNA', 32),
(3136, '3203056', 'JAGUARE', 32),
(3137, '3203106', 'JERONIMO MONTEIRO', 32),
(3138, '3203130', 'JOAO NEIVA', 32),
(3139, '3203163', 'LARANJA DA TERRA', 32),
(3140, '3203205', 'LINHARES', 32),
(3141, '3203304', 'MANTENOPOLIS', 32),
(3142, '3203320', 'MARATAIZES', 32),
(3143, '3203346', 'MARECHAL FLORIANO', 32),
(3144, '3203353', 'MARILANDIA', 32),
(3145, '3203403', 'MIMOSO DO SUL', 32),
(3146, '3203502', 'MONTANHA', 32),
(3147, '3203601', 'MUCURICI', 32),
(3148, '3203700', 'MUNIZ FREIRE', 32),
(3149, '3203809', 'MUQUI', 32),
(3150, '3203908', 'NOVA VENECIA', 32),
(3151, '3204005', 'PANCAS', 32),
(3152, '3204054', 'PEDRO CANARIO', 32),
(3153, '3204104', 'PINHEIROS', 32),
(3154, '3204203', 'PIUMA', 32),
(3155, '3204252', 'PONTO BELO', 32),
(3156, '3204302', 'PRESIDENTE KENNEDY', 32),
(3157, '3204351', 'RIO BANANAL', 32),
(3158, '3204401', 'RIO NOVO DO SUL', 32),
(3159, '3204500', 'SANTA LEOPOLDINA', 32),
(3160, '3204559', 'SANTA MARIA DE JETIBA', 32),
(3161, '3204609', 'SANTA TERESA', 32),
(3162, '3204658', 'SAO DOMINGOS DO NORTE', 32),
(3163, '3204708', 'SAO GABRIEL DA PALHA', 32),
(3164, '3204807', 'SAO JOSE DO CALCADO', 32),
(3165, '3204906', 'SAO MATEUS', 32),
(3166, '3204955', 'SAO ROQUE DO CANAA', 32),
(3167, '3205002', 'SERRA', 32),
(3168, '3205010', 'SOORETAMA', 32),
(3169, '3205036', 'VARGEM ALTA', 32),
(3170, '3205069', 'VENDA NOVA DO IMIGRANTE', 32),
(3171, '3205101', 'VIANA', 32),
(3172, '3205150', 'VILA PAVAO', 32),
(3173, '3205176', 'VILA VALERIO', 32),
(3174, '3205200', 'VILA VELHA', 32),
(3175, '3205309', 'VITORIA', 32),
(3176, '3300100', 'ANGRA DOS REIS', 33),
(3177, '3300159', 'APERIBE', 33),
(3178, '3300209', 'ARARUAMA', 33),
(3179, '3300225', 'AREAL', 33),
(3180, '3300233', 'ARMACAO DOS BUZIOS', 33),
(3181, '3300258', 'ARRAIAL DO CABO', 33),
(3182, '3300308', 'BARRA DO PIRAI', 33),
(3183, '3300407', 'BARRA MANSA', 33),
(3184, '3300456', 'BELFORD ROXO', 33),
(3185, '3300506', 'BOM JARDIM', 33),
(3186, '3300605', 'BOM JESUS DO ITABAPOANA', 33),
(3187, '3300704', 'CABO FRIO', 33),
(3188, '3300803', 'CACHOEIRAS DE MACACU', 33),
(3189, '3300902', 'CAMBUCI', 33),
(3190, '3300936', 'CARAPEBUS', 33),
(3191, '3300951', 'COMENDADOR LEVY GASPARIAN', 33),
(3192, '3301009', 'CAMPOS DOS GOYTACAZES', 33),
(3193, '3301108', 'CANTAGALO', 33),
(3194, '3301157', 'CARDOSO MOREIRA', 33),
(3195, '3301207', 'CARMO', 33),
(3196, '3301306', 'CASIMIRO DE ABREU', 33),
(3197, '3301405', 'CONCEICAO DE MACABU', 33),
(3198, '3301504', 'CORDEIRO', 33),
(3199, '3301603', 'DUAS BARRAS', 33),
(3200, '3301702', 'DUQUE DE CAXIAS', 33),
(3201, '3301801', 'ENGENHEIRO PAULO DE FRONTIN', 33),
(3202, '3301850', 'GUAPIMIRIM', 33),
(3203, '3301876', 'IGUABA GRANDE', 33),
(3204, '3301900', 'ITABORAI', 33),
(3205, '3302007', 'ITAGUAI', 33),
(3206, '3302056', 'ITALVA', 33),
(3207, '3302106', 'ITAOCARA', 33),
(3208, '3302205', 'ITAPERUNA', 33),
(3209, '3302254', 'ITATIAIA', 33),
(3210, '3302270', 'JAPERI', 33),
(3211, '3302304', 'LAJE DO MURIAE', 33),
(3212, '3302403', 'MACAE', 33),
(3213, '3302452', 'MACUCO', 33),
(3214, '3302502', 'MAGE', 33),
(3215, '3302601', 'MANGARATIBA', 33),
(3216, '3302700', 'MARICA', 33),
(3217, '3302809', 'MENDES', 33),
(3218, '3302858', 'MESQUITA', 33),
(3219, '3302908', 'MIGUEL PEREIRA', 33),
(3220, '3303005', 'MIRACEMA', 33),
(3221, '3303104', 'NATIVIDADE', 33),
(3222, '3303203', 'NILOPOLIS', 33),
(3223, '3303302', 'NITEROI', 33),
(3224, '3303401', 'NOVA FRIBURGO', 33),
(3225, '3303500', 'NOVA IGUACU', 33),
(3226, '3303609', 'PARACAMBI', 33),
(3227, '3303708', 'PARAIBA DO SUL', 33),
(3228, '3303807', 'PARATY', 33),
(3229, '3303856', 'PATY DO ALFERES', 33),
(3230, '3303906', 'PETROPOLIS', 33),
(3231, '3303955', 'PINHEIRAL', 33),
(3232, '3304003', 'PIRAI', 33),
(3233, '3304102', 'PORCIUNCULA', 33),
(3234, '3304110', 'PORTO REAL', 33),
(3235, '3304128', 'QUATIS', 33),
(3236, '3304144', 'QUEIMADOS', 33),
(3237, '3304151', 'QUISSAMA', 33),
(3238, '3304201', 'RESENDE', 33),
(3239, '3304300', 'RIO BONITO', 33),
(3240, '3304409', 'RIO CLARO', 33),
(3241, '3304508', 'RIO DAS FLORES', 33),
(3242, '3304524', 'RIO DAS OSTRAS', 33),
(3243, '3304557', 'RIO DE JANEIRO', 33),
(3244, '3304607', 'SANTA MARIA MADALENA', 33),
(3245, '3304706', 'SANTO ANTONIO DE PADUA', 33),
(3246, '3304755', 'SAO FRANCISCO DE ITABAPOANA', 33),
(3247, '3304805', 'SAO FIDELIS', 33),
(3248, '3304904', 'SAO GONCALO', 33),
(3249, '3305000', 'SAO JOAO DA BARRA', 33),
(3250, '3305109', 'SAO JOAO DE MERITI', 33),
(3251, '3305133', 'SAO JOSE DE UBA', 33),
(3252, '3305158', 'SAO JOSE DO VALE DO RIO PRETO', 33),
(3253, '3305208', 'SAO PEDRO DA ALDEIA', 33),
(3254, '3305307', 'SAO SEBASTIAO DO ALTO', 33),
(3255, '3305406', 'SAPUCAIA', 33),
(3256, '3305505', 'SAQUAREMA', 33),
(3257, '3305554', 'SEROPEDICA', 33),
(3258, '3305604', 'SILVA JARDIM', 33),
(3259, '3305703', 'SUMIDOURO', 33),
(3260, '3305752', 'TANGUA', 33),
(3261, '3305802', 'TERESOPOLIS', 33),
(3262, '3305901', 'TRAJANO DE MORAES', 33),
(3263, '3306008', 'TRES RIOS', 33),
(3264, '3306107', 'VALENCA', 33),
(3265, '3306156', 'VARRE-SAI', 33),
(3266, '3306206', 'VASSOURAS', 33),
(3267, '3306305', 'VOLTA REDONDA', 33),
(3268, '3500105', 'ADAMANTINA', 35),
(3269, '3500204', 'ADOLFO', 35),
(3270, '3500303', 'AGUAI', 35),
(3271, '3500402', 'AGUAS DA PRATA', 35),
(3272, '3500501', 'AGUAS DE LINDOIA', 35),
(3273, '3500550', 'AGUAS DE SANTA BARBARA', 35),
(3274, '3500600', 'AGUAS DE SAO PEDRO', 35),
(3275, '3500709', 'AGUDOS', 35),
(3276, '3500758', 'ALAMBARI', 35),
(3277, '3500808', 'ALFREDO MARCONDES', 35),
(3278, '3500907', 'ALTAIR', 35),
(3279, '3501004', 'ALTINOPOLIS', 35),
(3280, '3501103', 'ALTO ALEGRE', 35),
(3281, '3501152', 'ALUMINIO', 35),
(3282, '3501202', 'ALVARES FLORENCE', 35),
(3283, '3501301', 'ALVARES MACHADO', 35),
(3284, '3501400', 'ALVARO DE CARVALHO', 35),
(3285, '3501509', 'ALVINLANDIA', 35),
(3286, '3501608', 'AMERICANA', 35),
(3287, '3501707', 'AMERICO BRASILIENSE', 35),
(3288, '3501806', 'AMERICO DE CAMPOS', 35),
(3289, '3501905', 'AMPARO', 35),
(3290, '3502002', 'ANALANDIA', 35),
(3291, '3502101', 'ANDRADINA', 35),
(3292, '3502200', 'ANGATUBA', 35),
(3293, '3502309', 'ANHEMBI', 35),
(3294, '3502408', 'ANHUMAS', 35),
(3295, '3502507', 'APARECIDA', 35),
(3296, '3502606', 'APARECIDA D\'OESTE', 35),
(3297, '3502705', 'APIAI', 35),
(3298, '3502754', 'ARACARIGUAMA', 35),
(3299, '3502804', 'ARACATUBA', 35),
(3300, '3502903', 'ARACOIABA DA SERRA', 35),
(3301, '3503000', 'ARAMINA', 35),
(3302, '3503109', 'ARANDU', 35),
(3303, '3503158', 'ARAPEI', 35),
(3304, '3503208', 'ARARAQUARA', 35),
(3305, '3503307', 'ARARAS', 35),
(3306, '3503356', 'ARCO-IRIS', 35),
(3307, '3503406', 'AREALVA', 35),
(3308, '3503505', 'AREIAS', 35),
(3309, '3503604', 'AREIOPOLIS', 35),
(3310, '3503703', 'ARIRANHA', 35),
(3311, '3503802', 'ARTUR NOGUEIRA', 35),
(3312, '3503901', 'ARUJA', 35),
(3313, '3503950', 'ASPASIA', 35),
(3314, '3504008', 'ASSIS', 35),
(3315, '3504107', 'ATIBAIA', 35),
(3316, '3504206', 'AURIFLAMA', 35),
(3317, '3504305', 'AVAI', 35),
(3318, '3504404', 'AVANHANDAVA', 35),
(3319, '3504503', 'AVARE', 35),
(3320, '3504602', 'BADY BASSITT', 35),
(3321, '3504701', 'BALBINOS', 35),
(3322, '3504800', 'BALSAMO', 35),
(3323, '3504909', 'BANANAL', 35),
(3324, '3505005', 'BARAO DE ANTONINA', 35),
(3325, '3505104', 'BARBOSA', 35),
(3326, '3505203', 'BARIRI', 35),
(3327, '3505302', 'BARRA BONITA', 35),
(3328, '3505351', 'BARRA DO CHAPEU', 35),
(3329, '3505401', 'BARRA DO TURVO', 35),
(3330, '3505500', 'BARRETOS', 35),
(3331, '3505609', 'BARRINHA', 35),
(3332, '3505708', 'BARUERI', 35),
(3333, '3505807', 'BASTOS', 35),
(3334, '3505906', 'BATATAIS', 35),
(3335, '3506003', 'BAURU', 35),
(3336, '3506102', 'BEBEDOURO', 35),
(3337, '3506201', 'BENTO DE ABREU', 35),
(3338, '3506300', 'BERNARDINO DE CAMPOS', 35),
(3339, '3506359', 'BERTIOGA', 35),
(3340, '3506409', 'BILAC', 35),
(3341, '3506508', 'BIRIGUI', 35),
(3342, '3506607', 'BIRITIBA-MIRIM', 35),
(3343, '3506706', 'BOA ESPERANCA DO SUL', 35),
(3344, '3506805', 'BOCAINA', 35),
(3345, '3506904', 'BOFETE', 35),
(3346, '3507001', 'BOITUVA', 35),
(3347, '3507100', 'BOM JESUS DOS PERDOES', 35),
(3348, '3507159', 'BOM SUCESSO DE ITARARE', 35),
(3349, '3507209', 'BORA', 35),
(3350, '3507308', 'BORACEIA', 35),
(3351, '3507407', 'BORBOREMA', 35),
(3352, '3507456', 'BOREBI', 35),
(3353, '3507506', 'BOTUCATU', 35),
(3354, '3507605', 'BRAGANCA PAULISTA', 35),
(3355, '3507704', 'BRAUNA', 35),
(3356, '3507753', 'BREJO ALEGRE', 35),
(3357, '3507803', 'BRODOWSKI', 35),
(3358, '3507902', 'BROTAS', 35),
(3359, '3508009', 'BURI', 35),
(3360, '3508108', 'BURITAMA', 35),
(3361, '3508207', 'BURITIZAL', 35),
(3362, '3508306', 'CABRALIA PAULISTA', 35),
(3363, '3508405', 'CABREUVA', 35),
(3364, '3508504', 'CACAPAVA', 35),
(3365, '3508603', 'CACHOEIRA PAULISTA', 35),
(3366, '3508702', 'CACONDE', 35),
(3367, '3508801', 'CAFELANDIA', 35),
(3368, '3508900', 'CAIABU', 35),
(3369, '3509007', 'CAIEIRAS', 35),
(3370, '3509106', 'CAIUA', 35),
(3371, '3509205', 'CAJAMAR', 35),
(3372, '3509254', 'CAJATI', 35),
(3373, '3509304', 'CAJOBI', 35),
(3374, '3509403', 'CAJURU', 35),
(3375, '3509452', 'CAMPINA DO MONTE ALEGRE', 35),
(3376, '3509502', 'CAMPINAS', 35),
(3377, '3509601', 'CAMPO LIMPO PAULISTA', 35),
(3378, '3509700', 'CAMPOS DO JORDAO', 35),
(3379, '3509809', 'CAMPOS NOVOS PAULISTA', 35),
(3380, '3509908', 'CANANEIA', 35),
(3381, '3509957', 'CANAS', 35),
(3382, '3510005', 'CANDIDO MOTA', 35),
(3383, '3510104', 'CANDIDO RODRIGUES', 35),
(3384, '3510153', 'CANITAR', 35),
(3385, '3510203', 'CAPAO BONITO', 35),
(3386, '3510302', 'CAPELA DO ALTO', 35),
(3387, '3510401', 'CAPIVARI', 35),
(3388, '3510500', 'CARAGUATATUBA', 35),
(3389, '3510609', 'CARAPICUIBA', 35),
(3390, '3510708', 'CARDOSO', 35),
(3391, '3510807', 'CASA BRANCA', 35),
(3392, '3510906', 'CASSIA DOS COQUEIROS', 35),
(3393, '3511003', 'CASTILHO', 35),
(3394, '3511102', 'CATANDUVA', 35),
(3395, '3511201', 'CATIGUA', 35),
(3396, '3511300', 'CEDRAL', 35),
(3397, '3511409', 'CERQUEIRA CESAR', 35),
(3398, '3511508', 'CERQUILHO', 35),
(3399, '3511607', 'CESARIO LANGE', 35),
(3400, '3511706', 'CHARQUEADA', 35),
(3401, '3511904', 'CLEMENTINA', 35),
(3402, '3512001', 'COLINA', 35),
(3403, '3512100', 'COLOMBIA', 35),
(3404, '3512209', 'CONCHAL', 35),
(3405, '3512308', 'CONCHAS', 35),
(3406, '3512407', 'CORDEIROPOLIS', 35),
(3407, '3512506', 'COROADOS', 35),
(3408, '3512605', 'CORONEL MACEDO', 35),
(3409, '3512704', 'CORUMBATAI', 35),
(3410, '3512803', 'COSMOPOLIS', 35),
(3411, '3512902', 'COSMORAMA', 35),
(3412, '3513009', 'COTIA', 35),
(3413, '3513108', 'CRAVINHOS', 35),
(3414, '3513207', 'CRISTAIS PAULISTA', 35),
(3415, '3513306', 'CRUZALIA', 35),
(3416, '3513405', 'CRUZEIRO', 35),
(3417, '3513504', 'CUBATAO', 35),
(3418, '3513603', 'CUNHA', 35),
(3419, '3513702', 'DESCALVADO', 35),
(3420, '3513801', 'DIADEMA', 35),
(3421, '3513850', 'DIRCE REIS', 35),
(3422, '3513900', 'DIVINOLANDIA', 35),
(3423, '3514007', 'DOBRADA', 35),
(3424, '3514106', 'DOIS CORREGOS', 35),
(3425, '3514205', 'DOLCINOPOLIS', 35),
(3426, '3514304', 'DOURADO', 35),
(3427, '3514403', 'DRACENA', 35),
(3428, '3514502', 'DUARTINA', 35),
(3429, '3514601', 'DUMONT', 35),
(3430, '3514700', 'ECHAPORA', 35),
(3431, '3514809', 'ELDORADO', 35),
(3432, '3514908', 'ELIAS FAUSTO', 35),
(3433, '3514924', 'ELISIARIO', 35),
(3434, '3514957', 'EMBAUBA', 35),
(3435, '3515004', 'EMBU DAS ARTES', 35),
(3436, '3515103', 'EMBU-GUACU', 35),
(3437, '3515129', 'EMILIANOPOLIS', 35),
(3438, '3515152', 'ENGENHEIRO COELHO', 35),
(3439, '3515186', 'ESPIRITO SANTO DO PINHAL', 35),
(3440, '3515194', 'ESPIRITO SANTO DO TURVO', 35),
(3441, '3515202', 'ESTRELA D\'OESTE', 35),
(3442, '3515301', 'ESTRELA DO NORTE', 35),
(3443, '3515350', 'EUCLIDES DA CUNHA PAULISTA', 35),
(3444, '3515400', 'FARTURA', 35),
(3445, '3515509', 'FERNANDOPOLIS', 35),
(3446, '3515608', 'FERNANDO PRESTES', 35),
(3447, '3515657', 'FERNAO', 35),
(3448, '3515707', 'FERRAZ DE VASCONCELOS', 35),
(3449, '3515806', 'FLORA RICA', 35),
(3450, '3515905', 'FLOREAL', 35),
(3451, '3516002', 'FLORIDA PAULISTA', 35),
(3452, '3516101', 'FLORINIA', 35),
(3453, '3516200', 'FRANCA', 35),
(3454, '3516309', 'FRANCISCO MORATO', 35),
(3455, '3516408', 'FRANCO DA ROCHA', 35),
(3456, '3516507', 'GABRIEL MONTEIRO', 35),
(3457, '3516606', 'GALIA', 35),
(3458, '3516705', 'GARCA', 35),
(3459, '3516804', 'GASTAO VIDIGAL', 35),
(3460, '3516853', 'GAVIAO PEIXOTO', 35),
(3461, '3516903', 'GENERAL SALGADO', 35),
(3462, '3517000', 'GETULINA', 35),
(3463, '3517109', 'GLICERIO', 35),
(3464, '3517208', 'GUAICARA', 35),
(3465, '3517307', 'GUAIMBE', 35),
(3466, '3517406', 'GUAIRA', 35),
(3467, '3517505', 'GUAPIACU', 35),
(3468, '3517604', 'GUAPIARA', 35),
(3469, '3517703', 'GUARA', 35),
(3470, '3517802', 'GUARACAI', 35),
(3471, '3517901', 'GUARACI', 35),
(3472, '3518008', 'GUARANI D\'OESTE', 35),
(3473, '3518107', 'GUARANTA', 35),
(3474, '3518206', 'GUARARAPES', 35),
(3475, '3518305', 'GUARAREMA', 35),
(3476, '3518404', 'GUARATINGUETA', 35),
(3477, '3518503', 'GUAREI', 35),
(3478, '3518602', 'GUARIBA', 35),
(3479, '3518701', 'GUARUJA', 35),
(3480, '3518800', 'GUARULHOS', 35),
(3481, '3518859', 'GUATAPARA', 35),
(3482, '3518909', 'GUZOLANDIA', 35),
(3483, '3519006', 'HERCULANDIA', 35),
(3484, '3519055', 'HOLAMBRA', 35),
(3485, '3519071', 'HORTOLANDIA', 35),
(3486, '3519105', 'IACANGA', 35),
(3487, '3519204', 'IACRI', 35),
(3488, '3519253', 'IARAS', 35),
(3489, '3519303', 'IBATE', 35),
(3490, '3519402', 'IBIRA', 35),
(3491, '3519501', 'IBIRAREMA', 35),
(3492, '3519600', 'IBITINGA', 35),
(3493, '3519709', 'IBIUNA', 35),
(3494, '3519808', 'ICEM', 35),
(3495, '3519907', 'IEPE', 35),
(3496, '3520004', 'IGARACU DO TIETE', 35),
(3497, '3520103', 'IGARAPAVA', 35),
(3498, '3520202', 'IGARATA', 35),
(3499, '3520301', 'IGUAPE', 35),
(3500, '3520400', 'ILHABELA', 35),
(3501, '3520426', 'ILHA COMPRIDA', 35),
(3502, '3520442', 'ILHA SOLTEIRA', 35),
(3503, '3520509', 'INDAIATUBA', 35),
(3504, '3520608', 'INDIANA', 35),
(3505, '3520707', 'INDIAPORA', 35),
(3506, '3520806', 'INUBIA PAULISTA', 35),
(3507, '3520905', 'IPAUSSU', 35),
(3508, '3521002', 'IPERO', 35),
(3509, '3521101', 'IPEUNA', 35),
(3510, '3521150', 'IPIGUA', 35),
(3511, '3521200', 'IPORANGA', 35),
(3512, '3521309', 'IPUA', 35),
(3513, '3521408', 'IRACEMAPOLIS', 35),
(3514, '3521507', 'IRAPUA', 35),
(3515, '3521606', 'IRAPURU', 35),
(3516, '3521705', 'ITABERA', 35),
(3517, '3521804', 'ITAI', 35),
(3518, '3521903', 'ITAJOBI', 35),
(3519, '3522000', 'ITAJU', 35),
(3520, '3522109', 'ITANHAEM', 35),
(3521, '3522158', 'ITAOCA', 35),
(3522, '3522208', 'ITAPECERICA DA SERRA', 35),
(3523, '3522307', 'ITAPETININGA', 35),
(3524, '3522406', 'ITAPEVA', 35),
(3525, '3522505', 'ITAPEVI', 35),
(3526, '3522604', 'ITAPIRA', 35),
(3527, '3522653', 'ITAPIRAPUA PAULISTA', 35),
(3528, '3522703', 'ITAPOLIS', 35),
(3529, '3522802', 'ITAPORANGA', 35),
(3530, '3522901', 'ITAPUI', 35),
(3531, '3523008', 'ITAPURA', 35),
(3532, '3523107', 'ITAQUAQUECETUBA', 35),
(3533, '3523206', 'ITARARE', 35),
(3534, '3523305', 'ITARIRI', 35),
(3535, '3523404', 'ITATIBA', 35),
(3536, '3523503', 'ITATINGA', 35),
(3537, '3523602', 'ITIRAPINA', 35),
(3538, '3523701', 'ITIRAPUA', 35),
(3539, '3523800', 'ITOBI', 35),
(3540, '3523909', 'ITU', 35),
(3541, '3524006', 'ITUPEVA', 35),
(3542, '3524105', 'ITUVERAVA', 35),
(3543, '3524204', 'JABORANDI', 35),
(3544, '3524303', 'JABOTICABAL', 35),
(3545, '3524402', 'JACAREI', 35),
(3546, '3524501', 'JACI', 35),
(3547, '3524600', 'JACUPIRANGA', 35),
(3548, '3524709', 'JAGUARIUNA', 35),
(3549, '3524808', 'JALES', 35),
(3550, '3524907', 'JAMBEIRO', 35),
(3551, '3525003', 'JANDIRA', 35),
(3552, '3525102', 'JARDINOPOLIS', 35),
(3553, '3525201', 'JARINU', 35),
(3554, '3525300', 'JAU', 35),
(3555, '3525409', 'JERIQUARA', 35),
(3556, '3525508', 'JOANOPOLIS', 35),
(3557, '3525607', 'JOAO RAMALHO', 35),
(3558, '3525706', 'JOSE BONIFACIO', 35),
(3559, '3525805', 'JULIO MESQUITA', 35),
(3560, '3525854', 'JUMIRIM', 35),
(3561, '3525904', 'JUNDIAI', 35),
(3562, '3526001', 'JUNQUEIROPOLIS', 35),
(3563, '3526100', 'JUQUIA', 35),
(3564, '3526209', 'JUQUITIBA', 35),
(3565, '3526308', 'LAGOINHA', 35),
(3566, '3526407', 'LARANJAL PAULISTA', 35),
(3567, '3526506', 'LAVINIA', 35),
(3568, '3526605', 'LAVRINHAS', 35),
(3569, '3526704', 'LEME', 35),
(3570, '3526803', 'LENCOIS PAULISTA', 35),
(3571, '3526902', 'LIMEIRA', 35),
(3572, '3527009', 'LINDOIA', 35),
(3573, '3527108', 'LINS', 35),
(3574, '3527207', 'LORENA', 35),
(3575, '3527256', 'LOURDES', 35),
(3576, '3527306', 'LOUVEIRA', 35),
(3577, '3527405', 'LUCELIA', 35),
(3578, '3527504', 'LUCIANOPOLIS', 35),
(3579, '3527603', 'LUIS ANTONIO', 35),
(3580, '3527702', 'LUIZIANIA', 35),
(3581, '3527801', 'LUPERCIO', 35),
(3582, '3527900', 'LUTECIA', 35),
(3583, '3528007', 'MACATUBA', 35),
(3584, '3528106', 'MACAUBAL', 35),
(3585, '3528205', 'MACEDONIA', 35),
(3586, '3528304', 'MAGDA', 35),
(3587, '3528403', 'MAIRINQUE', 35),
(3588, '3528502', 'MAIRIPORA', 35),
(3589, '3528601', 'MANDURI', 35),
(3590, '3528700', 'MARABA PAULISTA', 35),
(3591, '3528809', 'MARACAI', 35),
(3592, '3528858', 'MARAPOAMA', 35),
(3593, '3528908', 'MARIAPOLIS', 35),
(3594, '3529005', 'MARILIA', 35),
(3595, '3529104', 'MARINOPOLIS', 35),
(3596, '3529203', 'MARTINOPOLIS', 35),
(3597, '3529302', 'MATAO', 35),
(3598, '3529401', 'MAUA', 35),
(3599, '3529500', 'MENDONCA', 35),
(3600, '3529609', 'MERIDIANO', 35),
(3601, '3529658', 'MESOPOLIS', 35),
(3602, '3529708', 'MIGUELOPOLIS', 35),
(3603, '3529807', 'MINEIROS DO TIETE', 35),
(3604, '3529906', 'MIRACATU', 35),
(3605, '3530003', 'MIRA ESTRELA', 35),
(3606, '3530102', 'MIRANDOPOLIS', 35),
(3607, '3530201', 'MIRANTE DO PARANAPANEMA', 35),
(3608, '3530300', 'MIRASSOL', 35),
(3609, '3530409', 'MIRASSOLANDIA', 35),
(3610, '3530508', 'MOCOCA', 35),
(3611, '3530607', 'MOGI DAS CRUZES', 35),
(3612, '3530706', 'MOGI GUACU', 35),
(3613, '3530805', 'MOGI MIRIM', 35),
(3614, '3530904', 'MOMBUCA', 35),
(3615, '3531001', 'MONCOES', 35),
(3616, '3531100', 'MONGAGUA', 35),
(3617, '3531209', 'MONTE ALEGRE DO SUL', 35),
(3618, '3531308', 'MONTE ALTO', 35),
(3619, '3531407', 'MONTE APRAZIVEL', 35),
(3620, '3531506', 'MONTE AZUL PAULISTA', 35),
(3621, '3531605', 'MONTE CASTELO', 35),
(3622, '3531704', 'MONTEIRO LOBATO', 35),
(3623, '3531803', 'MONTE MOR', 35),
(3624, '3531902', 'MORRO AGUDO', 35),
(3625, '3532009', 'MORUNGABA', 35),
(3626, '3532058', 'MOTUCA', 35),
(3627, '3532108', 'MURUTINGA DO SUL', 35),
(3628, '3532157', 'NANTES', 35),
(3629, '3532207', 'NARANDIBA', 35),
(3630, '3532306', 'NATIVIDADE DA SERRA', 35),
(3631, '3532405', 'NAZARE PAULISTA', 35),
(3632, '3532504', 'NEVES PAULISTA', 35),
(3633, '3532603', 'NHANDEARA', 35),
(3634, '3532702', 'NIPOA', 35),
(3635, '3532801', 'NOVA ALIANCA', 35),
(3636, '3532827', 'NOVA CAMPINA', 35),
(3637, '3532843', 'NOVA CANAA PAULISTA', 35),
(3638, '3532868', 'NOVA CASTILHO', 35),
(3639, '3532900', 'NOVA EUROPA', 35),
(3640, '3533007', 'NOVA GRANADA', 35),
(3641, '3533106', 'NOVA GUATAPORANGA', 35),
(3642, '3533205', 'NOVA INDEPENDENCIA', 35),
(3643, '3533254', 'NOVAIS', 35),
(3644, '3533304', 'NOVA LUZITANIA', 35),
(3645, '3533403', 'NOVA ODESSA', 35),
(3646, '3533502', 'NOVO HORIZONTE', 35),
(3647, '3533601', 'NUPORANGA', 35),
(3648, '3533700', 'OCAUCU', 35),
(3649, '3533809', 'OLEO', 35),
(3650, '3533908', 'OLIMPIA', 35),
(3651, '3534005', 'ONDA VERDE', 35),
(3652, '3534104', 'ORIENTE', 35),
(3653, '3534203', 'ORINDIUVA', 35),
(3654, '3534302', 'ORLANDIA', 35),
(3655, '3534401', 'OSASCO', 35),
(3656, '3534500', 'OSCAR BRESSANE', 35),
(3657, '3534609', 'OSVALDO CRUZ', 35),
(3658, '3534708', 'OURINHOS', 35),
(3659, '3534757', 'OUROESTE', 35),
(3660, '3534807', 'OURO VERDE', 35),
(3661, '3534906', 'PACAEMBU', 35),
(3662, '3535002', 'PALESTINA', 35),
(3663, '3535101', 'PALMARES PAULISTA', 35),
(3664, '3535200', 'PALMEIRA D\'OESTE', 35),
(3665, '3535309', 'PALMITAL', 35),
(3666, '3535408', 'PANORAMA', 35),
(3667, '3535507', 'PARAGUACU PAULISTA', 35),
(3668, '3535606', 'PARAIBUNA', 35),
(3669, '3535705', 'PARAISO', 35),
(3670, '3535804', 'PARANAPANEMA', 35),
(3671, '3535903', 'PARANAPUA', 35),
(3672, '3536000', 'PARAPUA', 35),
(3673, '3536109', 'PARDINHO', 35),
(3674, '3536208', 'PARIQUERA-ACU', 35),
(3675, '3536257', 'PARISI', 35),
(3676, '3536307', 'PATROCINIO PAULISTA', 35),
(3677, '3536406', 'PAULICEIA', 35),
(3678, '3536505', 'PAULINIA', 35),
(3679, '3536570', 'PAULISTANIA', 35),
(3680, '3536604', 'PAULO DE FARIA', 35),
(3681, '3536703', 'PEDERNEIRAS', 35),
(3682, '3536802', 'PEDRA BELA', 35),
(3683, '3536901', 'PEDRANOPOLIS', 35),
(3684, '3537008', 'PEDREGULHO', 35),
(3685, '3537107', 'PEDREIRA', 35),
(3686, '3537156', 'PEDRINHAS PAULISTA', 35),
(3687, '3537206', 'PEDRO DE TOLEDO', 35),
(3688, '3537305', 'PENAPOLIS', 35),
(3689, '3537404', 'PEREIRA BARRETO', 35),
(3690, '3537503', 'PEREIRAS', 35),
(3691, '3537602', 'PERUIBE', 35),
(3692, '3537701', 'PIACATU', 35),
(3693, '3537800', 'PIEDADE', 35),
(3694, '3537909', 'PILAR DO SUL', 35),
(3695, '3538006', 'PINDAMONHANGABA', 35),
(3696, '3538105', 'PINDORAMA', 35),
(3697, '3538204', 'PINHALZINHO', 35),
(3698, '3538303', 'PIQUEROBI', 35),
(3699, '3538501', 'PIQUETE', 35),
(3700, '3538600', 'PIRACAIA', 35),
(3701, '3538709', 'PIRACICABA', 35),
(3702, '3538808', 'PIRAJU', 35),
(3703, '3538907', 'PIRAJUI', 35),
(3704, '3539004', 'PIRANGI', 35),
(3705, '3539103', 'PIRAPORA DO BOM JESUS', 35),
(3706, '3539202', 'PIRAPOZINHO', 35),
(3707, '3539301', 'PIRASSUNUNGA', 35),
(3708, '3539400', 'PIRATININGA', 35),
(3709, '3539509', 'PITANGUEIRAS', 35),
(3710, '3539608', 'PLANALTO', 35),
(3711, '3539707', 'PLATINA', 35),
(3712, '3539806', 'POA', 35),
(3713, '3539905', 'POLONI', 35),
(3714, '3540002', 'POMPEIA', 35),
(3715, '3540101', 'PONGAI', 35),
(3716, '3540200', 'PONTAL', 35),
(3717, '3540259', 'PONTALINDA', 35),
(3718, '3540309', 'PONTES GESTAL', 35),
(3719, '3540408', 'POPULINA', 35),
(3720, '3540507', 'PORANGABA', 35),
(3721, '3540606', 'PORTO FELIZ', 35),
(3722, '3540705', 'PORTO FERREIRA', 35),
(3723, '3540754', 'POTIM', 35),
(3724, '3540804', 'POTIRENDABA', 35),
(3725, '3540853', 'PRACINHA', 35),
(3726, '3540903', 'PRADOPOLIS', 35),
(3727, '3541000', 'PRAIA GRANDE', 35),
(3728, '3541059', 'PRATANIA', 35),
(3729, '3541109', 'PRESIDENTE ALVES', 35),
(3730, '3541208', 'PRESIDENTE BERNARDES', 35),
(3731, '3541307', 'PRESIDENTE EPITACIO', 35),
(3732, '3541406', 'PRESIDENTE PRUDENTE', 35),
(3733, '3541505', 'PRESIDENTE VENCESLAU', 35),
(3734, '3541604', 'PROMISSAO', 35),
(3735, '3541653', 'QUADRA', 35),
(3736, '3541703', 'QUATA', 35),
(3737, '3541802', 'QUEIROZ', 35),
(3738, '3541901', 'QUELUZ', 35),
(3739, '3542008', 'QUINTANA', 35),
(3740, '3542107', 'RAFARD', 35),
(3741, '3542206', 'RANCHARIA', 35),
(3742, '3542305', 'REDENCAO DA SERRA', 35),
(3743, '3542404', 'REGENTE FEIJO', 35),
(3744, '3542503', 'REGINOPOLIS', 35),
(3745, '3542602', 'REGISTRO', 35),
(3746, '3542701', 'RESTINGA', 35),
(3747, '3542800', 'RIBEIRA', 35),
(3748, '3542909', 'RIBEIRAO BONITO', 35),
(3749, '3543006', 'RIBEIRAO BRANCO', 35),
(3750, '3543105', 'RIBEIRAO CORRENTE', 35),
(3751, '3543204', 'RIBEIRAO DO SUL', 35),
(3752, '3543238', 'RIBEIRAO DOS INDIOS', 35),
(3753, '3543253', 'RIBEIRAO GRANDE', 35),
(3754, '3543303', 'RIBEIRAO PIRES', 35),
(3755, '3543402', 'RIBEIRAO PRETO', 35),
(3756, '3543501', 'RIVERSUL', 35),
(3757, '3543600', 'RIFAINA', 35),
(3758, '3543709', 'RINCAO', 35),
(3759, '3543808', 'RINOPOLIS', 35),
(3760, '3543907', 'RIO CLARO', 35),
(3761, '3544004', 'RIO DAS PEDRAS', 35),
(3762, '3544103', 'RIO GRANDE DA SERRA', 35),
(3763, '3544202', 'RIOLANDIA', 35),
(3764, '3544251', 'ROSANA', 35),
(3765, '3544301', 'ROSEIRA', 35),
(3766, '3544400', 'RUBIACEA', 35),
(3767, '3544509', 'RUBINEIA', 35),
(3768, '3544608', 'SABINO', 35),
(3769, '3544707', 'SAGRES', 35),
(3770, '3544806', 'SALES', 35),
(3771, '3544905', 'SALES OLIVEIRA', 35),
(3772, '3545001', 'SALESOPOLIS', 35),
(3773, '3545100', 'SALMOURAO', 35),
(3774, '3545159', 'SALTINHO', 35),
(3775, '3545209', 'SALTO', 35),
(3776, '3545308', 'SALTO DE PIRAPORA', 35),
(3777, '3545407', 'SALTO GRANDE', 35),
(3778, '3545506', 'SANDOVALINA', 35),
(3779, '3545605', 'SANTA ADELIA', 35),
(3780, '3545704', 'SANTA ALBERTINA', 35),
(3781, '3545803', 'SANTA BARBARA D\'OESTE', 35),
(3782, '3546009', 'SANTA BRANCA', 35),
(3783, '3546108', 'SANTA CLARA D\'OESTE', 35),
(3784, '3546207', 'SANTA CRUZ DA CONCEICAO', 35),
(3785, '3546256', 'SANTA CRUZ DA ESPERANCA', 35),
(3786, '3546306', 'SANTA CRUZ DAS PALMEIRAS', 35),
(3787, '3546405', 'SANTA CRUZ DO RIO PARDO', 35),
(3788, '3546504', 'SANTA ERNESTINA', 35),
(3789, '3546603', 'SANTA FE DO SUL', 35),
(3790, '3546702', 'SANTA GERTRUDES', 35),
(3791, '3546801', 'SANTA ISABEL', 35),
(3792, '3546900', 'SANTA LUCIA', 35),
(3793, '3547007', 'SANTA MARIA DA SERRA', 35),
(3794, '3547106', 'SANTA MERCEDES', 35),
(3795, '3547205', 'SANTANA DA PONTE PENSA', 35),
(3796, '3547304', 'SANTANA DE PARNAIBA', 35),
(3797, '3547403', 'SANTA RITA D\'OESTE', 35),
(3798, '3547502', 'SANTA RITA DO PASSA QUATRO', 35),
(3799, '3547601', 'SANTA ROSA DE VITERBO', 35),
(3800, '3547650', 'SANTA SALETE', 35),
(3801, '3547700', 'SANTO ANASTACIO', 35),
(3802, '3547809', 'SANTO ANDRE', 35),
(3803, '3547908', 'SANTO ANTONIO DA ALEGRIA', 35),
(3804, '3548005', 'SANTO ANTONIO DE POSSE', 35),
(3805, '3548054', 'SANTO ANTONIO DO ARACANGUA', 35),
(3806, '3548104', 'SANTO ANTONIO DO JARDIM', 35),
(3807, '3548203', 'SANTO ANTONIO DO PINHAL', 35),
(3808, '3548302', 'SANTO EXPEDITO', 35),
(3809, '3548401', 'SANTOPOLIS DO AGUAPEI', 35),
(3810, '3548500', 'SANTOS', 35),
(3811, '3548609', 'SAO BENTO DO SAPUCAI', 35),
(3812, '3548708', 'SAO BERNARDO DO CAMPO', 35),
(3813, '3548807', 'SAO CAETANO DO SUL', 35),
(3814, '3548906', 'SAO CARLOS', 35),
(3815, '3549003', 'SAO FRANCISCO', 35),
(3816, '3549102', 'SAO JOAO DA BOA VISTA', 35),
(3817, '3549201', 'SAO JOAO DAS DUAS PONTES', 35),
(3818, '3549250', 'SAO JOAO DE IRACEMA', 35),
(3819, '3549300', 'SAO JOAO DO PAU D\'ALHO', 35),
(3820, '3549409', 'SAO JOAQUIM DA BARRA', 35),
(3821, '3549508', 'SAO JOSE DA BELA VISTA', 35),
(3822, '3549607', 'SAO JOSE DO BARREIRO', 35),
(3823, '3549706', 'SAO JOSE DO RIO PARDO', 35),
(3824, '3549805', 'SAO JOSE DO RIO PRETO', 35),
(3825, '3549904', 'SAO JOSE DOS CAMPOS', 35),
(3826, '3549953', 'SAO LOURENCO DA SERRA', 35),
(3827, '3550001', 'SAO LUIZ DO PARAITINGA', 35),
(3828, '3550100', 'SAO MANUEL', 35),
(3829, '3550209', 'SAO MIGUEL ARCANJO', 35),
(3830, '3550308', 'SAO PAULO', 35),
(3831, '3550407', 'SAO PEDRO', 35),
(3832, '3550506', 'SAO PEDRO DO TURVO', 35),
(3833, '3550605', 'SAO ROQUE', 35),
(3834, '3550704', 'SAO SEBASTIAO', 35),
(3835, '3550803', 'SAO SEBASTIAO DA GRAMA', 35),
(3836, '3550902', 'SAO SIMAO', 35),
(3837, '3551009', 'SAO VICENTE', 35),
(3838, '3551108', 'SARAPUI', 35),
(3839, '3551207', 'SARUTAIA', 35),
(3840, '3551306', 'SEBASTIANOPOLIS DO SUL', 35),
(3841, '3551405', 'SERRA AZUL', 35),
(3842, '3551504', 'SERRANA', 35),
(3843, '3551603', 'SERRA NEGRA', 35),
(3844, '3551702', 'SERTAOZINHO', 35),
(3845, '3551801', 'SETE BARRAS', 35),
(3846, '3551900', 'SEVERINIA', 35),
(3847, '3552007', 'SILVEIRAS', 35),
(3848, '3552106', 'SOCORRO', 35),
(3849, '3552205', 'SOROCABA', 35),
(3850, '3552304', 'SUD MENNUCCI', 35),
(3851, '3552403', 'SUMARE', 35),
(3852, '3552502', 'SUZANO', 35),
(3853, '3552551', 'SUZANAPOLIS', 35),
(3854, '3552601', 'TABAPUA', 35),
(3855, '3552700', 'TABATINGA', 35),
(3856, '3552809', 'TABOAO DA SERRA', 35),
(3857, '3552908', 'TACIBA', 35),
(3858, '3553005', 'TAGUAI', 35),
(3859, '3553104', 'TAIACU', 35),
(3860, '3553203', 'TAIUVA', 35),
(3861, '3553302', 'TAMBAU', 35),
(3862, '3553401', 'TANABI', 35),
(3863, '3553500', 'TAPIRAI', 35),
(3864, '3553609', 'TAPIRATIBA', 35),
(3865, '3553658', 'TAQUARAL', 35),
(3866, '3553708', 'TAQUARITINGA', 35),
(3867, '3553807', 'TAQUARITUBA', 35),
(3868, '3553856', 'TAQUARIVAI', 35),
(3869, '3553906', 'TARABAI', 35),
(3870, '3553955', 'TARUMA', 35),
(3871, '3554003', 'TATUI', 35),
(3872, '3554102', 'TAUBATE', 35),
(3873, '3554201', 'TEJUPA', 35),
(3874, '3554300', 'TEODORO SAMPAIO', 35),
(3875, '3554409', 'TERRA ROXA', 35),
(3876, '3554508', 'TIETE', 35),
(3877, '3554607', 'TIMBURI', 35),
(3878, '3554656', 'TORRE DE PEDRA', 35),
(3879, '3554706', 'TORRINHA', 35),
(3880, '3554755', 'TRABIJU', 35),
(3881, '3554805', 'TREMEMBE', 35),
(3882, '3554904', 'TRES FRONTEIRAS', 35),
(3883, '3554953', 'TUIUTI', 35),
(3884, '3555000', 'TUPA', 35),
(3885, '3555109', 'TUPI PAULISTA', 35),
(3886, '3555208', 'TURIUBA', 35),
(3887, '3555307', 'TURMALINA', 35),
(3888, '3555356', 'UBARANA', 35),
(3889, '3555406', 'UBATUBA', 35),
(3890, '3555505', 'UBIRAJARA', 35),
(3891, '3555604', 'UCHOA', 35),
(3892, '3555703', 'UNIAO PAULISTA', 35),
(3893, '3555802', 'URANIA', 35),
(3894, '3555901', 'URU', 35),
(3895, '3556008', 'URUPES', 35),
(3896, '3556107', 'VALENTIM GENTIL', 35),
(3897, '3556206', 'VALINHOS', 35),
(3898, '3556305', 'VALPARAISO', 35),
(3899, '3556354', 'VARGEM', 35),
(3900, '3556404', 'VARGEM GRANDE DO SUL', 35),
(3901, '3556453', 'VARGEM GRANDE PAULISTA', 35),
(3902, '3556503', 'VARZEA PAULISTA', 35),
(3903, '3556602', 'VERA CRUZ', 35),
(3904, '3556701', 'VINHEDO', 35),
(3905, '3556800', 'VIRADOURO', 35),
(3906, '3556909', 'VISTA ALEGRE DO ALTO', 35),
(3907, '3556958', 'VITORIA BRASIL', 35),
(3908, '3557006', 'VOTORANTIM', 35),
(3909, '3557105', 'VOTUPORANGA', 35),
(3910, '3557154', 'ZACARIAS', 35),
(3911, '3557204', 'CHAVANTES', 35),
(3912, '3557303', 'ESTIVA GERBI', 35),
(3913, '4100103', 'ABATIA', 41),
(3914, '4100202', 'ADRIANOPOLIS', 41),
(3915, '4100301', 'AGUDOS DO SUL', 41),
(3916, '4100400', 'ALMIRANTE TAMANDARE', 41),
(3917, '4100459', 'ALTAMIRA DO PARANA', 41),
(3918, '4100509', 'ALTONIA', 41),
(3919, '4100608', 'ALTO PARANA', 41),
(3920, '4100707', 'ALTO PIQUIRI', 41),
(3921, '4100806', 'ALVORADA DO SUL', 41),
(3922, '4100905', 'AMAPORA', 41),
(3923, '4101002', 'AMPERE', 41),
(3924, '4101051', 'ANAHY', 41),
(3925, '4101101', 'ANDIRA', 41),
(3926, '4101150', 'ANGULO', 41),
(3927, '4101200', 'ANTONINA', 41),
(3928, '4101309', 'ANTONIO OLINTO', 41),
(3929, '4101408', 'APUCARANA', 41),
(3930, '4101507', 'ARAPONGAS', 41),
(3931, '4101606', 'ARAPOTI', 41),
(3932, '4101655', 'ARAPUA', 41),
(3933, '4101705', 'ARARUNA', 41),
(3934, '4101804', 'ARAUCARIA', 41),
(3935, '4101853', 'ARIRANHA DO IVAI', 41),
(3936, '4101903', 'ASSAI', 41),
(3937, '4102000', 'ASSIS CHATEAUBRIAND', 41),
(3938, '4102109', 'ASTORGA', 41),
(3939, '4102208', 'ATALAIA', 41),
(3940, '4102307', 'BALSA NOVA', 41),
(3941, '4102406', 'BANDEIRANTES', 41),
(3942, '4102505', 'BARBOSA FERRAZ', 41),
(3943, '4102604', 'BARRACAO', 41),
(3944, '4102703', 'BARRA DO JACARE', 41),
(3945, '4102752', 'BELA VISTA DA CAROBA', 41),
(3946, '4102802', 'BELA VISTA DO PARAISO', 41),
(3947, '4102901', 'BITURUNA', 41),
(3948, '4103008', 'BOA ESPERANCA', 41),
(3949, '4103024', 'BOA ESPERANCA DO IGUACU', 41),
(3950, '4103040', 'BOA VENTURA DE SAO ROQUE', 41),
(3951, '4103057', 'BOA VISTA DA APARECIDA', 41),
(3952, '4103107', 'BOCAIUVA DO SUL', 41),
(3953, '4103156', 'BOM JESUS DO SUL', 41),
(3954, '4103206', 'BOM SUCESSO', 41),
(3955, '4103222', 'BOM SUCESSO DO SUL', 41),
(3956, '4103305', 'BORRAZOPOLIS', 41),
(3957, '4103354', 'BRAGANEY', 41),
(3958, '4103370', 'BRASILANDIA DO SUL', 41),
(3959, '4103404', 'CAFEARA', 41),
(3960, '4103453', 'CAFELANDIA', 41),
(3961, '4103479', 'CAFEZAL DO SUL', 41),
(3962, '4103503', 'CALIFORNIA', 41),
(3963, '4103602', 'CAMBARA', 41),
(3964, '4103701', 'CAMBE', 41),
(3965, '4103800', 'CAMBIRA', 41),
(3966, '4103909', 'CAMPINA DA LAGOA', 41),
(3967, '4103958', 'CAMPINA DO SIMAO', 41),
(3968, '4104006', 'CAMPINA GRANDE DO SUL', 41),
(3969, '4104055', 'CAMPO BONITO', 41),
(3970, '4104105', 'CAMPO DO TENENTE', 41),
(3971, '4104204', 'CAMPO LARGO', 41),
(3972, '4104253', 'CAMPO MAGRO', 41),
(3973, '4104303', 'CAMPO MOURAO', 41),
(3974, '4104402', 'CANDIDO DE ABREU', 41),
(3975, '4104428', 'CANDOI', 41),
(3976, '4104451', 'CANTAGALO', 41),
(3977, '4104501', 'CAPANEMA', 41),
(3978, '4104600', 'CAPITAO LEONIDAS MARQUES', 41),
(3979, '4104659', 'CARAMBEI', 41),
(3980, '4104709', 'CARLOPOLIS', 41),
(3981, '4104808', 'CASCAVEL', 41),
(3982, '4104907', 'CASTRO', 41),
(3983, '4105003', 'CATANDUVAS', 41),
(3984, '4105102', 'CENTENARIO DO SUL', 41),
(3985, '4105201', 'CERRO AZUL', 41),
(3986, '4105300', 'CEU AZUL', 41),
(3987, '4105409', 'CHOPINZINHO', 41),
(3988, '4105508', 'CIANORTE', 41),
(3989, '4105607', 'CIDADE GAUCHA', 41),
(3990, '4105706', 'CLEVELANDIA', 41),
(3991, '4105805', 'COLOMBO', 41),
(3992, '4105904', 'COLORADO', 41),
(3993, '4106001', 'CONGONHINHAS', 41),
(3994, '4106100', 'CONSELHEIRO MAIRINCK', 41),
(3995, '4106209', 'CONTENDA', 41),
(3996, '4106308', 'CORBELIA', 41),
(3997, '4106407', 'CORNELIO PROCOPIO', 41),
(3998, '4106456', 'CORONEL DOMINGOS SOARES', 41),
(3999, '4106506', 'CORONEL VIVIDA', 41),
(4000, '4106555', 'CORUMBATAI DO SUL', 41),
(4001, '4106571', 'CRUZEIRO DO IGUACU', 41),
(4002, '4106605', 'CRUZEIRO DO OESTE', 41),
(4003, '4106704', 'CRUZEIRO DO SUL', 41),
(4004, '4106803', 'CRUZ MACHADO', 41),
(4005, '4106852', 'CRUZMALTINA', 41),
(4006, '4106902', 'CURITIBA', 41),
(4007, '4107009', 'CURIUVA', 41),
(4008, '4107108', 'DIAMANTE DO NORTE', 41),
(4009, '4107124', 'DIAMANTE DO SUL', 41),
(4010, '4107157', 'DIAMANTE D\'OESTE', 41),
(4011, '4107207', 'DOIS VIZINHOS', 41),
(4012, '4107256', 'DOURADINA', 41),
(4013, '4107306', 'DOUTOR CAMARGO', 41),
(4014, '4107405', 'ENEAS MARQUES', 41),
(4015, '4107504', 'ENGENHEIRO BELTRAO', 41),
(4016, '4107520', 'ESPERANCA NOVA', 41),
(4017, '4107538', 'ENTRE RIOS DO OESTE', 41),
(4018, '4107546', 'ESPIGAO ALTO DO IGUACU', 41),
(4019, '4107553', 'FAROL', 41),
(4020, '4107603', 'FAXINAL', 41),
(4021, '4107652', 'FAZENDA RIO GRANDE', 41),
(4022, '4107702', 'FENIX', 41),
(4023, '4107736', 'FERNANDES PINHEIRO', 41),
(4024, '4107751', 'FIGUEIRA', 41),
(4025, '4107801', 'FLORAI', 41),
(4026, '4107850', 'FLOR DA SERRA DO SUL', 41),
(4027, '4107900', 'FLORESTA', 41),
(4028, '4108007', 'FLORESTOPOLIS', 41),
(4029, '4108106', 'FLORIDA', 41),
(4030, '4108205', 'FORMOSA DO OESTE', 41),
(4031, '4108304', 'FOZ DO IGUACU', 41),
(4032, '4108320', 'FRANCISCO ALVES', 41),
(4033, '4108403', 'FRANCISCO BELTRAO', 41),
(4034, '4108452', 'FOZ DO JORDAO', 41),
(4035, '4108502', 'GENERAL CARNEIRO', 41),
(4036, '4108551', 'GODOY MOREIRA', 41),
(4037, '4108601', 'GOIOERE', 41),
(4038, '4108650', 'GOIOXIM', 41),
(4039, '4108700', 'GRANDES RIOS', 41),
(4040, '4108809', 'GUAIRA', 41),
(4041, '4108908', 'GUAIRACA', 41),
(4042, '4108957', 'GUAMIRANGA', 41),
(4043, '4109005', 'GUAPIRAMA', 41),
(4044, '4109104', 'GUAPOREMA', 41),
(4045, '4109203', 'GUARACI', 41),
(4046, '4109302', 'GUARANIACU', 41),
(4047, '4109401', 'GUARAPUAVA', 41),
(4048, '4109500', 'GUARAQUECABA', 41),
(4049, '4109609', 'GUARATUBA', 41),
(4050, '4109658', 'HONORIO SERPA', 41),
(4051, '4109708', 'IBAITI', 41),
(4052, '4109757', 'IBEMA', 41),
(4053, '4109807', 'IBIPORA', 41),
(4054, '4109906', 'ICARAIMA', 41),
(4055, '4110003', 'IGUARACU', 41),
(4056, '4110052', 'IGUATU', 41),
(4057, '4110078', 'IMBAU', 41),
(4058, '4110102', 'IMBITUVA', 41),
(4059, '4110201', 'INACIO MARTINS', 41),
(4060, '4110300', 'INAJA', 41),
(4061, '4110409', 'INDIANOPOLIS', 41),
(4062, '4110508', 'IPIRANGA', 41),
(4063, '4110607', 'IPORA', 41),
(4064, '4110656', 'IRACEMA DO OESTE', 41),
(4065, '4110706', 'IRATI', 41),
(4066, '4110805', 'IRETAMA', 41),
(4067, '4110904', 'ITAGUAJE', 41),
(4068, '4110953', 'ITAIPULANDIA', 41),
(4069, '4111001', 'ITAMBARACA', 41),
(4070, '4111100', 'ITAMBE', 41),
(4071, '4111209', 'ITAPEJARA D\'OESTE', 41),
(4072, '4111258', 'ITAPERUCU', 41),
(4073, '4111308', 'ITAUNA DO SUL', 41),
(4074, '4111407', 'IVAI', 41),
(4075, '4111506', 'IVAIPORA', 41),
(4076, '4111555', 'IVATE', 41),
(4077, '4111605', 'IVATUBA', 41),
(4078, '4111704', 'JABOTI', 41),
(4079, '4111803', 'JACAREZINHO', 41),
(4080, '4111902', 'JAGUAPITA', 41),
(4081, '4112009', 'JAGUARIAIVA', 41),
(4082, '4112108', 'JANDAIA DO SUL', 41),
(4083, '4112207', 'JANIOPOLIS', 41),
(4084, '4112306', 'JAPIRA', 41),
(4085, '4112405', 'JAPURA', 41),
(4086, '4112504', 'JARDIM ALEGRE', 41),
(4087, '4112603', 'JARDIM OLINDA', 41),
(4088, '4112702', 'JATAIZINHO', 41),
(4089, '4112751', 'JESUITAS', 41),
(4090, '4112801', 'JOAQUIM TAVORA', 41),
(4091, '4112900', 'JUNDIAI DO SUL', 41),
(4092, '4112959', 'JURANDA', 41),
(4093, '4113007', 'JUSSARA', 41),
(4094, '4113106', 'KALORE', 41),
(4095, '4113205', 'LAPA', 41),
(4096, '4113254', 'LARANJAL', 41),
(4097, '4113304', 'LARANJEIRAS DO SUL', 41),
(4098, '4113403', 'LEOPOLIS', 41),
(4099, '4113429', 'LIDIANOPOLIS', 41),
(4100, '4113452', 'LINDOESTE', 41),
(4101, '4113502', 'LOANDA', 41),
(4102, '4113601', 'LOBATO', 41),
(4103, '4113700', 'LONDRINA', 41),
(4104, '4113734', 'LUIZIANA', 41),
(4105, '4113759', 'LUNARDELLI', 41),
(4106, '4113809', 'LUPIONOPOLIS', 41),
(4107, '4113908', 'MALLET', 41),
(4108, '4114005', 'MAMBORE', 41),
(4109, '4114104', 'MANDAGUACU', 41),
(4110, '4114203', 'MANDAGUARI', 41),
(4111, '4114302', 'MANDIRITUBA', 41),
(4112, '4114351', 'MANFRINOPOLIS', 41),
(4113, '4114401', 'MANGUEIRINHA', 41),
(4114, '4114500', 'MANOEL RIBAS', 41),
(4115, '4114609', 'MARECHAL CANDIDO RONDON', 41),
(4116, '4114708', 'MARIA HELENA', 41),
(4117, '4114807', 'MARIALVA', 41),
(4118, '4114906', 'MARILANDIA DO SUL', 41),
(4119, '4115002', 'MARILENA', 41),
(4120, '4115101', 'MARILUZ', 41),
(4121, '4115200', 'MARINGA', 41),
(4122, '4115309', 'MARIOPOLIS', 41),
(4123, '4115358', 'MARIPA', 41),
(4124, '4115408', 'MARMELEIRO', 41),
(4125, '4115457', 'MARQUINHO', 41),
(4126, '4115507', 'MARUMBI', 41),
(4127, '4115606', 'MATELANDIA', 41),
(4128, '4115705', 'MATINHOS', 41);
INSERT INTO `territories` (`id`, `code_ibge`, `name`, `uf_id`) VALUES
(4129, '4115739', 'MATO RICO', 41),
(4130, '4115754', 'MAUA DA SERRA', 41),
(4131, '4115804', 'MEDIANEIRA', 41),
(4132, '4115853', 'MERCEDES', 41),
(4133, '4115903', 'MIRADOR', 41),
(4134, '4116000', 'MIRASELVA', 41),
(4135, '4116059', 'MISSAL', 41),
(4136, '4116109', 'MOREIRA SALES', 41),
(4137, '4116208', 'MORRETES', 41),
(4138, '4116307', 'MUNHOZ DE MELO', 41),
(4139, '4116406', 'NOSSA SENHORA DAS GRACAS', 41),
(4140, '4116505', 'NOVA ALIANCA DO IVAI', 41),
(4141, '4116604', 'NOVA AMERICA DA COLINA', 41),
(4142, '4116703', 'NOVA AURORA', 41),
(4143, '4116802', 'NOVA CANTU', 41),
(4144, '4116901', 'NOVA ESPERANCA', 41),
(4145, '4116950', 'NOVA ESPERANCA DO SUDOESTE', 41),
(4146, '4117008', 'NOVA FATIMA', 41),
(4147, '4117057', 'NOVA LARANJEIRAS', 41),
(4148, '4117107', 'NOVA LONDRINA', 41),
(4149, '4117206', 'NOVA OLIMPIA', 41),
(4150, '4117214', 'NOVA SANTA BARBARA', 41),
(4151, '4117222', 'NOVA SANTA ROSA', 41),
(4152, '4117255', 'NOVA PRATA DO IGUACU', 41),
(4153, '4117271', 'NOVA TEBAS', 41),
(4154, '4117297', 'NOVO ITACOLOMI', 41),
(4155, '4117305', 'ORTIGUEIRA', 41),
(4156, '4117404', 'OURIZONA', 41),
(4157, '4117453', 'OURO VERDE DO OESTE', 41),
(4158, '4117503', 'PAICANDU', 41),
(4159, '4117602', 'PALMAS', 41),
(4160, '4117701', 'PALMEIRA', 41),
(4161, '4117800', 'PALMITAL', 41),
(4162, '4117909', 'PALOTINA', 41),
(4163, '4118006', 'PARAISO DO NORTE', 41),
(4164, '4118105', 'PARANACITY', 41),
(4165, '4118204', 'PARANAGUA', 41),
(4166, '4118303', 'PARANAPOEMA', 41),
(4167, '4118402', 'PARANAVAI', 41),
(4168, '4118451', 'PATO BRAGADO', 41),
(4169, '4118501', 'PATO BRANCO', 41),
(4170, '4118600', 'PAULA FREITAS', 41),
(4171, '4118709', 'PAULO FRONTIN', 41),
(4172, '4118808', 'PEABIRU', 41),
(4173, '4118857', 'PEROBAL', 41),
(4174, '4118907', 'PEROLA', 41),
(4175, '4119004', 'PEROLA D\'OESTE', 41),
(4176, '4119103', 'PIEN', 41),
(4177, '4119152', 'PINHAIS', 41),
(4178, '4119202', 'PINHALAO', 41),
(4179, '4119251', 'PINHAL DE SAO BENTO', 41),
(4180, '4119301', 'PINHAO', 41),
(4181, '4119400', 'PIRAI DO SUL', 41),
(4182, '4119509', 'PIRAQUARA', 41),
(4183, '4119608', 'PITANGA', 41),
(4184, '4119657', 'PITANGUEIRAS', 41),
(4185, '4119707', 'PLANALTINA DO PARANA', 41),
(4186, '4119806', 'PLANALTO', 41),
(4187, '4119905', 'PONTA GROSSA', 41),
(4188, '4119954', 'PONTAL DO PARANA', 41),
(4189, '4120002', 'PORECATU', 41),
(4190, '4120101', 'PORTO AMAZONAS', 41),
(4191, '4120150', 'PORTO BARREIRO', 41),
(4192, '4120200', 'PORTO RICO', 41),
(4193, '4120309', 'PORTO VITORIA', 41),
(4194, '4120333', 'PRADO FERREIRA', 41),
(4195, '4120358', 'PRANCHITA', 41),
(4196, '4120408', 'PRESIDENTE CASTELO BRANCO', 41),
(4197, '4120507', 'PRIMEIRO DE MAIO', 41),
(4198, '4120606', 'PRUDENTOPOLIS', 41),
(4199, '4120655', 'QUARTO CENTENARIO', 41),
(4200, '4120705', 'QUATIGUA', 41),
(4201, '4120804', 'QUATRO BARRAS', 41),
(4202, '4120853', 'QUATRO PONTES', 41),
(4203, '4120903', 'QUEDAS DO IGUACU', 41),
(4204, '4121000', 'QUERENCIA DO NORTE', 41),
(4205, '4121109', 'QUINTA DO SOL', 41),
(4206, '4121208', 'QUITANDINHA', 41),
(4207, '4121257', 'RAMILANDIA', 41),
(4208, '4121307', 'RANCHO ALEGRE', 41),
(4209, '4121356', 'RANCHO ALEGRE D\'OESTE', 41),
(4210, '4121406', 'REALEZA', 41),
(4211, '4121505', 'REBOUCAS', 41),
(4212, '4121604', 'RENASCENCA', 41),
(4213, '4121703', 'RESERVA', 41),
(4214, '4121752', 'RESERVA DO IGUACU', 41),
(4215, '4121802', 'RIBEIRAO CLARO', 41),
(4216, '4121901', 'RIBEIRAO DO PINHAL', 41),
(4217, '4122008', 'RIO AZUL', 41),
(4218, '4122107', 'RIO BOM', 41),
(4219, '4122156', 'RIO BONITO DO IGUACU', 41),
(4220, '4122172', 'RIO BRANCO DO IVAI', 41),
(4221, '4122206', 'RIO BRANCO DO SUL', 41),
(4222, '4122305', 'RIO NEGRO', 41),
(4223, '4122404', 'ROLANDIA', 41),
(4224, '4122503', 'RONCADOR', 41),
(4225, '4122602', 'RONDON', 41),
(4226, '4122651', 'ROSARIO DO IVAI', 41),
(4227, '4122701', 'SABAUDIA', 41),
(4228, '4122800', 'SALGADO FILHO', 41),
(4229, '4122909', 'SALTO DO ITARARE', 41),
(4230, '4123006', 'SALTO DO LONTRA', 41),
(4231, '4123105', 'SANTA AMELIA', 41),
(4232, '4123204', 'SANTA CECILIA DO PAVAO', 41),
(4233, '4123303', 'SANTA CRUZ DE MONTE CASTELO', 41),
(4234, '4123402', 'SANTA FE', 41),
(4235, '4123501', 'SANTA HELENA', 41),
(4236, '4123600', 'SANTA INES', 41),
(4237, '4123709', 'SANTA ISABEL DO IVAI', 41),
(4238, '4123808', 'SANTA IZABEL DO OESTE', 41),
(4239, '4123824', 'SANTA LUCIA', 41),
(4240, '4123857', 'SANTA MARIA DO OESTE', 41),
(4241, '4123907', 'SANTA MARIANA', 41),
(4242, '4123956', 'SANTA MONICA', 41),
(4243, '4124004', 'SANTANA DO ITARARE', 41),
(4244, '4124020', 'SANTA TEREZA DO OESTE', 41),
(4245, '4124053', 'SANTA TEREZINHA DE ITAIPU', 41),
(4246, '4124103', 'SANTO ANTONIO DA PLATINA', 41),
(4247, '4124202', 'SANTO ANTONIO DO CAIUA', 41),
(4248, '4124301', 'SANTO ANTONIO DO PARAISO', 41),
(4249, '4124400', 'SANTO ANTONIO DO SUDOESTE', 41),
(4250, '4124509', 'SANTO INACIO', 41),
(4251, '4124608', 'SAO CARLOS DO IVAI', 41),
(4252, '4124707', 'SAO JERONIMO DA SERRA', 41),
(4253, '4124806', 'SAO JOAO', 41),
(4254, '4124905', 'SAO JOAO DO CAIUA', 41),
(4255, '4125001', 'SAO JOAO DO IVAI', 41),
(4256, '4125100', 'SAO JOAO DO TRIUNFO', 41),
(4257, '4125209', 'SAO JORGE D\'OESTE', 41),
(4258, '4125308', 'SAO JORGE DO IVAI', 41),
(4259, '4125357', 'SAO JORGE DO PATROCINIO', 41),
(4260, '4125407', 'SAO JOSE DA BOA VISTA', 41),
(4261, '4125456', 'SAO JOSE DAS PALMEIRAS', 41),
(4262, '4125506', 'SAO JOSE DOS PINHAIS', 41),
(4263, '4125555', 'SAO MANOEL DO PARANA', 41),
(4264, '4125605', 'SAO MATEUS DO SUL', 41),
(4265, '4125704', 'SAO MIGUEL DO IGUACU', 41),
(4266, '4125753', 'SAO PEDRO DO IGUACU', 41),
(4267, '4125803', 'SAO PEDRO DO IVAI', 41),
(4268, '4125902', 'SAO PEDRO DO PARANA', 41),
(4269, '4126009', 'SAO SEBASTIAO DA AMOREIRA', 41),
(4270, '4126108', 'SAO TOME', 41),
(4271, '4126207', 'SAPOPEMA', 41),
(4272, '4126256', 'SARANDI', 41),
(4273, '4126272', 'SAUDADE DO IGUACU', 41),
(4274, '4126306', 'SENGES', 41),
(4275, '4126355', 'SERRANOPOLIS DO IGUACU', 41),
(4276, '4126405', 'SERTANEJA', 41),
(4277, '4126504', 'SERTANOPOLIS', 41),
(4278, '4126603', 'SIQUEIRA CAMPOS', 41),
(4279, '4126652', 'SULINA', 41),
(4280, '4126678', 'TAMARANA', 41),
(4281, '4126702', 'TAMBOARA', 41),
(4282, '4126801', 'TAPEJARA', 41),
(4283, '4126900', 'TAPIRA', 41),
(4284, '4127007', 'TEIXEIRA SOARES', 41),
(4285, '4127106', 'TELEMACO BORBA', 41),
(4286, '4127205', 'TERRA BOA', 41),
(4287, '4127304', 'TERRA RICA', 41),
(4288, '4127403', 'TERRA ROXA', 41),
(4289, '4127502', 'TIBAGI', 41),
(4290, '4127601', 'TIJUCAS DO SUL', 41),
(4291, '4127700', 'TOLEDO', 41),
(4292, '4127809', 'TOMAZINA', 41),
(4293, '4127858', 'TRES BARRAS DO PARANA', 41),
(4294, '4127882', 'TUNAS DO PARANA', 41),
(4295, '4127908', 'TUNEIRAS DO OESTE', 41),
(4296, '4127957', 'TUPASSI', 41),
(4297, '4127965', 'TURVO', 41),
(4298, '4128005', 'UBIRATA', 41),
(4299, '4128104', 'UMUARAMA', 41),
(4300, '4128203', 'UNIAO DA VITORIA', 41),
(4301, '4128302', 'UNIFLOR', 41),
(4302, '4128401', 'URAI', 41),
(4303, '4128500', 'WENCESLAU BRAZ', 41),
(4304, '4128534', 'VENTANIA', 41),
(4305, '4128559', 'VERA CRUZ DO OESTE', 41),
(4306, '4128609', 'VERE', 41),
(4307, '4128625', 'ALTO PARAISO', 41),
(4308, '4128633', 'DOUTOR ULYSSES', 41),
(4309, '4128658', 'VIRMOND', 41),
(4310, '4128708', 'VITORINO', 41),
(4311, '4128807', 'XAMBRE', 41),
(4312, '4200051', 'ABDON BATISTA', 42),
(4313, '4200101', 'ABELARDO LUZ', 42),
(4314, '4200200', 'AGROLANDIA', 42),
(4315, '4200309', 'AGRONOMICA', 42),
(4316, '4200408', 'AGUA DOCE', 42),
(4317, '4200507', 'AGUAS DE CHAPECO', 42),
(4318, '4200556', 'AGUAS FRIAS', 42),
(4319, '4200606', 'AGUAS MORNAS', 42),
(4320, '4200705', 'ALFREDO WAGNER', 42),
(4321, '4200754', 'ALTO BELA VISTA', 42),
(4322, '4200804', 'ANCHIETA', 42),
(4323, '4200903', 'ANGELINA', 42),
(4324, '4201000', 'ANITA GARIBALDI', 42),
(4325, '4201109', 'ANITAPOLIS', 42),
(4326, '4201208', 'ANTONIO CARLOS', 42),
(4327, '4201257', 'APIUNA', 42),
(4328, '4201273', 'ARABUTA', 42),
(4329, '4201307', 'ARAQUARI', 42),
(4330, '4201406', 'ARARANGUA', 42),
(4331, '4201505', 'ARMAZEM', 42),
(4332, '4201604', 'ARROIO TRINTA', 42),
(4333, '4201653', 'ARVOREDO', 42),
(4334, '4201703', 'ASCURRA', 42),
(4335, '4201802', 'ATALANTA', 42),
(4336, '4201901', 'AURORA', 42),
(4337, '4201950', 'BALNEARIO ARROIO DO SILVA', 42),
(4338, '4202008', 'BALNEARIO CAMBORIU', 42),
(4339, '4202057', 'BALNEARIO BARRA DO SUL', 42),
(4340, '4202073', 'BALNEARIO GAIVOTA', 42),
(4341, '4202081', 'BANDEIRANTE', 42),
(4342, '4202099', 'BARRA BONITA', 42),
(4343, '4202107', 'BARRA VELHA', 42),
(4344, '4202131', 'BELA VISTA DO TOLDO', 42),
(4345, '4202156', 'BELMONTE', 42),
(4346, '4202206', 'BENEDITO NOVO', 42),
(4347, '4202305', 'BIGUACU', 42),
(4348, '4202404', 'BLUMENAU', 42),
(4349, '4202438', 'BOCAINA DO SUL', 42),
(4350, '4202453', 'BOMBINHAS', 42),
(4351, '4202503', 'BOM JARDIM DA SERRA', 42),
(4352, '4202537', 'BOM JESUS', 42),
(4353, '4202578', 'BOM JESUS DO OESTE', 42),
(4354, '4202602', 'BOM RETIRO', 42),
(4355, '4202701', 'BOTUVERA', 42),
(4356, '4202800', 'BRACO DO NORTE', 42),
(4357, '4202859', 'BRACO DO TROMBUDO', 42),
(4358, '4202875', 'BRUNOPOLIS', 42),
(4359, '4202909', 'BRUSQUE', 42),
(4360, '4203006', 'CACADOR', 42),
(4361, '4203105', 'CAIBI', 42),
(4362, '4203154', 'CALMON', 42),
(4363, '4203204', 'CAMBORIU', 42),
(4364, '4203253', 'CAPAO ALTO', 42),
(4365, '4203303', 'CAMPO ALEGRE', 42),
(4366, '4203402', 'CAMPO BELO DO SUL', 42),
(4367, '4203501', 'CAMPO ERE', 42),
(4368, '4203600', 'CAMPOS NOVOS', 42),
(4369, '4203709', 'CANELINHA', 42),
(4370, '4203808', 'CANOINHAS', 42),
(4371, '4203907', 'CAPINZAL', 42),
(4372, '4203956', 'CAPIVARI DE BAIXO', 42),
(4373, '4204004', 'CATANDUVAS', 42),
(4374, '4204103', 'CAXAMBU DO SUL', 42),
(4375, '4204152', 'CELSO RAMOS', 42),
(4376, '4204178', 'CERRO NEGRO', 42),
(4377, '4204194', 'CHAPADAO DO LAGEADO', 42),
(4378, '4204202', 'CHAPECO', 42),
(4379, '4204251', 'COCAL DO SUL', 42),
(4380, '4204301', 'CONCORDIA', 42),
(4381, '4204350', 'CORDILHEIRA ALTA', 42),
(4382, '4204400', 'CORONEL FREITAS', 42),
(4383, '4204459', 'CORONEL MARTINS', 42),
(4384, '4204509', 'CORUPA', 42),
(4385, '4204558', 'CORREIA PINTO', 42),
(4386, '4204608', 'CRICIUMA', 42),
(4387, '4204707', 'CUNHA PORA', 42),
(4388, '4204756', 'CUNHATAI', 42),
(4389, '4204806', 'CURITIBANOS', 42),
(4390, '4204905', 'DESCANSO', 42),
(4391, '4205001', 'DIONISIO CERQUEIRA', 42),
(4392, '4205100', 'DONA EMMA', 42),
(4393, '4205159', 'DOUTOR PEDRINHO', 42),
(4394, '4205175', 'ENTRE RIOS', 42),
(4395, '4205191', 'ERMO', 42),
(4396, '4205209', 'ERVAL VELHO', 42),
(4397, '4205308', 'FAXINAL DOS GUEDES', 42),
(4398, '4205357', 'FLOR DO SERTAO', 42),
(4399, '4205407', 'FLORIANOPOLIS', 42),
(4400, '4205431', 'FORMOSA DO SUL', 42),
(4401, '4205456', 'FORQUILHINHA', 42),
(4402, '4205506', 'FRAIBURGO', 42),
(4403, '4205555', 'FREI ROGERIO', 42),
(4404, '4205605', 'GALVAO', 42),
(4405, '4205704', 'GAROPABA', 42),
(4406, '4205803', 'GARUVA', 42),
(4407, '4205902', 'GASPAR', 42),
(4408, '4206009', 'GOVERNADOR CELSO RAMOS', 42),
(4409, '4206108', 'GRAO PARA', 42),
(4410, '4206207', 'GRAVATAL', 42),
(4411, '4206306', 'GUABIRUBA', 42),
(4412, '4206405', 'GUARACIABA', 42),
(4413, '4206504', 'GUARAMIRIM', 42),
(4414, '4206603', 'GUARUJA DO SUL', 42),
(4415, '4206652', 'GUATAMBU', 42),
(4416, '4206702', 'HERVAL D\'OESTE', 42),
(4417, '4206751', 'IBIAM', 42),
(4418, '4206801', 'IBICARE', 42),
(4419, '4206900', 'IBIRAMA', 42),
(4420, '4207007', 'ICARA', 42),
(4421, '4207106', 'ILHOTA', 42),
(4422, '4207205', 'IMARUI', 42),
(4423, '4207304', 'IMBITUBA', 42),
(4424, '4207403', 'IMBUIA', 42),
(4425, '4207502', 'INDAIAL', 42),
(4426, '4207577', 'IOMERE', 42),
(4427, '4207601', 'IPIRA', 42),
(4428, '4207650', 'IPORA DO OESTE', 42),
(4429, '4207684', 'IPUACU', 42),
(4430, '4207700', 'IPUMIRIM', 42),
(4431, '4207759', 'IRACEMINHA', 42),
(4432, '4207809', 'IRANI', 42),
(4433, '4207858', 'IRATI', 42),
(4434, '4207908', 'IRINEOPOLIS', 42),
(4435, '4208005', 'ITA', 42),
(4436, '4208104', 'ITAIOPOLIS', 42),
(4437, '4208203', 'ITAJAI', 42),
(4438, '4208302', 'ITAPEMA', 42),
(4439, '4208401', 'ITAPIRANGA', 42),
(4440, '4208450', 'ITAPOA', 42),
(4441, '4208500', 'ITUPORANGA', 42),
(4442, '4208609', 'JABORA', 42),
(4443, '4208708', 'JACINTO MACHADO', 42),
(4444, '4208807', 'JAGUARUNA', 42),
(4445, '4208906', 'JARAGUA DO SUL', 42),
(4446, '4208955', 'JARDINOPOLIS', 42),
(4447, '4209003', 'JOACABA', 42),
(4448, '4209102', 'JOINVILLE', 42),
(4449, '4209151', 'JOSE BOITEUX', 42),
(4450, '4209177', 'JUPIA', 42),
(4451, '4209201', 'LACERDOPOLIS', 42),
(4452, '4209300', 'LAGES', 42),
(4453, '4209409', 'LAGUNA', 42),
(4454, '4209458', 'LAJEADO GRANDE', 42),
(4455, '4209508', 'LAURENTINO', 42),
(4456, '4209607', 'LAURO MULLER', 42),
(4457, '4209706', 'LEBON REGIS', 42),
(4458, '4209805', 'LEOBERTO LEAL', 42),
(4459, '4209854', 'LINDOIA DO SUL', 42),
(4460, '4209904', 'LONTRAS', 42),
(4461, '4210001', 'LUIZ ALVES', 42),
(4462, '4210035', 'LUZERNA', 42),
(4463, '4210050', 'MACIEIRA', 42),
(4464, '4210100', 'MAFRA', 42),
(4465, '4210209', 'MAJOR GERCINO', 42),
(4466, '4210308', 'MAJOR VIEIRA', 42),
(4467, '4210407', 'MARACAJA', 42),
(4468, '4210506', 'MARAVILHA', 42),
(4469, '4210555', 'MAREMA', 42),
(4470, '4210605', 'MASSARANDUBA', 42),
(4471, '4210704', 'MATOS COSTA', 42),
(4472, '4210803', 'MELEIRO', 42),
(4473, '4210852', 'MIRIM DOCE', 42),
(4474, '4210902', 'MODELO', 42),
(4475, '4211009', 'MONDAI', 42),
(4476, '4211058', 'MONTE CARLO', 42),
(4477, '4211108', 'MONTE CASTELO', 42),
(4478, '4211207', 'MORRO DA FUMACA', 42),
(4479, '4211256', 'MORRO GRANDE', 42),
(4480, '4211306', 'NAVEGANTES', 42),
(4481, '4211405', 'NOVA ERECHIM', 42),
(4482, '4211454', 'NOVA ITABERABA', 42),
(4483, '4211504', 'NOVA TRENTO', 42),
(4484, '4211603', 'NOVA VENEZA', 42),
(4485, '4211652', 'NOVO HORIZONTE', 42),
(4486, '4211702', 'ORLEANS', 42),
(4487, '4211751', 'OTACILIO COSTA', 42),
(4488, '4211801', 'OURO', 42),
(4489, '4211850', 'OURO VERDE', 42),
(4490, '4211876', 'PAIAL', 42),
(4491, '4211892', 'PAINEL', 42),
(4492, '4211900', 'PALHOCA', 42),
(4493, '4212007', 'PALMA SOLA', 42),
(4494, '4212056', 'PALMEIRA', 42),
(4495, '4212106', 'PALMITOS', 42),
(4496, '4212205', 'PAPANDUVA', 42),
(4497, '4212239', 'PARAISO', 42),
(4498, '4212254', 'PASSO DE TORRES', 42),
(4499, '4212270', 'PASSOS MAIA', 42),
(4500, '4212304', 'PAULO LOPES', 42),
(4501, '4212403', 'PEDRAS GRANDES', 42),
(4502, '4212502', 'PENHA', 42),
(4503, '4212601', 'PERITIBA', 42),
(4504, '4212650', 'PESCARIA BRAVA', 42),
(4505, '4212700', 'PETROLANDIA', 42),
(4506, '4212809', 'BALNEARIO PICARRAS', 42),
(4507, '4212908', 'PINHALZINHO', 42),
(4508, '4213005', 'PINHEIRO PRETO', 42),
(4509, '4213104', 'PIRATUBA', 42),
(4510, '4213153', 'PLANALTO ALEGRE', 42),
(4511, '4213203', 'POMERODE', 42),
(4512, '4213302', 'PONTE ALTA', 42),
(4513, '4213351', 'PONTE ALTA DO NORTE', 42),
(4514, '4213401', 'PONTE SERRADA', 42),
(4515, '4213500', 'PORTO BELO', 42),
(4516, '4213609', 'PORTO UNIAO', 42),
(4517, '4213708', 'POUSO REDONDO', 42),
(4518, '4213807', 'PRAIA GRANDE', 42),
(4519, '4213906', 'PRESIDENTE CASTELLO BRANCO', 42),
(4520, '4214003', 'PRESIDENTE GETULIO', 42),
(4521, '4214102', 'PRESIDENTE NEREU', 42),
(4522, '4214151', 'PRINCESA', 42),
(4523, '4214201', 'QUILOMBO', 42),
(4524, '4214300', 'RANCHO QUEIMADO', 42),
(4525, '4214409', 'RIO DAS ANTAS', 42),
(4526, '4214508', 'RIO DO CAMPO', 42),
(4527, '4214607', 'RIO DO OESTE', 42),
(4528, '4214706', 'RIO DOS CEDROS', 42),
(4529, '4214805', 'RIO DO SUL', 42),
(4530, '4214904', 'RIO FORTUNA', 42),
(4531, '4215000', 'RIO NEGRINHO', 42),
(4532, '4215059', 'RIO RUFINO', 42),
(4533, '4215075', 'RIQUEZA', 42),
(4534, '4215109', 'RODEIO', 42),
(4535, '4215208', 'ROMELANDIA', 42),
(4536, '4215307', 'SALETE', 42),
(4537, '4215356', 'SALTINHO', 42),
(4538, '4215406', 'SALTO VELOSO', 42),
(4539, '4215455', 'SANGAO', 42),
(4540, '4215505', 'SANTA CECILIA', 42),
(4541, '4215554', 'SANTA HELENA', 42),
(4542, '4215604', 'SANTA ROSA DE LIMA', 42),
(4543, '4215653', 'SANTA ROSA DO SUL', 42),
(4544, '4215679', 'SANTA TEREZINHA', 42),
(4545, '4215687', 'SANTA TEREZINHA DO PROGRESSO', 42),
(4546, '4215695', 'SANTIAGO DO SUL', 42),
(4547, '4215703', 'SANTO AMARO DA IMPERATRIZ', 42),
(4548, '4215752', 'SAO BERNARDINO', 42),
(4549, '4215802', 'SAO BENTO DO SUL', 42),
(4550, '4215901', 'SAO BONIFACIO', 42),
(4551, '4216008', 'SAO CARLOS', 42),
(4552, '4216057', 'SAO CRISTOVAO DO SUL', 42),
(4553, '4216107', 'SAO DOMINGOS', 42),
(4554, '4216206', 'SAO FRANCISCO DO SUL', 42),
(4555, '4216255', 'SAO JOAO DO OESTE', 42),
(4556, '4216305', 'SAO JOAO BATISTA', 42),
(4557, '4216354', 'SAO JOAO DO ITAPERIU', 42),
(4558, '4216404', 'SAO JOAO DO SUL', 42),
(4559, '4216503', 'SAO JOAQUIM', 42),
(4560, '4216602', 'SAO JOSE', 42),
(4561, '4216701', 'SAO JOSE DO CEDRO', 42),
(4562, '4216800', 'SAO JOSE DO CERRITO', 42),
(4563, '4216909', 'SAO LOURENCO DO OESTE', 42),
(4564, '4217006', 'SAO LUDGERO', 42),
(4565, '4217105', 'SAO MARTINHO', 42),
(4566, '4217154', 'SAO MIGUEL DA BOA VISTA', 42),
(4567, '4217204', 'SAO MIGUEL DO OESTE', 42),
(4568, '4217253', 'SAO PEDRO DE ALCANTARA', 42),
(4569, '4217303', 'SAUDADES', 42),
(4570, '4217402', 'SCHROEDER', 42),
(4571, '4217501', 'SEARA', 42),
(4572, '4217550', 'SERRA ALTA', 42),
(4573, '4217600', 'SIDEROPOLIS', 42),
(4574, '4217709', 'SOMBRIO', 42),
(4575, '4217758', 'SUL BRASIL', 42),
(4576, '4217808', 'TAIO', 42),
(4577, '4217907', 'TANGARA', 42),
(4578, '4217956', 'TIGRINHOS', 42),
(4579, '4218004', 'TIJUCAS', 42),
(4580, '4218103', 'TIMBE DO SUL', 42),
(4581, '4218202', 'TIMBO', 42),
(4582, '4218251', 'TIMBO GRANDE', 42),
(4583, '4218301', 'TRES BARRAS', 42),
(4584, '4218350', 'TREVISO', 42),
(4585, '4218400', 'TREZE DE MAIO', 42),
(4586, '4218509', 'TREZE TILIAS', 42),
(4587, '4218608', 'TROMBUDO CENTRAL', 42),
(4588, '4218707', 'TUBARAO', 42),
(4589, '4218756', 'TUNAPOLIS', 42),
(4590, '4218806', 'TURVO', 42),
(4591, '4218855', 'UNIAO DO OESTE', 42),
(4592, '4218905', 'URUBICI', 42),
(4593, '4218954', 'URUPEMA', 42),
(4594, '4219002', 'URUSSANGA', 42),
(4595, '4219101', 'VARGEAO', 42),
(4596, '4219150', 'VARGEM', 42),
(4597, '4219176', 'VARGEM BONITA', 42),
(4598, '4219200', 'VIDAL RAMOS', 42),
(4599, '4219309', 'VIDEIRA', 42),
(4600, '4219358', 'VITOR MEIRELES', 42),
(4601, '4219408', 'WITMARSUM', 42),
(4602, '4219507', 'XANXERE', 42),
(4603, '4219606', 'XAVANTINA', 42),
(4604, '4219705', 'XAXIM', 42),
(4605, '4219853', 'ZORTEA', 42),
(4606, '4220000', 'BALNEARIO RINCAO', 42),
(4607, '4300034', 'ACEGUA', 43),
(4608, '4300059', 'AGUA SANTA', 43),
(4609, '4300109', 'AGUDO', 43),
(4610, '4300208', 'AJURICABA', 43),
(4611, '4300307', 'ALECRIM', 43),
(4612, '4300406', 'ALEGRETE', 43),
(4613, '4300455', 'ALEGRIA', 43),
(4614, '4300471', 'ALMIRANTE TAMANDARE DO SUL', 43),
(4615, '4300505', 'ALPESTRE', 43),
(4616, '4300554', 'ALTO ALEGRE', 43),
(4617, '4300570', 'ALTO FELIZ', 43),
(4618, '4300604', 'ALVORADA', 43),
(4619, '4300638', 'AMARAL FERRADOR', 43),
(4620, '4300646', 'AMETISTA DO SUL', 43),
(4621, '4300661', 'ANDRE DA ROCHA', 43),
(4622, '4300703', 'ANTA GORDA', 43),
(4623, '4300802', 'ANTONIO PRADO', 43),
(4624, '4300851', 'ARAMBARE', 43),
(4625, '4300877', 'ARARICA', 43),
(4626, '4300901', 'ARATIBA', 43),
(4627, '4301008', 'ARROIO DO MEIO', 43),
(4628, '4301057', 'ARROIO DO SAL', 43),
(4629, '4301073', 'ARROIO DO PADRE', 43),
(4630, '4301107', 'ARROIO DOS RATOS', 43),
(4631, '4301206', 'ARROIO DO TIGRE', 43),
(4632, '4301305', 'ARROIO GRANDE', 43),
(4633, '4301404', 'ARVOREZINHA', 43),
(4634, '4301503', 'AUGUSTO PESTANA', 43),
(4635, '4301552', 'AUREA', 43),
(4636, '4301602', 'BAGE', 43),
(4637, '4301636', 'BALNEARIO PINHAL', 43),
(4638, '4301651', 'BARAO', 43),
(4639, '4301701', 'BARAO DE COTEGIPE', 43),
(4640, '4301750', 'BARAO DO TRIUNFO', 43),
(4641, '4301800', 'BARRACAO', 43),
(4642, '4301859', 'BARRA DO GUARITA', 43),
(4643, '4301875', 'BARRA DO QUARAI', 43),
(4644, '4301909', 'BARRA DO RIBEIRO', 43),
(4645, '4301925', 'BARRA DO RIO AZUL', 43),
(4646, '4301958', 'BARRA FUNDA', 43),
(4647, '4302006', 'BARROS CASSAL', 43),
(4648, '4302055', 'BENJAMIN CONSTANT DO SUL', 43),
(4649, '4302105', 'BENTO GONCALVES', 43),
(4650, '4302154', 'BOA VISTA DAS MISSOES', 43),
(4651, '4302204', 'BOA VISTA DO BURICA', 43),
(4652, '4302220', 'BOA VISTA DO CADEADO', 43),
(4653, '4302238', 'BOA VISTA DO INCRA', 43),
(4654, '4302253', 'BOA VISTA DO SUL', 43),
(4655, '4302303', 'BOM JESUS', 43),
(4656, '4302352', 'BOM PRINCIPIO', 43),
(4657, '4302378', 'BOM PROGRESSO', 43),
(4658, '4302402', 'BOM RETIRO DO SUL', 43),
(4659, '4302451', 'BOQUEIRAO DO LEAO', 43),
(4660, '4302501', 'BOSSOROCA', 43),
(4661, '4302584', 'BOZANO', 43),
(4662, '4302600', 'BRAGA', 43),
(4663, '4302659', 'BROCHIER', 43),
(4664, '4302709', 'BUTIA', 43),
(4665, '4302808', 'CACAPAVA DO SUL', 43),
(4666, '4302907', 'CACEQUI', 43),
(4667, '4303004', 'CACHOEIRA DO SUL', 43),
(4668, '4303103', 'CACHOEIRINHA', 43),
(4669, '4303202', 'CACIQUE DOBLE', 43),
(4670, '4303301', 'CAIBATE', 43),
(4671, '4303400', 'CAICARA', 43),
(4672, '4303509', 'CAMAQUA', 43),
(4673, '4303558', 'CAMARGO', 43),
(4674, '4303608', 'CAMBARA DO SUL', 43),
(4675, '4303673', 'CAMPESTRE DA SERRA', 43),
(4676, '4303707', 'CAMPINA DAS MISSOES', 43),
(4677, '4303806', 'CAMPINAS DO SUL', 43),
(4678, '4303905', 'CAMPO BOM', 43),
(4679, '4304002', 'CAMPO NOVO', 43),
(4680, '4304101', 'CAMPOS BORGES', 43),
(4681, '4304200', 'CANDELARIA', 43),
(4682, '4304309', 'CANDIDO GODOI', 43),
(4683, '4304358', 'CANDIOTA', 43),
(4684, '4304408', 'CANELA', 43),
(4685, '4304507', 'CANGUCU', 43),
(4686, '4304606', 'CANOAS', 43),
(4687, '4304614', 'CANUDOS DO VALE', 43),
(4688, '4304622', 'CAPAO BONITO DO SUL', 43),
(4689, '4304630', 'CAPAO DA CANOA', 43),
(4690, '4304655', 'CAPAO DO CIPO', 43),
(4691, '4304663', 'CAPAO DO LEAO', 43),
(4692, '4304671', 'CAPIVARI DO SUL', 43),
(4693, '4304689', 'CAPELA DE SANTANA', 43),
(4694, '4304697', 'CAPITAO', 43),
(4695, '4304705', 'CARAZINHO', 43),
(4696, '4304713', 'CARAA', 43),
(4697, '4304804', 'CARLOS BARBOSA', 43),
(4698, '4304853', 'CARLOS GOMES', 43),
(4699, '4304903', 'CASCA', 43),
(4700, '4304952', 'CASEIROS', 43),
(4701, '4305009', 'CATUIPE', 43),
(4702, '4305108', 'CAXIAS DO SUL', 43),
(4703, '4305116', 'CENTENARIO', 43),
(4704, '4305124', 'CERRITO', 43),
(4705, '4305132', 'CERRO BRANCO', 43),
(4706, '4305157', 'CERRO GRANDE', 43),
(4707, '4305173', 'CERRO GRANDE DO SUL', 43),
(4708, '4305207', 'CERRO LARGO', 43),
(4709, '4305306', 'CHAPADA', 43),
(4710, '4305355', 'CHARQUEADAS', 43),
(4711, '4305371', 'CHARRUA', 43),
(4712, '4305405', 'CHIAPETTA', 43),
(4713, '4305439', 'CHUI', 43),
(4714, '4305447', 'CHUVISCA', 43),
(4715, '4305454', 'CIDREIRA', 43),
(4716, '4305504', 'CIRIACO', 43),
(4717, '4305587', 'COLINAS', 43),
(4718, '4305603', 'COLORADO', 43),
(4719, '4305702', 'CONDOR', 43),
(4720, '4305801', 'CONSTANTINA', 43),
(4721, '4305835', 'COQUEIRO BAIXO', 43),
(4722, '4305850', 'COQUEIROS DO SUL', 43),
(4723, '4305871', 'CORONEL BARROS', 43),
(4724, '4305900', 'CORONEL BICACO', 43),
(4725, '4305934', 'CORONEL PILAR', 43),
(4726, '4305959', 'COTIPORA', 43),
(4727, '4305975', 'COXILHA', 43),
(4728, '4306007', 'CRISSIUMAL', 43),
(4729, '4306056', 'CRISTAL', 43),
(4730, '4306072', 'CRISTAL DO SUL', 43),
(4731, '4306106', 'CRUZ ALTA', 43),
(4732, '4306130', 'CRUZALTENSE', 43),
(4733, '4306205', 'CRUZEIRO DO SUL', 43),
(4734, '4306304', 'DAVID CANABARRO', 43),
(4735, '4306320', 'DERRUBADAS', 43),
(4736, '4306353', 'DEZESSEIS DE NOVEMBRO', 43),
(4737, '4306379', 'DILERMANDO DE AGUIAR', 43),
(4738, '4306403', 'DOIS IRMAOS', 43),
(4739, '4306429', 'DOIS IRMAOS DAS MISSOES', 43),
(4740, '4306452', 'DOIS LAJEADOS', 43),
(4741, '4306502', 'DOM FELICIANO', 43),
(4742, '4306551', 'DOM PEDRO DE ALCANTARA', 43),
(4743, '4306601', 'DOM PEDRITO', 43),
(4744, '4306700', 'DONA FRANCISCA', 43),
(4745, '4306734', 'DOUTOR MAURICIO CARDOSO', 43),
(4746, '4306759', 'DOUTOR RICARDO', 43),
(4747, '4306767', 'ELDORADO DO SUL', 43),
(4748, '4306809', 'ENCANTADO', 43),
(4749, '4306908', 'ENCRUZILHADA DO SUL', 43),
(4750, '4306924', 'ENGENHO VELHO', 43),
(4751, '4306932', 'ENTRE-IJUIS', 43),
(4752, '4306957', 'ENTRE RIOS DO SUL', 43),
(4753, '4306973', 'EREBANGO', 43),
(4754, '4307005', 'ERECHIM', 43),
(4755, '4307054', 'ERNESTINA', 43),
(4756, '4307104', 'HERVAL', 43),
(4757, '4307203', 'ERVAL GRANDE', 43),
(4758, '4307302', 'ERVAL SECO', 43),
(4759, '4307401', 'ESMERALDA', 43),
(4760, '4307450', 'ESPERANCA DO SUL', 43),
(4761, '4307500', 'ESPUMOSO', 43),
(4762, '4307559', 'ESTACAO', 43),
(4763, '4307609', 'ESTANCIA VELHA', 43),
(4764, '4307708', 'ESTEIO', 43),
(4765, '4307807', 'ESTRELA', 43),
(4766, '4307815', 'ESTRELA VELHA', 43),
(4767, '4307831', 'EUGENIO DE CASTRO', 43),
(4768, '4307864', 'FAGUNDES VARELA', 43),
(4769, '4307906', 'FARROUPILHA', 43),
(4770, '4308003', 'FAXINAL DO SOTURNO', 43),
(4771, '4308052', 'FAXINALZINHO', 43),
(4772, '4308078', 'FAZENDA VILANOVA', 43),
(4773, '4308102', 'FELIZ', 43),
(4774, '4308201', 'FLORES DA CUNHA', 43),
(4775, '4308250', 'FLORIANO PEIXOTO', 43),
(4776, '4308300', 'FONTOURA XAVIER', 43),
(4777, '4308409', 'FORMIGUEIRO', 43),
(4778, '4308433', 'FORQUETINHA', 43),
(4779, '4308458', 'FORTALEZA DOS VALOS', 43),
(4780, '4308508', 'FREDERICO WESTPHALEN', 43),
(4781, '4308607', 'GARIBALDI', 43),
(4782, '4308656', 'GARRUCHOS', 43),
(4783, '4308706', 'GAURAMA', 43),
(4784, '4308805', 'GENERAL CAMARA', 43),
(4785, '4308854', 'GENTIL', 43),
(4786, '4308904', 'GETULIO VARGAS', 43),
(4787, '4309001', 'GIRUA', 43),
(4788, '4309050', 'GLORINHA', 43),
(4789, '4309100', 'GRAMADO', 43),
(4790, '4309126', 'GRAMADO DOS LOUREIROS', 43),
(4791, '4309159', 'GRAMADO XAVIER', 43),
(4792, '4309209', 'GRAVATAI', 43),
(4793, '4309258', 'GUABIJU', 43),
(4794, '4309308', 'GUAIBA', 43),
(4795, '4309407', 'GUAPORE', 43),
(4796, '4309506', 'GUARANI DAS MISSOES', 43),
(4797, '4309555', 'HARMONIA', 43),
(4798, '4309571', 'HERVEIRAS', 43),
(4799, '4309605', 'HORIZONTINA', 43),
(4800, '4309654', 'HULHA NEGRA', 43),
(4801, '4309704', 'HUMAITA', 43),
(4802, '4309753', 'IBARAMA', 43),
(4803, '4309803', 'IBIACA', 43),
(4804, '4309902', 'IBIRAIARAS', 43),
(4805, '4309951', 'IBIRAPUITA', 43),
(4806, '4310009', 'IBIRUBA', 43),
(4807, '4310108', 'IGREJINHA', 43),
(4808, '4310207', 'IJUI', 43),
(4809, '4310306', 'ILOPOLIS', 43),
(4810, '4310330', 'IMBE', 43),
(4811, '4310363', 'IMIGRANTE', 43),
(4812, '4310405', 'INDEPENDENCIA', 43),
(4813, '4310413', 'INHACORA', 43),
(4814, '4310439', 'IPE', 43),
(4815, '4310462', 'IPIRANGA DO SUL', 43),
(4816, '4310504', 'IRAI', 43),
(4817, '4310538', 'ITAARA', 43),
(4818, '4310553', 'ITACURUBI', 43),
(4819, '4310579', 'ITAPUCA', 43),
(4820, '4310603', 'ITAQUI', 43),
(4821, '4310652', 'ITATI', 43),
(4822, '4310702', 'ITATIBA DO SUL', 43),
(4823, '4310751', 'IVORA', 43),
(4824, '4310801', 'IVOTI', 43),
(4825, '4310850', 'JABOTICABA', 43),
(4826, '4310876', 'JACUIZINHO', 43),
(4827, '4310900', 'JACUTINGA', 43),
(4828, '4311007', 'JAGUARAO', 43),
(4829, '4311106', 'JAGUARI', 43),
(4830, '4311122', 'JAQUIRANA', 43),
(4831, '4311130', 'JARI', 43),
(4832, '4311155', 'JOIA', 43),
(4833, '4311205', 'JULIO DE CASTILHOS', 43),
(4834, '4311239', 'LAGOA BONITA DO SUL', 43),
(4835, '4311254', 'LAGOAO', 43),
(4836, '4311270', 'LAGOA DOS TRES CANTOS', 43),
(4837, '4311304', 'LAGOA VERMELHA', 43),
(4838, '4311403', 'LAJEADO', 43),
(4839, '4311429', 'LAJEADO DO BUGRE', 43),
(4840, '4311502', 'LAVRAS DO SUL', 43),
(4841, '4311601', 'LIBERATO SALZANO', 43),
(4842, '4311627', 'LINDOLFO COLLOR', 43),
(4843, '4311643', 'LINHA NOVA', 43),
(4844, '4311700', 'MACHADINHO', 43),
(4845, '4311718', 'MACAMBARA', 43),
(4846, '4311734', 'MAMPITUBA', 43),
(4847, '4311759', 'MANOEL VIANA', 43),
(4848, '4311775', 'MAQUINE', 43),
(4849, '4311791', 'MARATA', 43),
(4850, '4311809', 'MARAU', 43),
(4851, '4311908', 'MARCELINO RAMOS', 43),
(4852, '4311981', 'MARIANA PIMENTEL', 43),
(4853, '4312005', 'MARIANO MORO', 43),
(4854, '4312054', 'MARQUES DE SOUZA', 43),
(4855, '4312104', 'MATA', 43),
(4856, '4312138', 'MATO CASTELHANO', 43),
(4857, '4312153', 'MATO LEITAO', 43),
(4858, '4312179', 'MATO QUEIMADO', 43),
(4859, '4312203', 'MAXIMILIANO DE ALMEIDA', 43),
(4860, '4312252', 'MINAS DO LEAO', 43),
(4861, '4312302', 'MIRAGUAI', 43),
(4862, '4312351', 'MONTAURI', 43),
(4863, '4312377', 'MONTE ALEGRE DOS CAMPOS', 43),
(4864, '4312385', 'MONTE BELO DO SUL', 43),
(4865, '4312401', 'MONTENEGRO', 43),
(4866, '4312427', 'MORMACO', 43),
(4867, '4312443', 'MORRINHOS DO SUL', 43),
(4868, '4312450', 'MORRO REDONDO', 43),
(4869, '4312476', 'MORRO REUTER', 43),
(4870, '4312500', 'MOSTARDAS', 43),
(4871, '4312609', 'MUCUM', 43),
(4872, '4312617', 'MUITOS CAPOES', 43),
(4873, '4312625', 'MULITERNO', 43),
(4874, '4312658', 'NAO-ME-TOQUE', 43),
(4875, '4312674', 'NICOLAU VERGUEIRO', 43),
(4876, '4312708', 'NONOAI', 43),
(4877, '4312757', 'NOVA ALVORADA', 43),
(4878, '4312807', 'NOVA ARACA', 43),
(4879, '4312906', 'NOVA BASSANO', 43),
(4880, '4312955', 'NOVA BOA VISTA', 43),
(4881, '4313003', 'NOVA BRESCIA', 43),
(4882, '4313011', 'NOVA CANDELARIA', 43),
(4883, '4313037', 'NOVA ESPERANCA DO SUL', 43),
(4884, '4313060', 'NOVA HARTZ', 43),
(4885, '4313086', 'NOVA PADUA', 43),
(4886, '4313102', 'NOVA PALMA', 43),
(4887, '4313201', 'NOVA PETROPOLIS', 43),
(4888, '4313300', 'NOVA PRATA', 43),
(4889, '4313334', 'NOVA RAMADA', 43),
(4890, '4313359', 'NOVA ROMA DO SUL', 43),
(4891, '4313375', 'NOVA SANTA RITA', 43),
(4892, '4313391', 'NOVO CABRAIS', 43),
(4893, '4313409', 'NOVO HAMBURGO', 43),
(4894, '4313425', 'NOVO MACHADO', 43),
(4895, '4313441', 'NOVO TIRADENTES', 43),
(4896, '4313466', 'NOVO XINGU', 43),
(4897, '4313490', 'NOVO BARREIRO', 43),
(4898, '4313508', 'OSORIO', 43),
(4899, '4313607', 'PAIM FILHO', 43),
(4900, '4313656', 'PALMARES DO SUL', 43),
(4901, '4313706', 'PALMEIRA DAS MISSOES', 43),
(4902, '4313805', 'PALMITINHO', 43),
(4903, '4313904', 'PANAMBI', 43),
(4904, '4313953', 'PANTANO GRANDE', 43),
(4905, '4314001', 'PARAI', 43),
(4906, '4314027', 'PARAISO DO SUL', 43),
(4907, '4314035', 'PARECI NOVO', 43),
(4908, '4314050', 'PAROBE', 43),
(4909, '4314068', 'PASSA SETE', 43),
(4910, '4314076', 'PASSO DO SOBRADO', 43),
(4911, '4314100', 'PASSO FUNDO', 43),
(4912, '4314134', 'PAULO BENTO', 43),
(4913, '4314159', 'PAVERAMA', 43),
(4914, '4314175', 'PEDRAS ALTAS', 43),
(4915, '4314209', 'PEDRO OSORIO', 43),
(4916, '4314308', 'PEJUCARA', 43),
(4917, '4314407', 'PELOTAS', 43),
(4918, '4314423', 'PICADA CAFE', 43),
(4919, '4314456', 'PINHAL', 43),
(4920, '4314464', 'PINHAL DA SERRA', 43),
(4921, '4314472', 'PINHAL GRANDE', 43),
(4922, '4314498', 'PINHEIRINHO DO VALE', 43),
(4923, '4314506', 'PINHEIRO MACHADO', 43),
(4924, '4314548', 'PINTO BANDEIRA', 43),
(4925, '4314555', 'PIRAPO', 43),
(4926, '4314605', 'PIRATINI', 43),
(4927, '4314704', 'PLANALTO', 43),
(4928, '4314753', 'POCO DAS ANTAS', 43),
(4929, '4314779', 'PONTAO', 43),
(4930, '4314787', 'PONTE PRETA', 43),
(4931, '4314803', 'PORTAO', 43),
(4932, '4314902', 'PORTO ALEGRE', 43),
(4933, '4315008', 'PORTO LUCENA', 43),
(4934, '4315057', 'PORTO MAUA', 43),
(4935, '4315073', 'PORTO VERA CRUZ', 43),
(4936, '4315107', 'PORTO XAVIER', 43),
(4937, '4315131', 'POUSO NOVO', 43),
(4938, '4315149', 'PRESIDENTE LUCENA', 43),
(4939, '4315156', 'PROGRESSO', 43),
(4940, '4315172', 'PROTASIO ALVES', 43),
(4941, '4315206', 'PUTINGA', 43),
(4942, '4315305', 'QUARAI', 43),
(4943, '4315313', 'QUATRO IRMAOS', 43),
(4944, '4315321', 'QUEVEDOS', 43),
(4945, '4315354', 'QUINZE DE NOVEMBRO', 43),
(4946, '4315404', 'REDENTORA', 43),
(4947, '4315453', 'RELVADO', 43),
(4948, '4315503', 'RESTINGA SECA', 43),
(4949, '4315552', 'RIO DOS INDIOS', 43),
(4950, '4315602', 'RIO GRANDE', 43),
(4951, '4315701', 'RIO PARDO', 43),
(4952, '4315750', 'RIOZINHO', 43),
(4953, '4315800', 'ROCA SALES', 43),
(4954, '4315909', 'RODEIO BONITO', 43),
(4955, '4315958', 'ROLADOR', 43),
(4956, '4316006', 'ROLANTE', 43),
(4957, '4316105', 'RONDA ALTA', 43),
(4958, '4316204', 'RONDINHA', 43),
(4959, '4316303', 'ROQUE GONZALES', 43),
(4960, '4316402', 'ROSARIO DO SUL', 43),
(4961, '4316428', 'SAGRADA FAMILIA', 43),
(4962, '4316436', 'SALDANHA MARINHO', 43),
(4963, '4316451', 'SALTO DO JACUI', 43),
(4964, '4316477', 'SALVADOR DAS MISSOES', 43),
(4965, '4316501', 'SALVADOR DO SUL', 43),
(4966, '4316600', 'SANANDUVA', 43),
(4967, '4316709', 'SANTA BARBARA DO SUL', 43),
(4968, '4316733', 'SANTA CECILIA DO SUL', 43),
(4969, '4316758', 'SANTA CLARA DO SUL', 43),
(4970, '4316808', 'SANTA CRUZ DO SUL', 43),
(4971, '4316907', 'SANTA MARIA', 43),
(4972, '4316956', 'SANTA MARIA DO HERVAL', 43),
(4973, '4316972', 'SANTA MARGARIDA DO SUL', 43),
(4974, '4317004', 'SANTANA DA BOA VISTA', 43),
(4975, '4317103', 'SANT\'ANA DO LIVRAMENTO', 43),
(4976, '4317202', 'SANTA ROSA', 43),
(4977, '4317251', 'SANTA TEREZA', 43),
(4978, '4317301', 'SANTA VITORIA DO PALMAR', 43),
(4979, '4317400', 'SANTIAGO', 43),
(4980, '4317509', 'SANTO ANGELO', 43),
(4981, '4317558', 'SANTO ANTONIO DO PALMA', 43),
(4982, '4317608', 'SANTO ANTONIO DA PATRULHA', 43),
(4983, '4317707', 'SANTO ANTONIO DAS MISSOES', 43),
(4984, '4317756', 'SANTO ANTONIO DO PLANALTO', 43),
(4985, '4317806', 'SANTO AUGUSTO', 43),
(4986, '4317905', 'SANTO CRISTO', 43),
(4987, '4317954', 'SANTO EXPEDITO DO SUL', 43),
(4988, '4318002', 'SAO BORJA', 43),
(4989, '4318051', 'SAO DOMINGOS DO SUL', 43),
(4990, '4318101', 'SAO FRANCISCO DE ASSIS', 43),
(4991, '4318200', 'SAO FRANCISCO DE PAULA', 43),
(4992, '4318309', 'SAO GABRIEL', 43),
(4993, '4318408', 'SAO JERONIMO', 43),
(4994, '4318424', 'SAO JOAO DA URTIGA', 43),
(4995, '4318432', 'SAO JOAO DO POLESINE', 43),
(4996, '4318440', 'SAO JORGE', 43),
(4997, '4318457', 'SAO JOSE DAS MISSOES', 43),
(4998, '4318465', 'SAO JOSE DO HERVAL', 43),
(4999, '4318481', 'SAO JOSE DO HORTENCIO', 43),
(5000, '4318499', 'SAO JOSE DO INHACORA', 43),
(5001, '4318507', 'SAO JOSE DO NORTE', 43),
(5002, '4318606', 'SAO JOSE DO OURO', 43),
(5003, '4318614', 'SAO JOSE DO SUL', 43),
(5004, '4318622', 'SAO JOSE DOS AUSENTES', 43),
(5005, '4318705', 'SAO LEOPOLDO', 43),
(5006, '4318804', 'SAO LOURENCO DO SUL', 43),
(5007, '4318903', 'SAO LUIZ GONZAGA', 43),
(5008, '4319000', 'SAO MARCOS', 43),
(5009, '4319109', 'SAO MARTINHO', 43),
(5010, '4319125', 'SAO MARTINHO DA SERRA', 43),
(5011, '4319158', 'SAO MIGUEL DAS MISSOES', 43),
(5012, '4319208', 'SAO NICOLAU', 43),
(5013, '4319307', 'SAO PAULO DAS MISSOES', 43),
(5014, '4319356', 'SAO PEDRO DA SERRA', 43),
(5015, '4319364', 'SAO PEDRO DAS MISSOES', 43),
(5016, '4319372', 'SAO PEDRO DO BUTIA', 43),
(5017, '4319406', 'SAO PEDRO DO SUL', 43),
(5018, '4319505', 'SAO SEBASTIAO DO CAI', 43),
(5019, '4319604', 'SAO SEPE', 43),
(5020, '4319703', 'SAO VALENTIM', 43),
(5021, '4319711', 'SAO VALENTIM DO SUL', 43),
(5022, '4319737', 'SAO VALERIO DO SUL', 43),
(5023, '4319752', 'SAO VENDELINO', 43),
(5024, '4319802', 'SAO VICENTE DO SUL', 43),
(5025, '4319901', 'SAPIRANGA', 43),
(5026, '4320008', 'SAPUCAIA DO SUL', 43),
(5027, '4320107', 'SARANDI', 43),
(5028, '4320206', 'SEBERI', 43),
(5029, '4320230', 'SEDE NOVA', 43),
(5030, '4320263', 'SEGREDO', 43),
(5031, '4320305', 'SELBACH', 43),
(5032, '4320321', 'SENADOR SALGADO FILHO', 43),
(5033, '4320354', 'SENTINELA DO SUL', 43),
(5034, '4320404', 'SERAFINA CORREA', 43),
(5035, '4320453', 'SERIO', 43),
(5036, '4320503', 'SERTAO', 43),
(5037, '4320552', 'SERTAO SANTANA', 43),
(5038, '4320578', 'SETE DE SETEMBRO', 43),
(5039, '4320602', 'SEVERIANO DE ALMEIDA', 43),
(5040, '4320651', 'SILVEIRA MARTINS', 43),
(5041, '4320677', 'SINIMBU', 43),
(5042, '4320701', 'SOBRADINHO', 43),
(5043, '4320800', 'SOLEDADE', 43),
(5044, '4320859', 'TABAI', 43),
(5045, '4320909', 'TAPEJARA', 43),
(5046, '4321006', 'TAPERA', 43),
(5047, '4321105', 'TAPES', 43),
(5048, '4321204', 'TAQUARA', 43),
(5049, '4321303', 'TAQUARI', 43),
(5050, '4321329', 'TAQUARUCU DO SUL', 43),
(5051, '4321352', 'TAVARES', 43),
(5052, '4321402', 'TENENTE PORTELA', 43),
(5053, '4321436', 'TERRA DE AREIA', 43),
(5054, '4321451', 'TEUTONIA', 43),
(5055, '4321469', 'TIO HUGO', 43),
(5056, '4321477', 'TIRADENTES DO SUL', 43),
(5057, '4321493', 'TOROPI', 43),
(5058, '4321501', 'TORRES', 43),
(5059, '4321600', 'TRAMANDAI', 43),
(5060, '4321626', 'TRAVESSEIRO', 43),
(5061, '4321634', 'TRES ARROIOS', 43),
(5062, '4321667', 'TRES CACHOEIRAS', 43),
(5063, '4321709', 'TRES COROAS', 43),
(5064, '4321808', 'TRES DE MAIO', 43),
(5065, '4321832', 'TRES FORQUILHAS', 43),
(5066, '4321857', 'TRES PALMEIRAS', 43),
(5067, '4321907', 'TRES PASSOS', 43),
(5068, '4321956', 'TRINDADE DO SUL', 43),
(5069, '4322004', 'TRIUNFO', 43),
(5070, '4322103', 'TUCUNDUVA', 43),
(5071, '4322152', 'TUNAS', 43),
(5072, '4322186', 'TUPANCI DO SUL', 43),
(5073, '4322202', 'TUPANCIRETA', 43),
(5074, '4322251', 'TUPANDI', 43),
(5075, '4322301', 'TUPARENDI', 43),
(5076, '4322327', 'TURUCU', 43),
(5077, '4322343', 'UBIRETAMA', 43),
(5078, '4322350', 'UNIAO DA SERRA', 43),
(5079, '4322376', 'UNISTALDA', 43),
(5080, '4322400', 'URUGUAIANA', 43),
(5081, '4322509', 'VACARIA', 43),
(5082, '4322525', 'VALE VERDE', 43),
(5083, '4322533', 'VALE DO SOL', 43),
(5084, '4322541', 'VALE REAL', 43),
(5085, '4322558', 'VANINI', 43),
(5086, '4322608', 'VENANCIO AIRES', 43),
(5087, '4322707', 'VERA CRUZ', 43),
(5088, '4322806', 'VERANOPOLIS', 43),
(5089, '4322855', 'VESPASIANO CORREA', 43),
(5090, '4322905', 'VIADUTOS', 43),
(5091, '4323002', 'VIAMAO', 43),
(5092, '4323101', 'VICENTE DUTRA', 43),
(5093, '4323200', 'VICTOR GRAEFF', 43),
(5094, '4323309', 'VILA FLORES', 43),
(5095, '4323358', 'VILA LANGARO', 43),
(5096, '4323408', 'VILA MARIA', 43),
(5097, '4323457', 'VILA NOVA DO SUL', 43),
(5098, '4323507', 'VISTA ALEGRE', 43),
(5099, '4323606', 'VISTA ALEGRE DO PRATA', 43),
(5100, '4323705', 'VISTA GAUCHA', 43),
(5101, '4323754', 'VITORIA DAS MISSOES', 43),
(5102, '4323770', 'WESTFALIA', 43),
(5103, '4323804', 'XANGRI-LA', 43),
(5104, '5000203', 'AGUA CLARA', 50),
(5105, '5000252', 'ALCINOPOLIS', 50),
(5106, '5000609', 'AMAMBAI', 50),
(5107, '5000708', 'ANASTACIO', 50),
(5108, '5000807', 'ANAURILANDIA', 50),
(5109, '5000856', 'ANGELICA', 50),
(5110, '5000906', 'ANTONIO JOAO', 50),
(5111, '5001003', 'APARECIDA DO TABOADO', 50),
(5112, '5001102', 'AQUIDAUANA', 50),
(5113, '5001243', 'ARAL MOREIRA', 50),
(5114, '5001508', 'BANDEIRANTES', 50),
(5115, '5001904', 'BATAGUASSU', 50),
(5116, '5002001', 'BATAYPORA', 50),
(5117, '5002100', 'BELA VISTA', 50),
(5118, '5002159', 'BODOQUENA', 50),
(5119, '5002209', 'BONITO', 50),
(5120, '5002308', 'BRASILANDIA', 50),
(5121, '5002407', 'CAARAPO', 50),
(5122, '5002605', 'CAMAPUA', 50),
(5123, '5002704', 'CAMPO GRANDE', 50),
(5124, '5002803', 'CARACOL', 50),
(5125, '5002902', 'CASSILANDIA', 50),
(5126, '5002951', 'CHAPADAO DO SUL', 50),
(5127, '5003108', 'CORGUINHO', 50),
(5128, '5003157', 'CORONEL SAPUCAIA', 50),
(5129, '5003207', 'CORUMBA', 50),
(5130, '5003256', 'COSTA RICA', 50),
(5131, '5003306', 'COXIM', 50),
(5132, '5003454', 'DEODAPOLIS', 50),
(5133, '5003488', 'DOIS IRMAOS DO BURITI', 50),
(5134, '5003504', 'DOURADINA', 50),
(5135, '5003702', 'DOURADOS', 50),
(5136, '5003751', 'ELDORADO', 50),
(5137, '5003801', 'FATIMA DO SUL', 50),
(5138, '5003900', 'FIGUEIRAO', 50),
(5139, '5004007', 'GLORIA DE DOURADOS', 50),
(5140, '5004106', 'GUIA LOPES DA LAGUNA', 50),
(5141, '5004304', 'IGUATEMI', 50),
(5142, '5004403', 'INOCENCIA', 50),
(5143, '5004502', 'ITAPORA', 50),
(5144, '5004601', 'ITAQUIRAI', 50),
(5145, '5004700', 'IVINHEMA', 50),
(5146, '5004809', 'JAPORA', 50),
(5147, '5004908', 'JARAGUARI', 50),
(5148, '5005004', 'JARDIM', 50),
(5149, '5005103', 'JATEI', 50),
(5150, '5005152', 'JUTI', 50),
(5151, '5005202', 'LADARIO', 50),
(5152, '5005251', 'LAGUNA CARAPA', 50),
(5153, '5005400', 'MARACAJU', 50),
(5154, '5005608', 'MIRANDA', 50),
(5155, '5005681', 'MUNDO NOVO', 50),
(5156, '5005707', 'NAVIRAI', 50),
(5157, '5005806', 'NIOAQUE', 50),
(5158, '5006002', 'NOVA ALVORADA DO SUL', 50),
(5159, '5006200', 'NOVA ANDRADINA', 50),
(5160, '5006259', 'NOVO HORIZONTE DO SUL', 50),
(5161, '5006275', 'PARAISO DAS AGUAS', 50),
(5162, '5006309', 'PARANAIBA', 50),
(5163, '5006358', 'PARANHOS', 50),
(5164, '5006408', 'PEDRO GOMES', 50),
(5165, '5006606', 'PONTA PORA', 50),
(5166, '5006903', 'PORTO MURTINHO', 50),
(5167, '5007109', 'RIBAS DO RIO PARDO', 50),
(5168, '5007208', 'RIO BRILHANTE', 50),
(5169, '5007307', 'RIO NEGRO', 50),
(5170, '5007406', 'RIO VERDE DE MATO GROSSO', 50),
(5171, '5007505', 'ROCHEDO', 50),
(5172, '5007554', 'SANTA RITA DO PARDO', 50),
(5173, '5007695', 'SAO GABRIEL DO OESTE', 50),
(5174, '5007703', 'SETE QUEDAS', 50),
(5175, '5007802', 'SELVIRIA', 50),
(5176, '5007901', 'SIDROLANDIA', 50),
(5177, '5007935', 'SONORA', 50),
(5178, '5007950', 'TACURU', 50),
(5179, '5007976', 'TAQUARUSSU', 50),
(5180, '5008008', 'TERENOS', 50),
(5181, '5008305', 'TRES LAGOAS', 50),
(5182, '5008404', 'VICENTINA', 50),
(5183, '5100102', 'ACORIZAL', 51),
(5184, '5100201', 'AGUA BOA', 51),
(5185, '5100250', 'ALTA FLORESTA', 51),
(5186, '5100300', 'ALTO ARAGUAIA', 51),
(5187, '5100359', 'ALTO BOA VISTA', 51),
(5188, '5100409', 'ALTO GARCAS', 51),
(5189, '5100508', 'ALTO PARAGUAI', 51),
(5190, '5100607', 'ALTO TAQUARI', 51),
(5191, '5100805', 'APIACAS', 51),
(5192, '5101001', 'ARAGUAIANA', 51),
(5193, '5101209', 'ARAGUAINHA', 51),
(5194, '5101258', 'ARAPUTANGA', 51),
(5195, '5101308', 'ARENAPOLIS', 51),
(5196, '5101407', 'ARIPUANA', 51),
(5197, '5101605', 'BARAO DE MELGACO', 51),
(5198, '5101704', 'BARRA DO BUGRES', 51),
(5199, '5101803', 'BARRA DO GARCAS', 51),
(5200, '5101852', 'BOM JESUS DO ARAGUAIA', 51),
(5201, '5101902', 'BRASNORTE', 51),
(5202, '5102504', 'CACERES', 51),
(5203, '5102603', 'CAMPINAPOLIS', 51),
(5204, '5102637', 'CAMPO NOVO DO PARECIS', 51),
(5205, '5102678', 'CAMPO VERDE', 51),
(5206, '5102686', 'CAMPOS DE JULIO', 51),
(5207, '5102694', 'CANABRAVA DO NORTE', 51),
(5208, '5102702', 'CANARANA', 51),
(5209, '5102793', 'CARLINDA', 51),
(5210, '5102850', 'CASTANHEIRA', 51),
(5211, '5103007', 'CHAPADA DOS GUIMARAES', 51),
(5212, '5103056', 'CLAUDIA', 51),
(5213, '5103106', 'COCALINHO', 51),
(5214, '5103205', 'COLIDER', 51),
(5215, '5103254', 'COLNIZA', 51),
(5216, '5103304', 'COMODORO', 51),
(5217, '5103353', 'CONFRESA', 51),
(5218, '5103361', 'CONQUISTA D\'OESTE', 51),
(5219, '5103379', 'COTRIGUACU', 51),
(5220, '5103403', 'CUIABA', 51),
(5221, '5103437', 'CURVELANDIA', 51),
(5222, '5103452', 'DENISE', 51),
(5223, '5103502', 'DIAMANTINO', 51),
(5224, '5103601', 'DOM AQUINO', 51),
(5225, '5103700', 'FELIZ NATAL', 51),
(5226, '5103809', 'FIGUEIROPOLIS D\'OESTE', 51),
(5227, '5103858', 'GAUCHA DO NORTE', 51),
(5228, '5103908', 'GENERAL CARNEIRO', 51),
(5229, '5103957', 'GLORIA D\'OESTE', 51),
(5230, '5104104', 'GUARANTA DO NORTE', 51),
(5231, '5104203', 'GUIRATINGA', 51),
(5232, '5104500', 'INDIAVAI', 51),
(5233, '5104526', 'IPIRANGA DO NORTE', 51),
(5234, '5104542', 'ITANHANGA', 51),
(5235, '5104559', 'ITAUBA', 51),
(5236, '5104609', 'ITIQUIRA', 51),
(5237, '5104807', 'JACIARA', 51),
(5238, '5104906', 'JANGADA', 51),
(5239, '5105002', 'JAURU', 51),
(5240, '5105101', 'JUARA', 51),
(5241, '5105150', 'JUINA', 51),
(5242, '5105176', 'JURUENA', 51),
(5243, '5105200', 'JUSCIMEIRA', 51),
(5244, '5105234', 'LAMBARI D\'OESTE', 51),
(5245, '5105259', 'LUCAS DO RIO VERDE', 51),
(5246, '5105309', 'LUCIARA', 51),
(5247, '5105507', 'VILA BELA DA SANTISSIMA TRINDADE', 51),
(5248, '5105580', 'MARCELANDIA', 51),
(5249, '5105606', 'MATUPA', 51),
(5250, '5105622', 'MIRASSOL D\'OESTE', 51),
(5251, '5105903', 'NOBRES', 51),
(5252, '5106000', 'NORTELANDIA', 51),
(5253, '5106109', 'NOSSA SENHORA DO LIVRAMENTO', 51),
(5254, '5106158', 'NOVA BANDEIRANTES', 51),
(5255, '5106174', 'NOVA NAZARE', 51),
(5256, '5106182', 'NOVA LACERDA', 51),
(5257, '5106190', 'NOVA SANTA HELENA', 51),
(5258, '5106208', 'NOVA BRASILANDIA', 51),
(5259, '5106216', 'NOVA CANAA DO NORTE', 51),
(5260, '5106224', 'NOVA MUTUM', 51),
(5261, '5106232', 'NOVA OLIMPIA', 51),
(5262, '5106240', 'NOVA UBIRATA', 51),
(5263, '5106257', 'NOVA XAVANTINA', 51),
(5264, '5106265', 'NOVO MUNDO', 51),
(5265, '5106273', 'NOVO HORIZONTE DO NORTE', 51),
(5266, '5106281', 'NOVO SAO JOAQUIM', 51),
(5267, '5106299', 'PARANAITA', 51),
(5268, '5106307', 'PARANATINGA', 51),
(5269, '5106315', 'NOVO SANTO ANTONIO', 51),
(5270, '5106372', 'PEDRA PRETA', 51),
(5271, '5106422', 'PEIXOTO DE AZEVEDO', 51),
(5272, '5106455', 'PLANALTO DA SERRA', 51),
(5273, '5106505', 'POCONE', 51),
(5274, '5106653', 'PONTAL DO ARAGUAIA', 51),
(5275, '5106703', 'PONTE BRANCA', 51),
(5276, '5106752', 'PONTES E LACERDA', 51),
(5277, '5106778', 'PORTO ALEGRE DO NORTE', 51),
(5278, '5106802', 'PORTO DOS GAUCHOS', 51),
(5279, '5106828', 'PORTO ESPERIDIAO', 51),
(5280, '5106851', 'PORTO ESTRELA', 51),
(5281, '5107008', 'POXOREU', 51),
(5282, '5107040', 'PRIMAVERA DO LESTE', 51),
(5283, '5107065', 'QUERENCIA', 51),
(5284, '5107107', 'SAO JOSE DOS QUATRO MARCOS', 51),
(5285, '5107156', 'RESERVA DO CABACAL', 51),
(5286, '5107180', 'RIBEIRAO CASCALHEIRA', 51),
(5287, '5107198', 'RIBEIRAOZINHO', 51),
(5288, '5107206', 'RIO BRANCO', 51),
(5289, '5107248', 'SANTA CARMEM', 51),
(5290, '5107263', 'SANTO AFONSO', 51),
(5291, '5107297', 'SAO JOSE DO POVO', 51),
(5292, '5107305', 'SAO JOSE DO RIO CLARO', 51),
(5293, '5107354', 'SAO JOSE DO XINGU', 51),
(5294, '5107404', 'SAO PEDRO DA CIPA', 51),
(5295, '5107578', 'RONDOLANDIA', 51),
(5296, '5107602', 'RONDONOPOLIS', 51),
(5297, '5107701', 'ROSARIO OESTE', 51),
(5298, '5107743', 'SANTA CRUZ DO XINGU', 51),
(5299, '5107750', 'SALTO DO CEU', 51),
(5300, '5107768', 'SANTA RITA DO TRIVELATO', 51),
(5301, '5107776', 'SANTA TEREZINHA', 51),
(5302, '5107792', 'SANTO ANTONIO DO LESTE', 51),
(5303, '5107800', 'SANTO ANTONIO DO LEVERGER', 51),
(5304, '5107859', 'SAO FELIX DO ARAGUAIA', 51),
(5305, '5107875', 'SAPEZAL', 51),
(5306, '5107883', 'SERRA NOVA DOURADA', 51),
(5307, '5107909', 'SINOP', 51),
(5308, '5107925', 'SORRISO', 51),
(5309, '5107941', 'TABAPORA', 51),
(5310, '5107958', 'TANGARA DA SERRA', 51),
(5311, '5108006', 'TAPURAH', 51),
(5312, '5108055', 'TERRA NOVA DO NORTE', 51),
(5313, '5108105', 'TESOURO', 51),
(5314, '5108204', 'TORIXOREU', 51),
(5315, '5108303', 'UNIAO DO SUL', 51),
(5316, '5108352', 'VALE DE SAO DOMINGOS', 51),
(5317, '5108402', 'VARZEA GRANDE', 51),
(5318, '5108501', 'VERA', 51),
(5319, '5108600', 'VILA RICA', 51),
(5320, '5108808', 'NOVA GUARITA', 51),
(5321, '5108857', 'NOVA MARILANDIA', 51),
(5322, '5108907', 'NOVA MARINGA', 51),
(5323, '5108956', 'NOVA MONTE VERDE', 51),
(5324, '5200050', 'ABADIA DE GOIAS', 52),
(5325, '5200100', 'ABADIANIA', 52),
(5326, '5200134', 'ACREUNA', 52),
(5327, '5200159', 'ADELANDIA', 52),
(5328, '5200175', 'AGUA FRIA DE GOIAS', 52),
(5329, '5200209', 'AGUA LIMPA', 52),
(5330, '5200258', 'AGUAS LINDAS DE GOIAS', 52),
(5331, '5200308', 'ALEXANIA', 52),
(5332, '5200506', 'ALOANDIA', 52),
(5333, '5200555', 'ALTO HORIZONTE', 52),
(5334, '5200605', 'ALTO PARAISO DE GOIAS', 52),
(5335, '5200803', 'ALVORADA DO NORTE', 52),
(5336, '5200829', 'AMARALINA', 52),
(5337, '5200852', 'AMERICANO DO BRASIL', 52),
(5338, '5200902', 'AMORINOPOLIS', 52),
(5339, '5201108', 'ANAPOLIS', 52),
(5340, '5201207', 'ANHANGUERA', 52),
(5341, '5201306', 'ANICUNS', 52),
(5342, '5201405', 'APARECIDA DE GOIANIA', 52),
(5343, '5201454', 'APARECIDA DO RIO DOCE', 52),
(5344, '5201504', 'APORE', 52),
(5345, '5201603', 'ARACU', 52),
(5346, '5201702', 'ARAGARCAS', 52),
(5347, '5201801', 'ARAGOIANIA', 52),
(5348, '5202155', 'ARAGUAPAZ', 52),
(5349, '5202353', 'ARENOPOLIS', 52),
(5350, '5202502', 'ARUANA', 52),
(5351, '5202601', 'AURILANDIA', 52),
(5352, '5202809', 'AVELINOPOLIS', 52),
(5353, '5203104', 'BALIZA', 52),
(5354, '5203203', 'BARRO ALTO', 52),
(5355, '5203302', 'BELA VISTA DE GOIAS', 52),
(5356, '5203401', 'BOM JARDIM DE GOIAS', 52),
(5357, '5203500', 'BOM JESUS DE GOIAS', 52),
(5358, '5203559', 'BONFINOPOLIS', 52),
(5359, '5203575', 'BONOPOLIS', 52),
(5360, '5203609', 'BRAZABRANTES', 52),
(5361, '5203807', 'BRITANIA', 52),
(5362, '5203906', 'BURITI ALEGRE', 52),
(5363, '5203939', 'BURITI DE GOIAS', 52),
(5364, '5203962', 'BURITINOPOLIS', 52),
(5365, '5204003', 'CABECEIRAS', 52),
(5366, '5204102', 'CACHOEIRA ALTA', 52),
(5367, '5204201', 'CACHOEIRA DE GOIAS', 52),
(5368, '5204250', 'CACHOEIRA DOURADA', 52),
(5369, '5204300', 'CACU', 52),
(5370, '5204409', 'CAIAPONIA', 52),
(5371, '5204508', 'CALDAS NOVAS', 52),
(5372, '5204557', 'CALDAZINHA', 52),
(5373, '5204607', 'CAMPESTRE DE GOIAS', 52),
(5374, '5204656', 'CAMPINACU', 52),
(5375, '5204706', 'CAMPINORTE', 52),
(5376, '5204805', 'CAMPO ALEGRE DE GOIAS', 52),
(5377, '5204854', 'CAMPO LIMPO DE GOIAS', 52),
(5378, '5204904', 'CAMPOS BELOS', 52),
(5379, '5204953', 'CAMPOS VERDES', 52),
(5380, '5205000', 'CARMO DO RIO VERDE', 52),
(5381, '5205059', 'CASTELANDIA', 52),
(5382, '5205109', 'CATALAO', 52),
(5383, '5205208', 'CATURAI', 52),
(5384, '5205307', 'CAVALCANTE', 52),
(5385, '5205406', 'CERES', 52),
(5386, '5205455', 'CEZARINA', 52),
(5387, '5205471', 'CHAPADAO DO CEU', 52),
(5388, '5205497', 'CIDADE OCIDENTAL', 52),
(5389, '5205513', 'COCALZINHO DE GOIAS', 52),
(5390, '5205521', 'COLINAS DO SUL', 52),
(5391, '5205703', 'CORREGO DO OURO', 52),
(5392, '5205802', 'CORUMBA DE GOIAS', 52),
(5393, '5205901', 'CORUMBAIBA', 52),
(5394, '5206206', 'CRISTALINA', 52),
(5395, '5206305', 'CRISTIANOPOLIS', 52),
(5396, '5206404', 'CRIXAS', 52),
(5397, '5206503', 'CROMINIA', 52),
(5398, '5206602', 'CUMARI', 52),
(5399, '5206701', 'DAMIANOPOLIS', 52),
(5400, '5206800', 'DAMOLANDIA', 52),
(5401, '5206909', 'DAVINOPOLIS', 52),
(5402, '5207105', 'DIORAMA', 52),
(5403, '5207253', 'DOVERLANDIA', 52),
(5404, '5207352', 'EDEALINA', 52),
(5405, '5207402', 'EDEIA', 52),
(5406, '5207501', 'ESTRELA DO NORTE', 52),
(5407, '5207535', 'FAINA', 52),
(5408, '5207600', 'FAZENDA NOVA', 52),
(5409, '5207808', 'FIRMINOPOLIS', 52),
(5410, '5207907', 'FLORES DE GOIAS', 52),
(5411, '5208004', 'FORMOSA', 52),
(5412, '5208103', 'FORMOSO', 52),
(5413, '5208152', 'GAMELEIRA DE GOIAS', 52),
(5414, '5208301', 'DIVINOPOLIS DE GOIAS', 52),
(5415, '5208400', 'GOIANAPOLIS', 52),
(5416, '5208509', 'GOIANDIRA', 52),
(5417, '5208608', 'GOIANESIA', 52),
(5418, '5208707', 'GOIANIA', 52),
(5419, '5208806', 'GOIANIRA', 52),
(5420, '5208905', 'GOIAS', 52),
(5421, '5209101', 'GOIATUBA', 52),
(5422, '5209150', 'GOUVELANDIA', 52),
(5423, '5209200', 'GUAPO', 52),
(5424, '5209291', 'GUARAITA', 52),
(5425, '5209408', 'GUARANI DE GOIAS', 52),
(5426, '5209457', 'GUARINOS', 52),
(5427, '5209606', 'HEITORAI', 52),
(5428, '5209705', 'HIDROLANDIA', 52),
(5429, '5209804', 'HIDROLINA', 52),
(5430, '5209903', 'IACIARA', 52),
(5431, '5209937', 'INACIOLANDIA', 52),
(5432, '5209952', 'INDIARA', 52),
(5433, '5210000', 'INHUMAS', 52),
(5434, '5210109', 'IPAMERI', 52),
(5435, '5210158', 'IPIRANGA DE GOIAS', 52),
(5436, '5210208', 'IPORA', 52),
(5437, '5210307', 'ISRAELANDIA', 52),
(5438, '5210406', 'ITABERAI', 52),
(5439, '5210562', 'ITAGUARI', 52),
(5440, '5210604', 'ITAGUARU', 52),
(5441, '5210802', 'ITAJA', 52),
(5442, '5210901', 'ITAPACI', 52),
(5443, '5211008', 'ITAPIRAPUA', 52),
(5444, '5211206', 'ITAPURANGA', 52),
(5445, '5211305', 'ITARUMA', 52),
(5446, '5211404', 'ITAUCU', 52),
(5447, '5211503', 'ITUMBIARA', 52),
(5448, '5211602', 'IVOLANDIA', 52),
(5449, '5211701', 'JANDAIA', 52),
(5450, '5211800', 'JARAGUA', 52),
(5451, '5211909', 'JATAI', 52),
(5452, '5212006', 'JAUPACI', 52),
(5453, '5212055', 'JESUPOLIS', 52),
(5454, '5212105', 'JOVIANIA', 52),
(5455, '5212204', 'JUSSARA', 52),
(5456, '5212253', 'LAGOA SANTA', 52),
(5457, '5212303', 'LEOPOLDO DE BULHOES', 52),
(5458, '5212501', 'LUZIANIA', 52),
(5459, '5212600', 'MAIRIPOTABA', 52),
(5460, '5212709', 'MAMBAI', 52),
(5461, '5212808', 'MARA ROSA', 52),
(5462, '5212907', 'MARZAGAO', 52),
(5463, '5212956', 'MATRINCHA', 52),
(5464, '5213004', 'MAURILANDIA', 52),
(5465, '5213053', 'MIMOSO DE GOIAS', 52),
(5466, '5213087', 'MINACU', 52),
(5467, '5213103', 'MINEIROS', 52),
(5468, '5213400', 'MOIPORA', 52),
(5469, '5213509', 'MONTE ALEGRE DE GOIAS', 52),
(5470, '5213707', 'MONTES CLAROS DE GOIAS', 52),
(5471, '5213756', 'MONTIVIDIU', 52),
(5472, '5213772', 'MONTIVIDIU DO NORTE', 52),
(5473, '5213806', 'MORRINHOS', 52),
(5474, '5213855', 'MORRO AGUDO DE GOIAS', 52),
(5475, '5213905', 'MOSSAMEDES', 52),
(5476, '5214002', 'MOZARLANDIA', 52),
(5477, '5214051', 'MUNDO NOVO', 52),
(5478, '5214101', 'MUTUNOPOLIS', 52),
(5479, '5214408', 'NAZARIO', 52),
(5480, '5214507', 'NEROPOLIS', 52),
(5481, '5214606', 'NIQUELANDIA', 52),
(5482, '5214705', 'NOVA AMERICA', 52),
(5483, '5214804', 'NOVA AURORA', 52),
(5484, '5214838', 'NOVA CRIXAS', 52),
(5485, '5214861', 'NOVA GLORIA', 52);
INSERT INTO `territories` (`id`, `code_ibge`, `name`, `uf_id`) VALUES
(5486, '5214879', 'NOVA IGUACU DE GOIAS', 52),
(5487, '5214903', 'NOVA ROMA', 52),
(5488, '5215009', 'NOVA VENEZA', 52),
(5489, '5215207', 'NOVO BRASIL', 52),
(5490, '5215231', 'NOVO GAMA', 52),
(5491, '5215256', 'NOVO PLANALTO', 52),
(5492, '5215306', 'ORIZONA', 52),
(5493, '5215405', 'OURO VERDE DE GOIAS', 52),
(5494, '5215504', 'OUVIDOR', 52),
(5495, '5215603', 'PADRE BERNARDO', 52),
(5496, '5215652', 'PALESTINA DE GOIAS', 52),
(5497, '5215702', 'PALMEIRAS DE GOIAS', 52),
(5498, '5215801', 'PALMELO', 52),
(5499, '5215900', 'PALMINOPOLIS', 52),
(5500, '5216007', 'PANAMA', 52),
(5501, '5216304', 'PARANAIGUARA', 52),
(5502, '5216403', 'PARAUNA', 52),
(5503, '5216452', 'PEROLANDIA', 52),
(5504, '5216809', 'PETROLINA DE GOIAS', 52),
(5505, '5216908', 'PILAR DE GOIAS', 52),
(5506, '5217104', 'PIRACANJUBA', 52),
(5507, '5217203', 'PIRANHAS', 52),
(5508, '5217302', 'PIRENOPOLIS', 52),
(5509, '5217401', 'PIRES DO RIO', 52),
(5510, '5217609', 'PLANALTINA', 52),
(5511, '5217708', 'PONTALINA', 52),
(5512, '5218003', 'PORANGATU', 52),
(5513, '5218052', 'PORTEIRAO', 52),
(5514, '5218102', 'PORTELANDIA', 52),
(5515, '5218300', 'POSSE', 52),
(5516, '5218391', 'PROFESSOR JAMIL', 52),
(5517, '5218508', 'QUIRINOPOLIS', 52),
(5518, '5218607', 'RIALMA', 52),
(5519, '5218706', 'RIANAPOLIS', 52),
(5520, '5218789', 'RIO QUENTE', 52),
(5521, '5218805', 'RIO VERDE', 52),
(5522, '5218904', 'RUBIATABA', 52),
(5523, '5219001', 'SANCLERLANDIA', 52),
(5524, '5219100', 'SANTA BARBARA DE GOIAS', 52),
(5525, '5219209', 'SANTA CRUZ DE GOIAS', 52),
(5526, '5219258', 'SANTA FE DE GOIAS', 52),
(5527, '5219308', 'SANTA HELENA DE GOIAS', 52),
(5528, '5219357', 'SANTA ISABEL', 52),
(5529, '5219407', 'SANTA RITA DO ARAGUAIA', 52),
(5530, '5219456', 'SANTA RITA DO NOVO DESTINO', 52),
(5531, '5219506', 'SANTA ROSA DE GOIAS', 52),
(5532, '5219605', 'SANTA TEREZA DE GOIAS', 52),
(5533, '5219704', 'SANTA TEREZINHA DE GOIAS', 52),
(5534, '5219712', 'SANTO ANTONIO DA BARRA', 52),
(5535, '5219738', 'SANTO ANTONIO DE GOIAS', 52),
(5536, '5219753', 'SANTO ANTONIO DO DESCOBERTO', 52),
(5537, '5219803', 'SAO DOMINGOS', 52),
(5538, '5219902', 'SAO FRANCISCO DE GOIAS', 52),
(5539, '5220009', 'SAO JOAO D\'ALIANCA', 52),
(5540, '5220058', 'SAO JOAO DA PARAUNA', 52),
(5541, '5220108', 'SAO LUIS DE MONTES BELOS', 52),
(5542, '5220157', 'SAO LUIZ DO NORTE', 52),
(5543, '5220207', 'SAO MIGUEL DO ARAGUAIA', 52),
(5544, '5220264', 'SAO MIGUEL DO PASSA QUATRO', 52),
(5545, '5220280', 'SAO PATRICIO', 52),
(5546, '5220405', 'SAO SIMAO', 52),
(5547, '5220454', 'SENADOR CANEDO', 52),
(5548, '5220504', 'SERRANOPOLIS', 52),
(5549, '5220603', 'SILVANIA', 52),
(5550, '5220686', 'SIMOLANDIA', 52),
(5551, '5220702', 'SITIO D\'ABADIA', 52),
(5552, '5221007', 'TAQUARAL DE GOIAS', 52),
(5553, '5221080', 'TERESINA DE GOIAS', 52),
(5554, '5221197', 'TEREZOPOLIS DE GOIAS', 52),
(5555, '5221304', 'TRES RANCHOS', 52),
(5556, '5221403', 'TRINDADE', 52),
(5557, '5221452', 'TROMBAS', 52),
(5558, '5221502', 'TURVANIA', 52),
(5559, '5221551', 'TURVELANDIA', 52),
(5560, '5221577', 'UIRAPURU', 52),
(5561, '5221601', 'URUACU', 52),
(5562, '5221700', 'URUANA', 52),
(5563, '5221809', 'URUTAI', 52),
(5564, '5221858', 'VALPARAISO DE GOIAS', 52),
(5565, '5221908', 'VARJAO', 52),
(5566, '5222005', 'VIANOPOLIS', 52),
(5567, '5222054', 'VICENTINOPOLIS', 52),
(5568, '5222203', 'VILA BOA', 52),
(5569, '5222302', 'VILA PROPICIO', 52),
(5570, '5300108', 'BRASILIA', 53);

-- --------------------------------------------------------

--
-- Estrutura para tabela `throttle`
--

CREATE TABLE `throttle` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(191) NOT NULL,
  `ip` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `nickname` varchar(100) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender_id` tinyint(3) UNSIGNED NOT NULL,
  `cpf` varchar(100) DEFAULT NULL,
  `rg` varchar(100) DEFAULT NULL,
  `schooling_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `occupation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `profile_photo` varchar(191) DEFAULT NULL,
  `created_by` varchar(191) DEFAULT NULL,
  `updated_by` varchar(191) DEFAULT NULL,
  `role_id` tinyint(3) UNSIGNED DEFAULT NULL,
  `tenant_id` bigint(20) UNSIGNED DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `observation` text DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `users`
--

INSERT INTO `users` (`id`, `name`, `nickname`, `date_of_birth`, `gender_id`, `cpf`, `rg`, `schooling_id`, `occupation_id`, `phone`, `email`, `password`, `profile_photo`, `created_by`, `updated_by`, `role_id`, `tenant_id`, `is_active`, `observation`, `email_verified_at`, `remember_token`, `last_login_at`, `created_at`, `updated_at`) VALUES
(1, 'DEVCACTUS TECNOLOGIA', NULL, NULL, 1, NULL, NULL, NULL, NULL, '83 9 9834-3399', 'devcactustecnologia@gmail.com', '$2y$10$OuENz2IzZGPUw5cYrC2m9O8Zwp87R5Oa2A/wRSbSSMWmIl1T6ZrjO', 'professionals/otuTyPsAsANW5FRLZKcaudknBjdLRJ7x.jpg', NULL, NULL, 99, NULL, 1, NULL, NULL, NULL, '2025-02-18 17:48:38', '2024-04-08 17:28:12', '2025-02-18 17:48:38'),
(2, 'ALCIONE MORAIS DA SILVA', NULL, '1990-04-05', 1, NULL, NULL, NULL, NULL, NULL, 'alcione@gmail.com', '$2y$10$SCSHABJAjgUpJchzU705ZeKgCR0zfiPnqeGGysZRXHro15QMkiyM6', '', '1', NULL, 1, NULL, 1, NULL, NULL, NULL, '2025-02-16 18:45:25', '2024-04-08 20:25:48', '2025-02-16 18:45:25');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cbos`
--
ALTER TABLE `cbos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `customer_agent_collectives`
--
ALTER TABLE `customer_agent_collectives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_agent_collectives_customer_id` (`customer_id`),
  ADD KEY `customer_agent_collectives_tenant_id` (`tenant_id`),
  ADD KEY `customer_agent_collectives_city_id` (`city_id`);

--
-- Índices de tabela `customer_agent_meis`
--
ALTER TABLE `customer_agent_meis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_agent_meis_customer_id` (`customer_id`),
  ADD KEY `customer_agent_meis_tenant_id` (`tenant_id`),
  ADD KEY `customer_agent_meis_city_id` (`city_id`);

--
-- Índices de tabela `customer_agent_pfs`
--
ALTER TABLE `customer_agent_pfs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD KEY `customer_pfs_customer_id` (`customer_id`),
  ADD KEY `customer_pfs_tenant_id` (`tenant_id`),
  ADD KEY `customer_pfs_city_id` (`city_id`);

--
-- Índices de tabela `customer_agent_pj_without_profits`
--
ALTER TABLE `customer_agent_pj_without_profits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_agent_pj_without_profits_customer_id` (`customer_id`),
  ADD KEY `customer_agent_pj_without_profits_tenant_id` (`tenant_id`),
  ADD KEY `customer_agent_pj_without_profits_city_id` (`city_id`);

--
-- Índices de tabela `customer_agent_pj_with_profits`
--
ALTER TABLE `customer_agent_pj_with_profits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_agent_pj_with_profits_customer_id` (`customer_id`),
  ADD KEY `customer_agent_pj_with_profits_tenant_id` (`tenant_id`),
  ADD KEY `customer_agent_pj_with_profits_city_id` (`city_id`);

--
-- Índices de tabela `customer_social_medias`
--
ALTER TABLE `customer_social_medias`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `editals`
--
ALTER TABLE `editals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `editals_tenant_id_foreign` (`tenant_id`);

--
-- Índices de tabela `edital_agent_types`
--
ALTER TABLE `edital_agent_types`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `edital_assign_avaliator`
--
ALTER TABLE `edital_assign_avaliator`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `edital_attachments`
--
ALTER TABLE `edital_attachments`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `edital_documents`
--
ALTER TABLE `edital_documents`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `edital_document_types`
--
ALTER TABLE `edital_document_types`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `edital_people_type`
--
ALTER TABLE `edital_people_type`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `edital_people_types`
--
ALTER TABLE `edital_people_types`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `edital_project_identification`
--
ALTER TABLE `edital_project_identification`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `edital_project_identifications`
--
ALTER TABLE `edital_project_identifications`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `edital_quota`
--
ALTER TABLE `edital_quota`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `edital_quotas`
--
ALTER TABLE `edital_quotas`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `identification_project_justification_id`
--
ALTER TABLE `identification_project_justification_id`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_from_user_foreign` (`from_user_id`),
  ADD KEY `notifications_to_customer_id_foreign` (`to_customer_id`);

--
-- Índices de tabela `notification_professionals`
--
ALTER TABLE `notification_professionals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notification_professionals_tenant_id_foreign` (`tenant_id`);

--
-- Índices de tabela `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_accessibilities`
--
ALTER TABLE `project_accessibilities`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_accessibility_arquitetonics`
--
ALTER TABLE `project_accessibility_arquitetonics`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_accessibility_atitudinals`
--
ALTER TABLE `project_accessibility_atitudinals`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_accessibility_communicationals`
--
ALTER TABLE `project_accessibility_communicationals`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_analyze_document_timelines`
--
ALTER TABLE `project_analyze_document_timelines`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_analyze_status_complements`
--
ALTER TABLE `project_analyze_status_complements`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_analyze_status_complement_timelines`
--
ALTER TABLE `project_analyze_status_complement_timelines`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_analyze_status_documents`
--
ALTER TABLE `project_analyze_status_documents`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_analyze_status_document_timelines`
--
ALTER TABLE `project_analyze_status_document_timelines`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_categories`
--
ALTER TABLE `project_categories`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_diligences`
--
ALTER TABLE `project_diligences`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_diligence_messages`
--
ALTER TABLE `project_diligence_messages`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_diligence_message_documents`
--
ALTER TABLE `project_diligence_message_documents`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_documents`
--
ALTER TABLE `project_documents`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_identification_projects`
--
ALTER TABLE `project_identification_projects`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_identification_project_accessibilities`
--
ALTER TABLE `project_identification_project_accessibilities`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_identification_project_accessibility_timelines`
--
ALTER TABLE `project_identification_project_accessibility_timelines`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_identification_project_categories`
--
ALTER TABLE `project_identification_project_categories`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_identification_project_category_timelines`
--
ALTER TABLE `project_identification_project_category_timelines`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_identification_project_contrapartid_socials`
--
ALTER TABLE `project_identification_project_contrapartid_socials`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_identification_project_contrapartid_social_timelines`
--
ALTER TABLE `project_identification_project_contrapartid_social_timelines`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_identification_project_cronograms`
--
ALTER TABLE `project_identification_project_cronograms`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_identification_project_cronogram_timelines`
--
ALTER TABLE `project_identification_project_cronogram_timelines`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_identification_project_descriptions`
--
ALTER TABLE `project_identification_project_descriptions`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_identification_project_description_timelines`
--
ALTER TABLE `project_identification_project_description_timelines`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_identification_project_justifications`
--
ALTER TABLE `project_identification_project_justifications`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_identification_project_justification_timelines`
--
ALTER TABLE `project_identification_project_justification_timelines`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_identification_project_locals`
--
ALTER TABLE `project_identification_project_locals`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_identification_project_local_timelines`
--
ALTER TABLE `project_identification_project_local_timelines`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_identification_project_names`
--
ALTER TABLE `project_identification_project_names`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_identification_project_name_timelines`
--
ALTER TABLE `project_identification_project_name_timelines`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_identification_project_objectives`
--
ALTER TABLE `project_identification_project_objectives`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_identification_project_objetive_timelines`
--
ALTER TABLE `project_identification_project_objetive_timelines`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_identification_project_plans`
--
ALTER TABLE `project_identification_project_plans`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_identification_project_plan_timelines`
--
ALTER TABLE `project_identification_project_plan_timelines`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_identification_project_prices`
--
ALTER TABLE `project_identification_project_prices`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_identification_project_price_timelines`
--
ALTER TABLE `project_identification_project_price_timelines`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_identification_project_resumes`
--
ALTER TABLE `project_identification_project_resumes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_identification_project_resume_timelines`
--
ALTER TABLE `project_identification_project_resume_timelines`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_identification_project_targets`
--
ALTER TABLE `project_identification_project_targets`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_identification_project_target_timelines`
--
ALTER TABLE `project_identification_project_target_timelines`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_identification_project_timelines`
--
ALTER TABLE `project_identification_project_timelines`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_identification_proponents`
--
ALTER TABLE `project_identification_proponents`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_identification_proponent_timelines`
--
ALTER TABLE `project_identification_proponent_timelines`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_inscription_accessibility`
--
ALTER TABLE `project_inscription_accessibility`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_inscription_accessibility_arquitetonic`
--
ALTER TABLE `project_inscription_accessibility_arquitetonic`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_inscription_accessibility_atitudinal`
--
ALTER TABLE `project_inscription_accessibility_atitudinal`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_inscription_accessibility_communicational`
--
ALTER TABLE `project_inscription_accessibility_communicational`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_inscription_projects`
--
ALTER TABLE `project_inscription_projects`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_inscription_project_timelines`
--
ALTER TABLE `project_inscription_project_timelines`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_inscription_strategy`
--
ALTER TABLE `project_inscription_strategy`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_strategies`
--
ALTER TABLE `project_strategies`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tenants`
--
ALTER TABLE `tenants`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tenant_user`
--
ALTER TABLE `tenant_user`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `territories`
--
ALTER TABLE `territories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `territories_uf_id_foreign` (`uf_id`);

--
-- Índices de tabela `throttle`
--
ALTER TABLE `throttle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `throttle_user_id_index` (`user_id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cbos`
--
ALTER TABLE `cbos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2626;

--
-- AUTO_INCREMENT de tabela `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `customer_agent_collectives`
--
ALTER TABLE `customer_agent_collectives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `customer_agent_meis`
--
ALTER TABLE `customer_agent_meis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `customer_agent_pfs`
--
ALTER TABLE `customer_agent_pfs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `customer_agent_pj_without_profits`
--
ALTER TABLE `customer_agent_pj_without_profits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `customer_agent_pj_with_profits`
--
ALTER TABLE `customer_agent_pj_with_profits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `customer_social_medias`
--
ALTER TABLE `customer_social_medias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `editals`
--
ALTER TABLE `editals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `edital_agent_types`
--
ALTER TABLE `edital_agent_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `edital_assign_avaliator`
--
ALTER TABLE `edital_assign_avaliator`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `edital_attachments`
--
ALTER TABLE `edital_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `edital_documents`
--
ALTER TABLE `edital_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT de tabela `edital_document_types`
--
ALTER TABLE `edital_document_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de tabela `edital_people_type`
--
ALTER TABLE `edital_people_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `edital_people_types`
--
ALTER TABLE `edital_people_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `edital_project_identification`
--
ALTER TABLE `edital_project_identification`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de tabela `edital_project_identifications`
--
ALTER TABLE `edital_project_identifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `edital_quota`
--
ALTER TABLE `edital_quota`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `edital_quotas`
--
ALTER TABLE `edital_quotas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `identification_project_justification_id`
--
ALTER TABLE `identification_project_justification_id`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `notification_professionals`
--
ALTER TABLE `notification_professionals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `project_accessibilities`
--
ALTER TABLE `project_accessibilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de tabela `project_accessibility_arquitetonics`
--
ALTER TABLE `project_accessibility_arquitetonics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT de tabela `project_accessibility_atitudinals`
--
ALTER TABLE `project_accessibility_atitudinals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT de tabela `project_accessibility_communicationals`
--
ALTER TABLE `project_accessibility_communicationals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT de tabela `project_analyze_document_timelines`
--
ALTER TABLE `project_analyze_document_timelines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `project_analyze_status_complements`
--
ALTER TABLE `project_analyze_status_complements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `project_analyze_status_complement_timelines`
--
ALTER TABLE `project_analyze_status_complement_timelines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `project_analyze_status_documents`
--
ALTER TABLE `project_analyze_status_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `project_analyze_status_document_timelines`
--
ALTER TABLE `project_analyze_status_document_timelines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `project_categories`
--
ALTER TABLE `project_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `project_diligences`
--
ALTER TABLE `project_diligences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `project_diligence_messages`
--
ALTER TABLE `project_diligence_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `project_diligence_message_documents`
--
ALTER TABLE `project_diligence_message_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `project_documents`
--
ALTER TABLE `project_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de tabela `project_identification_projects`
--
ALTER TABLE `project_identification_projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de tabela `project_identification_project_accessibilities`
--
ALTER TABLE `project_identification_project_accessibilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `project_identification_project_accessibility_timelines`
--
ALTER TABLE `project_identification_project_accessibility_timelines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `project_identification_project_categories`
--
ALTER TABLE `project_identification_project_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `project_identification_project_category_timelines`
--
ALTER TABLE `project_identification_project_category_timelines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `project_identification_project_contrapartid_socials`
--
ALTER TABLE `project_identification_project_contrapartid_socials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `project_identification_project_contrapartid_social_timelines`
--
ALTER TABLE `project_identification_project_contrapartid_social_timelines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `project_identification_project_cronograms`
--
ALTER TABLE `project_identification_project_cronograms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `project_identification_project_cronogram_timelines`
--
ALTER TABLE `project_identification_project_cronogram_timelines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `project_identification_project_descriptions`
--
ALTER TABLE `project_identification_project_descriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `project_identification_project_description_timelines`
--
ALTER TABLE `project_identification_project_description_timelines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `project_identification_project_justifications`
--
ALTER TABLE `project_identification_project_justifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `project_identification_project_justification_timelines`
--
ALTER TABLE `project_identification_project_justification_timelines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `project_identification_project_locals`
--
ALTER TABLE `project_identification_project_locals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `project_identification_project_local_timelines`
--
ALTER TABLE `project_identification_project_local_timelines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `project_identification_project_names`
--
ALTER TABLE `project_identification_project_names`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `project_identification_project_name_timelines`
--
ALTER TABLE `project_identification_project_name_timelines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `project_identification_project_objectives`
--
ALTER TABLE `project_identification_project_objectives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `project_identification_project_objetive_timelines`
--
ALTER TABLE `project_identification_project_objetive_timelines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `project_identification_project_plans`
--
ALTER TABLE `project_identification_project_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `project_identification_project_plan_timelines`
--
ALTER TABLE `project_identification_project_plan_timelines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `project_identification_project_prices`
--
ALTER TABLE `project_identification_project_prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `project_identification_project_price_timelines`
--
ALTER TABLE `project_identification_project_price_timelines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `project_identification_project_resumes`
--
ALTER TABLE `project_identification_project_resumes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `project_identification_project_resume_timelines`
--
ALTER TABLE `project_identification_project_resume_timelines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `project_identification_project_targets`
--
ALTER TABLE `project_identification_project_targets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `project_identification_project_target_timelines`
--
ALTER TABLE `project_identification_project_target_timelines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `project_identification_project_timelines`
--
ALTER TABLE `project_identification_project_timelines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `project_identification_proponents`
--
ALTER TABLE `project_identification_proponents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `project_identification_proponent_timelines`
--
ALTER TABLE `project_identification_proponent_timelines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `project_inscription_accessibility`
--
ALTER TABLE `project_inscription_accessibility`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `project_inscription_accessibility_arquitetonic`
--
ALTER TABLE `project_inscription_accessibility_arquitetonic`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `project_inscription_accessibility_atitudinal`
--
ALTER TABLE `project_inscription_accessibility_atitudinal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `project_inscription_accessibility_communicational`
--
ALTER TABLE `project_inscription_accessibility_communicational`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `project_inscription_projects`
--
ALTER TABLE `project_inscription_projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `project_inscription_project_timelines`
--
ALTER TABLE `project_inscription_project_timelines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `project_inscription_strategy`
--
ALTER TABLE `project_inscription_strategy`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `project_strategies`
--
ALTER TABLE `project_strategies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `states`
--
ALTER TABLE `states`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de tabela `tenants`
--
ALTER TABLE `tenants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tenant_user`
--
ALTER TABLE `tenant_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `territories`
--
ALTER TABLE `territories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5572;

--
-- AUTO_INCREMENT de tabela `throttle`
--
ALTER TABLE `throttle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `customer_agent_collectives`
--
ALTER TABLE `customer_agent_collectives`
  ADD CONSTRAINT `customer_agent_collectives_city_id` FOREIGN KEY (`city_id`) REFERENCES `territories` (`id`),
  ADD CONSTRAINT `customer_agent_collectives_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `customer_agent_collectives_tenant_id` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`);

--
-- Restrições para tabelas `customer_agent_meis`
--
ALTER TABLE `customer_agent_meis`
  ADD CONSTRAINT `customer_agent_meis_city_id` FOREIGN KEY (`city_id`) REFERENCES `territories` (`id`),
  ADD CONSTRAINT `customer_agent_meis_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `customer_agent_meis_tenant_id` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`);

--
-- Restrições para tabelas `customer_agent_pfs`
--
ALTER TABLE `customer_agent_pfs`
  ADD CONSTRAINT `customer_pfs_city_id` FOREIGN KEY (`city_id`) REFERENCES `territories` (`id`),
  ADD CONSTRAINT `customer_pfs_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `customer_pfs_tenant_id` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`);

--
-- Restrições para tabelas `customer_agent_pj_without_profits`
--
ALTER TABLE `customer_agent_pj_without_profits`
  ADD CONSTRAINT `customer_agent_pj_without_profits_city_id` FOREIGN KEY (`city_id`) REFERENCES `territories` (`id`),
  ADD CONSTRAINT `customer_agent_pj_without_profits_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `customer_agent_pj_without_profits_tenant_id` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`);

--
-- Restrições para tabelas `customer_agent_pj_with_profits`
--
ALTER TABLE `customer_agent_pj_with_profits`
  ADD CONSTRAINT `customer_agent_pj_with_profits_city_id` FOREIGN KEY (`city_id`) REFERENCES `territories` (`id`),
  ADD CONSTRAINT `customer_agent_pj_with_profits_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `customer_agent_pj_with_profits_tenant_id` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`);

--
-- Restrições para tabelas `editals`
--
ALTER TABLE `editals`
  ADD CONSTRAINT `editals_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`);

--
-- Restrições para tabelas `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_from_user_foreign` FOREIGN KEY (`from_user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `notifications_to_customer_id_foreign` FOREIGN KEY (`to_customer_id`) REFERENCES `customers` (`id`);

--
-- Restrições para tabelas `notification_professionals`
--
ALTER TABLE `notification_professionals`
  ADD CONSTRAINT `notification_professionals_tenant_id_foreign` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`id`);

--
-- Restrições para tabelas `territories`
--
ALTER TABLE `territories`
  ADD CONSTRAINT `territories_uf_id_foreign` FOREIGN KEY (`uf_id`) REFERENCES `states` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
