-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04-Jun-2022 às 09:24
-- Versão do servidor: 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sge_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

CREATE TABLE `alunos` (
  `id_aluno` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `genero` varchar(50) DEFAULT NULL,
  `ident` varchar(50) DEFAULT NULL,
  `data_val` date DEFAULT NULL,
  `data_nasc` date DEFAULT NULL,
  `idade` int(11) DEFAULT NULL,
  `naturalidade` varchar(50) DEFAULT NULL,
  `provincial` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telfone` varchar(50) DEFAULT NULL,
  `rua` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id_aluno`, `nome`, `genero`, `ident`, `data_val`, `data_nasc`, `idade`, `naturalidade`, `provincial`, `email`, `telfone`, `rua`, `bairro`, `cidade`) VALUES
(1, 'Adriana Pedro José', 'Masculino', '0043434445UE047', '2022-04-30', '1994-10-17', 26, 'Uíge', 'Uíge', 'adriano@teste.com', '932455676', 'A', 'Mbembangango', 'Uíge'),
(2, 'Fineza Deodeth', 'Feminino', '008674838UE098', '2024-10-21', '1999-10-21', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ano_lectivos`
--

CREATE TABLE `ano_lectivos` (
  `id_ano` int(11) NOT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `ano_lectivos`
--

INSERT INTO `ano_lectivos` (`id_ano`, `descricao`, `data_inicio`, `data_fim`, `estado`) VALUES
(1, '2020/2021', '2020-09-01', '2021-07-31', 'Encerrado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `classes`
--

CREATE TABLE `classes` (
  `id_classe` int(11) NOT NULL,
  `classe` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `classes`
--

INSERT INTO `classes` (`id_classe`, `classe`) VALUES
(1, '10ª'),
(2, '11ª');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contas`
--

CREATE TABLE `contas` (
  `id_conta` int(11) NOT NULL,
  `data_reg` date DEFAULT NULL,
  `conta` varchar(50) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `data_venc` date DEFAULT NULL,
  `id_tipopag` int(11) DEFAULT NULL,
  `valor` decimal(10,0) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contas`
--

INSERT INTO `contas` (`id_conta`, `data_reg`, `conta`, `tipo`, `data_venc`, `id_tipopag`, `valor`, `estado`) VALUES
(1, '2022-04-25', 'A pagar', 'Energia', '2022-05-25', 2, '5000', 'Não pago');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cursos`
--

CREATE TABLE `cursos` (
  `id_curso` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `abreviacao` varchar(50) DEFAULT NULL,
  `nivel` varchar(50) NOT NULL,
  `data_criacao` date DEFAULT NULL,
  `situacao` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cursos`
--

INSERT INTO `cursos` (`id_curso`, `nome`, `abreviacao`, `nivel`, `data_criacao`, `situacao`) VALUES
(1, 'Informática de Gestão', 'IG', 'Ensino Médio', '2017-01-22', 'Legalizado'),
(2, 'Contabilidade e Gestão', 'CG', 'Ensino Médio', '2017-01-22', 'Legalizado'),
(3, 'Auxiliar de Contabilidade', 'AC', 'Ensino Básico', '2022-05-01', 'Legalizado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `departamentos`
--

CREATE TABLE `departamentos` (
  `id_dep` int(11) NOT NULL,
  `departamento` varchar(50) DEFAULT NULL,
  `descricao` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `departamentos`
--

INSERT INTO `departamentos` (`id_dep`, `departamento`, `descricao`) VALUES
(1, 'Direção', NULL),
(2, 'Sub-Direção Pedagógica', NULL),
(3, 'Secretaria', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplinas`
--

CREATE TABLE `disciplinas` (
  `id_disc` int(11) NOT NULL,
  `disciplina` varchar(50) DEFAULT NULL,
  `ref` varchar(50) DEFAULT NULL,
  `componente` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `disciplinas`
--

INSERT INTO `disciplinas` (`id_disc`, `disciplina`, `ref`, `componente`) VALUES
(1, 'Técnica de Linguagemde Programação', 'TLP', 'Técnica'),
(2, 'Tecnologia de Informação e Comunicação', 'TIC', 'Técnica'),
(4, 'Matemática', 'MAT', 'Técnica');

-- --------------------------------------------------------

--
-- Estrutura da tabela `discplinas_prof`
--

CREATE TABLE `discplinas_prof` (
  `id_discprof` int(11) NOT NULL,
  `id_disc` int(11) DEFAULT NULL,
  `id_turma` int(11) DEFAULT NULL,
  `carga_horaria` varchar(50) DEFAULT NULL,
  `t_semanal` int(11) DEFAULT NULL,
  `id_prof` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `entradas`
--

CREATE TABLE `entradas` (
  `id_ent` int(11) NOT NULL,
  `data_reg` date DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `valor` decimal(10,0) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `id_tipopag` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `entradas`
--

INSERT INTO `entradas` (`id_ent`, `data_reg`, `tipo`, `valor`, `estado`, `id_tipopag`) VALUES
(3, '2022-05-09', 'Multa de propinas', '2000', 'Pago', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `entrada_patrimonios`
--

CREATE TABLE `entrada_patrimonios` (
  `id_ent` int(11) NOT NULL,
  `id_pat` int(11) DEFAULT NULL,
  `qtde` int(11) DEFAULT NULL,
  `valor` int(11) DEFAULT NULL,
  `fornecedor` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id_func` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `num_agente` varchar(50) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `identificacao` varchar(50) DEFAULT NULL,
  `genero` varchar(50) DEFAULT NULL,
  `identidade` varchar(50) DEFAULT NULL,
  `data_val` date DEFAULT NULL,
  `data_nasc` date DEFAULT NULL,
  `telefone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `rua` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `situacao` varchar(50) NOT NULL,
  `foto` longblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id_func`, `nome`, `num_agente`, `tipo`, `identificacao`, `genero`, `identidade`, `data_val`, `data_nasc`, `telefone`, `email`, `rua`, `bairro`, `cidade`, `situacao`, `foto`) VALUES
(1, 'Maria Pedro', '00\'3764A21', 'Professor', 'P001', 'Feminino', '008765444UE043', '2022-04-30', '1990-10-21', '934765345', NULL, NULL, NULL, NULL, 'Férias', 0x89504e470d0a1a0a0000000d4948445200000030000000300802000000d8606ed00000000970485973000049d2000049d201a8458af80000112c49444154789ca55869ac5d5775fed6dafb9c73efb9e39bed67c74e3cc40949ea380922388d9c0408344211888a922250a9545aaa8a566a05a503a202215ad454fc0009548aaab6d04a4c615013a0092121232138813876e2e13de7cdefbef7ee78a6bdd7ea8ffbfce298b8e3f7ebee73f6ddebdb6beff3ad81fadd87551d730d800dc6bc5bf7ae4d5cb2c124d4b962d9e7f94ffef2f3c1132f9483101781a88a8aaa026062c3bcf5ca89df982c5d77f787aad3d3cc65e2d015cb2a85b123c636bc5bf3ae4d5c26b22a2988a9d7be5fd51bdb00401c19ae3bb7ea5d874dd906932e6f3ff2c18f961e3b195a7b3136e7d192c2fbdc15a212d9b0746e03aabad60c5ffba58f57a6a78c6daa7a572cab381b8cb1a978b70a10402209a00ca86a219201f0c5baf71d63c78d6d881fb87ce9e8dd5f081f7d618b4dee0b27fe62849838b241ad14c76139f7ae930e441500118db68b277ee7635967dd15cb442608a698ad732def5ac43151a0ea550650655040c42a092044816a2abe638331631b4b4f1f6dfff3f7861b15d5e5ee46e1bd65331c0e0fc8891f14d9052c0363eaa53860eee7c9f00901a3ab839f7dfcf3007bb706b0092689ac777da807a09aa90a71c02aa9428c6d006c6c43a57045cbbb36d3c8f1bffeca68a902c08b9f5d5fae96ca95b03434d0ca7a8b3400609855746e6375767d2573c5f9b4ca612960b3f59089e5fea3730f3ee57daf2896cef3d3ba4ac11c3397c40f984d85a90c1000a2c80613c4d6b9b5d907be1fbeb83074c65cbb3516d7e2207ad9da9513bbfff0f6e5bc4ba04a54da353a395ea9cdb7d7567aedf33995824854b686d5a074f2335f31a6a99215f9d2d04f4c81c203200a8ca9b3f8aec8001000ceb500b2c114913df34f5fad8625001b492fb261ad146fadbb9ef476bde37523fba6a77eefc84ad10340a0382c5d32322e2273edd6f99c221b0e0f7793e2ccf2c2c3cfd96044352b8a25d59cb844640188e6de6f309b3a91f56e43554412ef3708ec7b51f693178757a49f2553b5e6d68aaaaa07a7eabb27014c1edabbed0f6e5b94fed0a4216e942ba1318b9df5f36e3a11d1d6300ea3d97ffda6b123d68ea864deb5d9548823f17d95d4d81116df552dd85489d898aa4ae18aa533f73d30129601f4b374ac523f7fc72d3fd8fdcec35bc3f1ab775ffeb1b72f4c523bed2b34b436328117bf36e8e222489f78a6bf3a6bec880d46547357b45432366522eb5d9b99cbc465a21080b1636c62d1acf5a3870363cfeda9b4b556e15d78645f3cd53cdf4079a271ed9fbf237ef7f50b36eda683c0d84a18ad0f7ab92b0aef148a57a2223cffe3875cb17ece4fb94a013073994d854573a81b4e15df61d324ad25cf9cdafc73f4321b85ae5465ef3b6efce54d93e19db75c73e86fdf53fbed1bd37df5cc68a3149fdd5825d020cf2e981cd960fd89e7bc5b776e9db9666c95d80ed757c92cc188162203e6b2776b0a4d1613de18a05c0530549d21968adede3f792b0717956c32bcfdf095db0f5f997793ce8985f017b3fd1fcfa897dc17a1090038d994b1f4d81c73e48b7535b93115552792881fb0a9308840502d00252e43b3d6f33f2bd9e07c4b4efcbcf42ef9a3db8777f9bf45582b8f5fbf67ff7b6f91ab262df372b70d40549362d35bd9a93963c6d944e2fb2299428604006295820063ea9bc2a8d29f9f0d78d30daaba3ce8b40f8dbde693ef1cbd62e7ff84cdf9d8f1b61b12ef24e2dc15229216c570cda0f0ddb3f33698628ebc6bab14cc65e6b26ace6cca44d1501801638309dff34c04a097a533ebcbb879f781f7dd16352aff5b36006abb26a2abb64fdd7675ea0a27bef00e403f4f2d9bd60b4755bd0d2799236018f22c73cce27b2289aa07e0ddaaaa978498b99b251b496f47633c1aa9fe1fa86c61fbdb6f18bdf90081bc059503555d4f7a964d77f6accb97c5f75f1646c9c477cf09a36f0fd307f11dd7dd2060a1b3d62c5706455abd74e2ff43a87ad92447413c5aabbeed60e02829f24e3ab06c8ad501e0bceb0c9324f13dd5ccd8a615df5575c6340162138b64aedf66916a585268bf66b65f36b5b0d44ad39c98e27254adc4d54af97cf1bd1844b4d71ff4fa835e672077ecd3e576a35e5b5c5d098c2582ef3863479c5b73c52a9b129b58b5f06ec332c7aa057100c0da71ef3b32c80c7364432f121cd8560cf2722a8da0dccbb2d6c2da0bbdd9c415b54a3c313eb2ffb257b9e6227afce46c6bbdddef2771188ed76a63954a79cf743639b2746a75b09055831213e7edb6b14d805cd15271c401731964ad483a8cac00bc6fb3696a46ca94ef6ad099968d036358880154a3a81a45bbc7c60679bedaeb2dceaf94a370e7f4854270f2ccdcdaeac678a572c5f854749e68e5dd41fd9603bd9995a290d6ae4a90745cd1625337361f4e500824b1c4814822becf2676c5ba51552f0b5735a7ef3c34f757f75827a614482f0360b86c6d8db844566c904cd43af572805fc2cee6580df5d0d6a3200e2d89a4de75bca4e5894630596bd5ca665b63e2bd87e767d6bc6b430b3635d54264207e604cd54215aa4a1e50366568ee93aeb9712a2c877eaa825e4186b91cb294d1bc62a95b3cffe423338b4b57ecde79f5cd478aee4c094341db02a5be1eefda77ecf1c79f3df1c444297ced1bdedaac6fe7ce7113e744548acb34d530ccd168ac08bc1f802c40500fa842adc213b1317500c6d6bd5b772e8f462acef9d15fd9959c5802606ba5ee7aba7fff757b2ed93377fae49e34b9e1cef71cb8e1a6f9a7ee75bda786e9d5261d986d070e6fbbe688a94ef596e64776edbbfece77b58e1f7de917bfa8d44a004a37ec0eafdba500ab8736d8f4bceb1853212eb17aa8b34c9162eb93511b4c683b95c287811dbd7ad7dc89a5a19da91dcd6cf1d174e9d4f5af3de4fc95da3abef2d806dcd9f3d9005078edbcb0f4689bda2b37bdf58e28acb47ef27d9585f1edf5244901d0c11d8d46cd790f2222b5e1a4cb97154a009101855664a0ea886322e38b9616b12e6fa433adda35fbb0375ed8b99569685ecc932c86c46140201d64f35b5f0300e7bd3506d0dccd038b95122004875c04f4f299a6691e9723054e9f59226a7b276c4aaa02a8480a80d9d488acf71b80a8fad91fde5fb351fda74b2fbe38cb8679d72800a84ae6903aa4992689a689bafc7c36005ce18a62338d81779a654812a409920cb953bf39999888e8d4e997e491330a2fbe4b141105e27baab9b10d16df5175c60cab8edac2b71e2c0761b59527f71e5b6f77ed25a3aa80134d0b4a1d92825247a9a7dcc3bd82101bd3eef64404a2c83d651ec3f999a75c24770054d518eef606bdef3d1f9f6e5b33aef0ae68a9e66caa44a177ebcca6c61c0fa349fb54cb3f791c80135f3db136736ca6548a8abc20279a7be49e524fa943ee5108bc40a1aa2003c01aa38ab5f50e9c5021947bca1ca58e3287c26bee209a66795c2ecd1c3f3b79a2a3fdd4a76483718557290030978c69b2f8fef0f0a470cf7df4530d0ebd483f4bacd34bfa3b466abbbadd3e045a782a843287cc93f3f00ad14192b43bbdfe2001874551a86a7f9042045eb0c9c9a310f2a24e20daeda7974cbdbefa6c8f0b8972b7f0e48f890263aac338a1eabdef30718988bcebcc7ef1eb8d7656bff57a37561355af7ae56dbfbe2dbcb6b7da012022c3cf8d08e77215c4e5529a17adb5f59595e5f5764f44c6461b5b02b0f54315220ac06766dbf48dbb275f93bb3c30f6f4a7ff21597b89b94a14a9642203e6987aedfb4552e6129b0a14d972ebf137ff7e3719ec688c4fbceeb0cfb31395857db75f4b992b93610f103430888c962ca2574b67734fa943e6281788c2b20f2881d7923d79cf53d7efb8e5b12f7f718c6dee3d07263ab8e7e0673e622b15d56c18f92d869991a90230b6b9f8f5af65791eb035cc49d22f952bd1a98d6e9ed582c08182c00080650d18965f85cdb9b7a44699a000932755e6ee208967ba6e34a9962b1bebad4ab379f0efffa6b4a78ea050754421730c8205193aa7fdc9fcdce9afff60fcaeb7d87f7f32cff38d271e6dc6d506a3f5d26af5f29d4e60030b02981098dee932cdd79c0aa7b634ee8bc528293cc7ce58a23debb56d292c93aa3215de81cddaf1e5d1c5feecb7bfd634b62ba2cdf2e277eedbf7c71f10d3a1cd429e01b22a996a415c220ad2d5b3377de3b36865c7befbf8204f9daaaa929079e84cffb2c94ab924213333984054dd9bb924c6d11154cbdd4558500ce84a121e5cb3977a20801705bcaae4bed71b981f9d218517ef88768e8cb7bb894e94f37c2dac54553de04512105b36b1f8bef75d6b9bd52b2f63e6eed133892bec7507aacf9d75e20363aba7da0bf7fdfc923b0eb231e5ad8c8260af593707da321fa3650084e39eb70f283ca74f8601e4699624d9d9ef3cbdfd743bf53e6cd6fb9dcefe0fbefff26b0fd0a898c8810c01de75540b63c6a8bb71afaa37768c888942ef7bed477e6a2a93d4f5c73ef4f112ecfaa0db2855d89ac5c3db76bcf1ea7a2d8ec28bf6f62e4096e5ed6e7fe17bcf561e3ce39c2bd930bef5ba7d1ffe8db03911c4d32aa92b5600655301e07d1beaa9df7d443563ae0030764c2573c532a0f94c3f397ae6b13ffb441c44a371adf0de189e7ffdd4f41bae1a1f6d04c1ab6442177e6d45d15a6baf7cf799c99fb596fb9d5defbe63e49a2b27dff4260d7ade75d8546c3039e4441410072a297134cca9fd9090776bc68e9a60c2172be1eeca4bf7cd8cdf70f5f8ce1da5c9d113df7f68742d0d5692b58d6e51b8e96de3f6bfec3a3ae716965ab32f2d5dfe746bec3db7eedcbf3bd87b596def4eb0b3661c80771d876563ea6c361b3daa4e5c6a99639181776d3635f17d00c68e5230e98ae53defbf833ff02e63eb6b278ef2bf7c0736e24a696a62646da37bf2ccfc9eddd3c145caeabc284ecfcc33f3f8684398e2037baa472e675353d96c665abbc9091063475572ef3744126347cc473efc9baa059b3273c81caa3a9181b10de24865a09a2527e766feeedf4a2fae8551456ebf62db9e89c05a11393bb75c2a85a5e8c2fbb4d1e9be787aaed1a86d9f1c2342657c226a56f356bff7e44cb1dc2defde2e9a80d8da26e0c5f7013f2ca255328252aff343d5c298c6d0379b7d6a89963ef56df7f4b1acb59e2db5a773182050ea44d4bfebaaca5bf6e7de0f927471798d89c6461bd54a1940af9facae6d18e6e96d13e572c444699a77286a7cf585f85b473d54818d03db6a775e5fbe6ad7e82d3719ae9d6b41c74456242110f5da0fa8ba737dea327365b9b33cff8fdfaddd7d4fddc32a525247a8797842a494135a07274abf7b831d8fbd4851b8fe20cd8b02401406b54a1c04565587859b6fa74b9f7978efcfdb1e1a28f5591346dd6331369377ffd6f8afddc61cbb629508008b2400a8dbfe814a666c9d28129f1c5fafbfe4a7c79b0dca327de087cdbb3f3739b3a0404e6a0101ac9201d66a36b9eb35d55bf7f22f05102f02052b068fccf2977f3ed1ca1cd4821c90b15684e6769457de7bb0363676c59db705619da804b86195481450bff390481f20631bf3ede2f96cff5873646b75ed74cc273fbdf39bf7960405690108c12a42a5b6d58d43538df75d174cbcdc8710d13ccffd332bd9378e8d9eea540443be1e0a90019646c2e06347ecf67aaf3f58cb71edad6f0ca30940bc6f8bef1b3b42dd8dfb54bd0dc69cd07fcc8d6c9bda054081bc28a27362a39ffbfcf6cf7da99e5fd8c3ef319290340eb412682584214d1dfa79b49ac682487041bdbddcb0fc919ba3bda3c3619ae5cb190e1d7983b11580860244fdee232a199bca53f3a0916b8ce1618f5e550769568e426b0c0079e0c191bff8c4e4ca06f00a330a78404887015201408d92c18558a91a7cf8a6d215af685dcc2dae4e1fba7172c765445625230e597c472451d5997e79d8bf2122e77c3fcd14e8266992e500f8d6231bdffcf2e9db7f7560d0e597ab08022c6075b3b0189ee6169b8ce1088eb0b4a3e2fef47078f9f8052cb74f8e9d3df6fc308156cdbc5ba77ef731953e80679f7e2175d42dedcc6b97569bdb1ad5b8dd1fe4850330dea85bc39b77e41bf7d067bf70693bb51776572f44c2ba62115643b9e5d2ca9bf6765c1e05368e4b174c9b9d5f3df8e6bb88072a036347ff130dfe20e4233676dc0000000049454e44ae426082),
(2, 'Fernando Bengui', 'A00345', 'Administrativo', '01112', 'Masculino', '0036474634UE034', '2022-05-24', '1993-05-02', '934763543', NULL, NULL, NULL, NULL, 'Disponível', NULL),
(3, 'Pedro Simão', 'A00342', 'Administrativo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `func_departamentos`
--

CREATE TABLE `func_departamentos` (
  `id_fdep` int(11) NOT NULL,
  `id_dep` int(11) DEFAULT NULL,
  `cargo` varchar(50) DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `id_func` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `func_departamentos`
--

INSERT INTO `func_departamentos` (`id_fdep`, `id_dep`, `cargo`, `data_inicio`, `id_func`) VALUES
(1, 3, 'Secretário geral', '2022-05-28', 2),
(2, 2, 'Cordenador de curso', '2022-05-28', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `informacoes`
--

CREATE TABLE `informacoes` (
  `id_info` int(11) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `realizacao` varchar(50) DEFAULT NULL,
  `data_inicio` datetime DEFAULT NULL,
  `data_fim` datetime DEFAULT NULL,
  `local_info` varchar(50) DEFAULT NULL,
  `duracao` varchar(50) DEFAULT NULL,
  `destino` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `informacoes`
--

INSERT INTO `informacoes` (`id_info`, `descricao`, `realizacao`, `data_inicio`, `data_fim`, `local_info`, `duracao`, `destino`) VALUES
(1, 'Reunião de carácter organizacional', 'Sub. Dir. Pedagógica', '2022-05-28 10:00:00', '2022-05-28 11:00:00', 'Sala nº 02', '1 horas', 'Professores'),
(2, 'Reunião de balanço', 'Dep. de finanças', '2022-06-02 00:00:00', '2022-06-02 00:00:00', 'Sala de reuniões', '2 horas', 'Funcionários do dep. de finanças');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_entrada`
--

CREATE TABLE `itens_entrada` (
  `id_item_ent` int(11) NOT NULL,
  `id_pat` int(11) DEFAULT NULL,
  `qtde_ped` int(11) DEFAULT NULL,
  `valor` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_pedido`
--

CREATE TABLE `itens_pedido` (
  `id_item` int(11) NOT NULL,
  `id_pat` int(11) DEFAULT NULL,
  `qtde_ped` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `leitores`
--

CREATE TABLE `leitores` (
  `id_leitor` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `ident` varchar(50) DEFAULT NULL,
  `genero` varchar(50) DEFAULT NULL,
  `rua` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `escola` varchar(50) NOT NULL,
  `num_mat` varchar(50) NOT NULL,
  `curso` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `leitores`
--

INSERT INTO `leitores` (`id_leitor`, `nome`, `ident`, `genero`, `rua`, `bairro`, `cidade`, `escola`, `num_mat`, `curso`) VALUES
(1, 'Félix José', '006476374UE034', 'Masculino', 'A', 'Popular', 'Uíge', 'Garssu', '01243', 'Informática de Gestão');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros`
--

CREATE TABLE `livros` (
  `id_livro` int(11) NOT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `autor` varchar(50) DEFAULT NULL,
  `data_pub` date DEFAULT NULL,
  `edicao` varchar(50) DEFAULT NULL,
  `editora` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `livros`
--

INSERT INTO `livros` (`id_livro`, `titulo`, `autor`, `data_pub`, `edicao`, `editora`) VALUES
(1, 'Técnicas de Linguagem de Programação', 'Elmo Costa, Engº', '2022-06-17', '1º Ed.', 'Média File');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livros_pedido`
--

CREATE TABLE `livros_pedido` (
  `item` int(11) NOT NULL,
  `id_ped` int(11) DEFAULT NULL,
  `id_livro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `livros_pedido`
--

INSERT INTO `livros_pedido` (`item`, `id_ped`, `id_livro`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `matriculas`
--

CREATE TABLE `matriculas` (
  `id_mat` int(11) NOT NULL,
  `data_reg` datetime DEFAULT NULL,
  `id_ano` int(11) DEFAULT NULL,
  `id_proc` int(11) DEFAULT NULL,
  `id_curso` int(11) DEFAULT NULL,
  `id_turma` int(11) DEFAULT NULL,
  `periodo` varchar(50) DEFAULT NULL,
  `situacao` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `matriculas`
--

INSERT INTO `matriculas` (`id_mat`, `data_reg`, `id_ano`, `id_proc`, `id_curso`, `id_turma`, `periodo`, `situacao`) VALUES
(1, '2022-04-21 10:52:22', 1, 1, 1, 1, 'Manhã', '1ª Vez'),
(2, '2022-04-21 11:01:33', 1, 3, 2, 2, 'Manhã', '1ª Vez');

-- --------------------------------------------------------

--
-- Estrutura da tabela `movimentacoes`
--

CREATE TABLE `movimentacoes` (
  `id_mov` int(11) NOT NULL,
  `data_reg` date DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `valor` decimal(10,0) DEFAULT NULL,
  `observacao` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `movimentacoes`
--

INSERT INTO `movimentacoes` (`id_mov`, `data_reg`, `categoria`, `tipo`, `valor`, `observacao`) VALUES
(2, '2022-05-10', 'Despesa', 'Custo com pessoal', '15000', 'Pago'),
(3, '2022-05-25', 'Despesa', 'Compra de Resma A4', '15000', NULL),
(4, '2022-05-09', 'Receita', 'Outras receitas', '2000', NULL),
(5, '2022-06-02', 'Despesa', 'Compra de Resma A4', '15000', NULL),
(6, '2022-06-02', 'Despesa', 'Compra de Resma A4', '15000', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamentos_propinas`
--

CREATE TABLE `pagamentos_propinas` (
  `id_pagprop` int(11) NOT NULL,
  `id_prop` int(11) DEFAULT NULL,
  `id_aluno` int(11) DEFAULT NULL,
  `id_func` int(11) DEFAULT NULL,
  `id_turma` int(11) DEFAULT NULL,
  `data_reg` datetime DEFAULT NULL,
  `mes` varchar(50) DEFAULT NULL,
  `valor_pago` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pagamentos_propinas`
--

INSERT INTO `pagamentos_propinas` (`id_pagprop`, `id_prop`, `id_aluno`, `id_func`, `id_turma`, `data_reg`, `mes`, `valor_pago`) VALUES
(1, 1, 1, 1, 3, '2022-05-24 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `patrimonios`
--

CREATE TABLE `patrimonios` (
  `id_pat` int(11) NOT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `fabricante` varchar(50) NOT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `qtde` int(11) NOT NULL,
  `valor` decimal(10,0) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `patrimonios`
--

INSERT INTO `patrimonios` (`id_pat`, `descricao`, `marca`, `fabricante`, `categoria`, `qtde`, `valor`, `estado`) VALUES
(1, 'Computador', 'Hp', 'Hp', 'Electrónicos', 5, '250000', 'Funcional');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id_ped` int(11) NOT NULL,
  `data_reg` date DEFAULT NULL,
  `id_dep` int(11) DEFAULT NULL,
  `id_func` int(11) DEFAULT NULL,
  `id_solicitante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedidos_livro`
--

CREATE TABLE `pedidos_livro` (
  `id_ped` int(11) NOT NULL,
  `data_reg` datetime DEFAULT NULL,
  `id_leitor` int(11) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `id_func` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pedidos_livro`
--

INSERT INTO `pedidos_livro` (`id_ped`, `data_reg`, `id_leitor`, `estado`, `id_func`) VALUES
(1, '2022-05-24 00:00:00', 1, 'Entregue', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `processos`
--

CREATE TABLE `processos` (
  `id_proc` int(11) NOT NULL,
  `id_aluno` int(11) DEFAULT NULL,
  `num_processo` varchar(50) DEFAULT NULL,
  `data_ingresso` date DEFAULT NULL,
  `situacao` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `processos`
--

INSERT INTO `processos` (`id_proc`, `id_aluno`, `num_processo`, `data_ingresso`, `situacao`) VALUES
(1, 1, 'P0001', '2021-08-05', 'Matriculado'),
(3, 2, 'P002', '2021-09-01', 'Matriculado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professores`
--

CREATE TABLE `professores` (
  `id_prof` int(11) NOT NULL,
  `id_func` int(11) DEFAULT NULL,
  `inicio_funcao` date DEFAULT NULL,
  `nif` varchar(50) DEFAULT NULL,
  `categoria` varchar(50) DEFAULT NULL,
  `nivel_acad` varchar(50) DEFAULT NULL,
  `especialidade` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `professores`
--

INSERT INTO `professores` (`id_prof`, `id_func`, `inicio_funcao`, `nif`, `categoria`, `nivel_acad`, `especialidade`) VALUES
(1, 1, '2017-02-01', '', '6º Grau', 'Licenciatura', 'Matemática');

-- --------------------------------------------------------

--
-- Estrutura da tabela `propinas`
--

CREATE TABLE `propinas` (
  `id_prop` int(11) NOT NULL,
  `id_classe` int(11) DEFAULT NULL,
  `valor` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `propinas`
--

INSERT INTO `propinas` (`id_prop`, `id_classe`, `valor`) VALUES
(1, 1, '6500'),
(2, 2, '7000');

-- --------------------------------------------------------

--
-- Estrutura da tabela `saidas`
--

CREATE TABLE `saidas` (
  `id_saida` int(11) NOT NULL,
  `data_reg` date DEFAULT NULL,
  `destino` varchar(50) DEFAULT NULL,
  `necessidade` varchar(50) DEFAULT NULL,
  `valor` decimal(10,0) DEFAULT NULL,
  `observacao` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `saidas`
--

INSERT INTO `saidas` (`id_saida`, `data_reg`, `destino`, `necessidade`, `valor`, `observacao`) VALUES
(2, '2022-06-02', 'Secretaria', 'Compra de Resma A4', '15000', 'Pago');

-- --------------------------------------------------------

--
-- Estrutura da tabela `salas`
--

CREATE TABLE `salas` (
  `id_sala` int(11) NOT NULL,
  `sala` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `salas`
--

INSERT INTO `salas` (`id_sala`, `sala`) VALUES
(1, '01'),
(2, '02'),
(3, '03'),
(4, '04');

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacoes_doc`
--

CREATE TABLE `solicitacoes_doc` (
  `id_sol` int(11) NOT NULL,
  `id_aluno` int(11) DEFAULT NULL,
  `data_reg` datetime DEFAULT NULL,
  `id_tipodoc` int(11) DEFAULT NULL,
  `num_oficio` varchar(50) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `solicitacoes_doc`
--

INSERT INTO `solicitacoes_doc` (`id_sol`, `id_aluno`, `data_reg`, `id_tipodoc`, `num_oficio`, `estado`) VALUES
(1, 1, '2022-05-31 00:00:00', 2, 'F03773', 'Em espera'),
(2, NULL, '2022-05-31 00:00:00', 2, 'N8474', 'Em espera'),
(3, 2, '0000-00-00 00:00:00', 2, 'N8476', 'Em espera'),
(4, NULL, NULL, NULL, NULL, NULL),
(5, NULL, NULL, NULL, NULL, NULL),
(6, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_documentos`
--

CREATE TABLE `tipo_documentos` (
  `id_tipodoc` int(11) NOT NULL,
  `tipodoc` varchar(50) DEFAULT NULL,
  `valor` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tipo_documentos`
--

INSERT INTO `tipo_documentos` (`id_tipodoc`, `tipodoc`, `valor`) VALUES
(1, 'Declaração de frequência', '1000'),
(2, 'Justificativo de falta', '500'),
(4, 'Declaração com notas', '2000');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_pagamentos`
--

CREATE TABLE `tipo_pagamentos` (
  `id_tipopag` int(11) NOT NULL,
  `tipopag` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tipo_pagamentos`
--

INSERT INTO `tipo_pagamentos` (`id_tipopag`, `tipopag`) VALUES
(1, 'Dinheiro'),
(2, 'TPA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmas`
--

CREATE TABLE `turmas` (
  `id_turma` int(11) NOT NULL,
  `id_curso` int(11) DEFAULT NULL,
  `turma` varchar(50) DEFAULT NULL,
  `id_classe` int(11) DEFAULT NULL,
  `id_sala` int(11) DEFAULT NULL,
  `periodo` varchar(50) DEFAULT NULL,
  `vagas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `turmas`
--

INSERT INTO `turmas` (`id_turma`, `id_curso`, `turma`, `id_classe`, `id_sala`, `periodo`, `vagas`) VALUES
(1, 1, 'IG1', 1, 1, 'Manhã', 45),
(2, 2, 'CG1', 1, 2, 'Manhã', 45),
(3, 1, 'IG2', 1, 2, 'Manhã', 36),
(4, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id_aluno`);

--
-- Indexes for table `ano_lectivos`
--
ALTER TABLE `ano_lectivos`
  ADD PRIMARY KEY (`id_ano`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id_classe`);

--
-- Indexes for table `contas`
--
ALTER TABLE `contas`
  ADD PRIMARY KEY (`id_conta`),
  ADD KEY `id_tipopag` (`id_tipopag`);

--
-- Indexes for table `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id_curso`);

--
-- Indexes for table `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id_dep`);

--
-- Indexes for table `disciplinas`
--
ALTER TABLE `disciplinas`
  ADD PRIMARY KEY (`id_disc`);

--
-- Indexes for table `discplinas_prof`
--
ALTER TABLE `discplinas_prof`
  ADD PRIMARY KEY (`id_discprof`),
  ADD KEY `id_disc` (`id_disc`),
  ADD KEY `id_turma` (`id_turma`),
  ADD KEY `id_prof` (`id_prof`);

--
-- Indexes for table `entradas`
--
ALTER TABLE `entradas`
  ADD PRIMARY KEY (`id_ent`),
  ADD KEY `id_tipopag` (`id_tipopag`);

--
-- Indexes for table `entrada_patrimonios`
--
ALTER TABLE `entrada_patrimonios`
  ADD PRIMARY KEY (`id_ent`),
  ADD KEY `id_pat` (`id_pat`);

--
-- Indexes for table `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id_func`);

--
-- Indexes for table `func_departamentos`
--
ALTER TABLE `func_departamentos`
  ADD PRIMARY KEY (`id_fdep`),
  ADD KEY `id_func` (`id_func`),
  ADD KEY `id_dep` (`id_dep`);

--
-- Indexes for table `informacoes`
--
ALTER TABLE `informacoes`
  ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `itens_entrada`
--
ALTER TABLE `itens_entrada`
  ADD PRIMARY KEY (`id_item_ent`),
  ADD KEY `id_pat` (`id_pat`);

--
-- Indexes for table `itens_pedido`
--
ALTER TABLE `itens_pedido`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `id_pat` (`id_pat`);

--
-- Indexes for table `leitores`
--
ALTER TABLE `leitores`
  ADD PRIMARY KEY (`id_leitor`);

--
-- Indexes for table `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id_livro`);

--
-- Indexes for table `livros_pedido`
--
ALTER TABLE `livros_pedido`
  ADD PRIMARY KEY (`item`),
  ADD KEY `id_ped` (`id_ped`),
  ADD KEY `id_livro` (`id_livro`);

--
-- Indexes for table `matriculas`
--
ALTER TABLE `matriculas`
  ADD PRIMARY KEY (`id_mat`),
  ADD KEY `id_ano` (`id_ano`),
  ADD KEY `id_proc` (`id_proc`),
  ADD KEY `id_curso` (`id_curso`),
  ADD KEY `id_turma` (`id_turma`);

--
-- Indexes for table `movimentacoes`
--
ALTER TABLE `movimentacoes`
  ADD PRIMARY KEY (`id_mov`);

--
-- Indexes for table `pagamentos_propinas`
--
ALTER TABLE `pagamentos_propinas`
  ADD PRIMARY KEY (`id_pagprop`),
  ADD KEY `id_prop` (`id_prop`),
  ADD KEY `id_aluno` (`id_aluno`),
  ADD KEY `id_func` (`id_func`),
  ADD KEY `id_turma` (`id_turma`);

--
-- Indexes for table `patrimonios`
--
ALTER TABLE `patrimonios`
  ADD PRIMARY KEY (`id_pat`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_ped`),
  ADD KEY `id_dep` (`id_dep`),
  ADD KEY `id_func` (`id_func`),
  ADD KEY `id_solicitante` (`id_solicitante`);

--
-- Indexes for table `pedidos_livro`
--
ALTER TABLE `pedidos_livro`
  ADD PRIMARY KEY (`id_ped`),
  ADD KEY `id_leitor` (`id_leitor`),
  ADD KEY `id_func` (`id_func`);

--
-- Indexes for table `processos`
--
ALTER TABLE `processos`
  ADD PRIMARY KEY (`id_proc`),
  ADD UNIQUE KEY `id_aluno` (`id_aluno`);

--
-- Indexes for table `professores`
--
ALTER TABLE `professores`
  ADD PRIMARY KEY (`id_prof`),
  ADD KEY `id_func` (`id_func`);

--
-- Indexes for table `propinas`
--
ALTER TABLE `propinas`
  ADD PRIMARY KEY (`id_prop`),
  ADD KEY `id_classe` (`id_classe`);

--
-- Indexes for table `saidas`
--
ALTER TABLE `saidas`
  ADD PRIMARY KEY (`id_saida`);

--
-- Indexes for table `salas`
--
ALTER TABLE `salas`
  ADD PRIMARY KEY (`id_sala`);

--
-- Indexes for table `solicitacoes_doc`
--
ALTER TABLE `solicitacoes_doc`
  ADD PRIMARY KEY (`id_sol`),
  ADD KEY `id_tipodoc` (`id_tipodoc`),
  ADD KEY `id_aluno` (`id_aluno`);

--
-- Indexes for table `tipo_documentos`
--
ALTER TABLE `tipo_documentos`
  ADD PRIMARY KEY (`id_tipodoc`);

--
-- Indexes for table `tipo_pagamentos`
--
ALTER TABLE `tipo_pagamentos`
  ADD PRIMARY KEY (`id_tipopag`);

--
-- Indexes for table `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`id_turma`),
  ADD KEY `id_curso` (`id_curso`),
  ADD KEY `id_classe` (`id_classe`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ano_lectivos`
--
ALTER TABLE `ano_lectivos`
  MODIFY `id_ano` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id_classe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contas`
--
ALTER TABLE `contas`
  MODIFY `id_conta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id_dep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `disciplinas`
--
ALTER TABLE `disciplinas`
  MODIFY `id_disc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `discplinas_prof`
--
ALTER TABLE `discplinas_prof`
  MODIFY `id_discprof` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `entradas`
--
ALTER TABLE `entradas`
  MODIFY `id_ent` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `entrada_patrimonios`
--
ALTER TABLE `entrada_patrimonios`
  MODIFY `id_ent` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id_func` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `func_departamentos`
--
ALTER TABLE `func_departamentos`
  MODIFY `id_fdep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `informacoes`
--
ALTER TABLE `informacoes`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `itens_entrada`
--
ALTER TABLE `itens_entrada`
  MODIFY `id_item_ent` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `itens_pedido`
--
ALTER TABLE `itens_pedido`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leitores`
--
ALTER TABLE `leitores`
  MODIFY `id_leitor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `livros`
--
ALTER TABLE `livros`
  MODIFY `id_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `livros_pedido`
--
ALTER TABLE `livros_pedido`
  MODIFY `item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `matriculas`
--
ALTER TABLE `matriculas`
  MODIFY `id_mat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `movimentacoes`
--
ALTER TABLE `movimentacoes`
  MODIFY `id_mov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pagamentos_propinas`
--
ALTER TABLE `pagamentos_propinas`
  MODIFY `id_pagprop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patrimonios`
--
ALTER TABLE `patrimonios`
  MODIFY `id_pat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_ped` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pedidos_livro`
--
ALTER TABLE `pedidos_livro`
  MODIFY `id_ped` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `processos`
--
ALTER TABLE `processos`
  MODIFY `id_proc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `professores`
--
ALTER TABLE `professores`
  MODIFY `id_prof` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `propinas`
--
ALTER TABLE `propinas`
  MODIFY `id_prop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `saidas`
--
ALTER TABLE `saidas`
  MODIFY `id_saida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `salas`
--
ALTER TABLE `salas`
  MODIFY `id_sala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `solicitacoes_doc`
--
ALTER TABLE `solicitacoes_doc`
  MODIFY `id_sol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tipo_documentos`
--
ALTER TABLE `tipo_documentos`
  MODIFY `id_tipodoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tipo_pagamentos`
--
ALTER TABLE `tipo_pagamentos`
  MODIFY `id_tipopag` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `turmas`
--
ALTER TABLE `turmas`
  MODIFY `id_turma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `contas`
--
ALTER TABLE `contas`
  ADD CONSTRAINT `contas_ibfk_1` FOREIGN KEY (`id_tipopag`) REFERENCES `tipo_pagamentos` (`id_tipopag`);

--
-- Limitadores para a tabela `discplinas_prof`
--
ALTER TABLE `discplinas_prof`
  ADD CONSTRAINT `discplinas_prof_ibfk_1` FOREIGN KEY (`id_disc`) REFERENCES `disciplinas` (`id_disc`),
  ADD CONSTRAINT `discplinas_prof_ibfk_2` FOREIGN KEY (`id_turma`) REFERENCES `turmas` (`id_turma`),
  ADD CONSTRAINT `discplinas_prof_ibfk_3` FOREIGN KEY (`id_prof`) REFERENCES `professores` (`id_prof`);

--
-- Limitadores para a tabela `entradas`
--
ALTER TABLE `entradas`
  ADD CONSTRAINT `entradas_ibfk_1` FOREIGN KEY (`id_tipopag`) REFERENCES `tipo_pagamentos` (`id_tipopag`);

--
-- Limitadores para a tabela `func_departamentos`
--
ALTER TABLE `func_departamentos`
  ADD CONSTRAINT `func_departamentos_ibfk_1` FOREIGN KEY (`id_func`) REFERENCES `funcionarios` (`id_func`),
  ADD CONSTRAINT `func_departamentos_ibfk_2` FOREIGN KEY (`id_dep`) REFERENCES `departamentos` (`id_dep`);

--
-- Limitadores para a tabela `itens_entrada`
--
ALTER TABLE `itens_entrada`
  ADD CONSTRAINT `itens_entrada_ibfk_1` FOREIGN KEY (`id_pat`) REFERENCES `patrimonios` (`id_pat`);

--
-- Limitadores para a tabela `itens_pedido`
--
ALTER TABLE `itens_pedido`
  ADD CONSTRAINT `itens_pedido_ibfk_1` FOREIGN KEY (`id_pat`) REFERENCES `patrimonios` (`id_pat`);

--
-- Limitadores para a tabela `livros_pedido`
--
ALTER TABLE `livros_pedido`
  ADD CONSTRAINT `livros_pedido_ibfk_1` FOREIGN KEY (`id_ped`) REFERENCES `pedidos_livro` (`id_ped`),
  ADD CONSTRAINT `livros_pedido_ibfk_2` FOREIGN KEY (`id_livro`) REFERENCES `livros` (`id_livro`);

--
-- Limitadores para a tabela `matriculas`
--
ALTER TABLE `matriculas`
  ADD CONSTRAINT `matriculas_ibfk_1` FOREIGN KEY (`id_ano`) REFERENCES `ano_lectivos` (`id_ano`),
  ADD CONSTRAINT `matriculas_ibfk_2` FOREIGN KEY (`id_proc`) REFERENCES `processos` (`id_proc`),
  ADD CONSTRAINT `matriculas_ibfk_3` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`),
  ADD CONSTRAINT `matriculas_ibfk_4` FOREIGN KEY (`id_turma`) REFERENCES `turmas` (`id_turma`);

--
-- Limitadores para a tabela `pagamentos_propinas`
--
ALTER TABLE `pagamentos_propinas`
  ADD CONSTRAINT `pagamentos_propinas_ibfk_1` FOREIGN KEY (`id_prop`) REFERENCES `propinas` (`id_prop`),
  ADD CONSTRAINT `pagamentos_propinas_ibfk_2` FOREIGN KEY (`id_aluno`) REFERENCES `alunos` (`id_aluno`),
  ADD CONSTRAINT `pagamentos_propinas_ibfk_3` FOREIGN KEY (`id_func`) REFERENCES `funcionarios` (`id_func`),
  ADD CONSTRAINT `pagamentos_propinas_ibfk_4` FOREIGN KEY (`id_turma`) REFERENCES `turmas` (`id_turma`);

--
-- Limitadores para a tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`id_dep`) REFERENCES `departamentos` (`id_dep`),
  ADD CONSTRAINT `pedidos_ibfk_3` FOREIGN KEY (`id_func`) REFERENCES `funcionarios` (`id_func`),
  ADD CONSTRAINT `pedidos_ibfk_4` FOREIGN KEY (`id_solicitante`) REFERENCES `func_departamentos` (`id_func`);

--
-- Limitadores para a tabela `pedidos_livro`
--
ALTER TABLE `pedidos_livro`
  ADD CONSTRAINT `pedidos_livro_ibfk_1` FOREIGN KEY (`id_leitor`) REFERENCES `leitores` (`id_leitor`),
  ADD CONSTRAINT `pedidos_livro_ibfk_2` FOREIGN KEY (`id_func`) REFERENCES `funcionarios` (`id_func`);

--
-- Limitadores para a tabela `processos`
--
ALTER TABLE `processos`
  ADD CONSTRAINT `processos_ibfk_1` FOREIGN KEY (`id_aluno`) REFERENCES `alunos` (`id_aluno`);

--
-- Limitadores para a tabela `professores`
--
ALTER TABLE `professores`
  ADD CONSTRAINT `professores_ibfk_1` FOREIGN KEY (`id_func`) REFERENCES `funcionarios` (`id_func`);

--
-- Limitadores para a tabela `propinas`
--
ALTER TABLE `propinas`
  ADD CONSTRAINT `propinas_ibfk_1` FOREIGN KEY (`id_classe`) REFERENCES `classes` (`id_classe`);

--
-- Limitadores para a tabela `solicitacoes_doc`
--
ALTER TABLE `solicitacoes_doc`
  ADD CONSTRAINT `solicitacoes_doc_ibfk_1` FOREIGN KEY (`id_tipodoc`) REFERENCES `tipo_documentos` (`id_tipodoc`),
  ADD CONSTRAINT `solicitacoes_doc_ibfk_2` FOREIGN KEY (`id_aluno`) REFERENCES `alunos` (`id_aluno`);

--
-- Limitadores para a tabela `turmas`
--
ALTER TABLE `turmas`
  ADD CONSTRAINT `turmas_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id_curso`),
  ADD CONSTRAINT `turmas_ibfk_2` FOREIGN KEY (`id_classe`) REFERENCES `classes` (`id_classe`),
  ADD CONSTRAINT `turmas_ibfk_3` FOREIGN KEY (`id_classe`) REFERENCES `salas` (`id_sala`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
