-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Bulan Mei 2024 pada 04.26
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lavanderiadb`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(50) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `stok_awal` int(11) DEFAULT 0,
  `harga` int(11) NOT NULL,
  `gambar` longblob NOT NULL,
  `id_jenis` int(11) DEFAULT NULL,
  `id_satuan` int(11) DEFAULT NULL,
  `id_lokasi` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `stok_awal`, `harga`, `gambar`, `id_jenis`, `id_satuan`, `id_lokasi`) VALUES
('BRG-20240528005400', 'pewawad banh', 0, 2147483647, 0xffd8ffe000104a46494600010100000100010000ffdb008400090607080706090807080a0a090b0d160f0d0c0c0d1b14151016201d2222201d1f1f2428342c242631271f1f2d3d2d3135373a3a3a232b3f443f384334393a37010a0a0a0d0c0d1a0f0f1a37251f253737373737373737373737373737373737373737373737373737373737373737373737373737373737373737373737373737ffc0001108008500c803012200021101031101ffc4001c0000020203010100000000000000000000000201030405060708ffc4003e1000010401030204030505040b0000000001000203110405122131410613516122819107325271a1142342b1d1157292c116243334436283c2d2e1f0ffc400190100030101010000000000000000000000000102030405ffc4002111000202020203000300000000000000000001021103122131134151044261ffda000c03010002110311003f00d00936f45632677ad2c6522fd57ad479f66679e53b724770560590536e4b51ec67b658dfc1a526369fba696007261239bd094b51ec66d16f176a4382c764ae23e24177296a3d8cb63e8ac86b9ae1cf2b5ad715911bdddd4b45265c6af851b394a0a6168019ace12bc14a5e52ef368a0b0702ab23856efa4a5c0a605546d291cab1c42addca6224526209af4f45480095905c1a02010f131ace50f959ecb1a5909fba56396b8f3696b61b19e660d1c054f9ae938aa2b1dad77ba7b2de8693d45633e42dfcd0b1e57389eb6109a889c8b031a4a71003d0a90d0de83953653b109e47ba47454b200251e4df7458518db68a7ecaef2691e49458a8a6d3c6371e5582323b276c249e9f449b4349922268ec536c7122ba2c864240e4ab034051668915c7171f1754db2d49291cea4862b994aa784cf7df7559e7d55225b1689be556e24774e6bdd56f6f6b4c96c42f3eaa0bca82d77a283615d13c921c87c8484b68e3ba282c52ebea80e4ff00077052ba90224bf8485dee8a51b51404a114a103365e49b47944765903712006924f6a5d1e9fe0ed532d9e6641870d87a79a6ddfe11fd560f25766aa17d1caf96ef452d61eebb9d0fc2d978dab3a0d5a0d2737008244d1492c7334f60584907e4b7f91e11d0656fc18ee88f62c95c2beb6166ff22269e16796360bee9863b41eabb9caf00b5cddfa767fe4d9875f98fe8b9ed43c3baa69c09c8c57960eb245f1b7f454b22974c4e0d7a35418d1d94d01d02905beb69b7347042a115dd0e1aa3713d9397848e7a1098a5c94907aa87d91d154e055a44b60f009e3f44be5840051ca6490611dad56e8dc3a2b4eff00551b88ea8e445767bd23e13d42b0c83b848e734f655c8842d6fb2acb137168b3d9022b2d2141055db9de83e8a0977e108e40a79f442b1ce27aa54c05429a4200d9798eecf00ac883c4dad69543cd7666303fc46dc3e6b5b68700f6398f276b85116b29e1525c9a47338b3afc0fb49c595a04ed732fbf50b6f178cf02703664869ea3ff008af26c7c4196e98cf29918081096bba340a06e85febd1449a5ccce71e50e1e8ee0ae27827568eb5963747b064f894c81a2224c601b7c6ff8b751aaf6baf5fc965e178ab74804a5bc9fe2155d4f51ec40aaec795e1dfb565e111e60919cf53d16cb13c432020cbb5e7a6e2391f350a970d15cf68f68ccc6d0b550f39d8c2096e8bef69078fe21c77fd0fa2d16a3e0290073b4bcd1271f0c730a3fe21fd172785e2587e21fb4490b9f575b79a374491641efeaba4d1b5ec88b2d84cd0cd13c90436d85b649363a11c9e793eddd529b8f4c4e0a472faa697a9e987fd7b1648dbf8eadbf51c2c0f31dd4af688b526be2fddc4266b8f2ce1bc57a1e0f3c76eab599fe1af0f6aa49309c29c9ab67eec93c763c1ea16f1fc95ed184b03fd59e57e69a51e6b8f536bafd53ecf751c7dcfc0963ca67e1bd8ffa1e0fd572b978591832f95998f24127e191a45fe5eaba63284ba3092947b2b12953e693d956428a54d226d96ee0a086955d29e7d514164960fc452960f5475504269058a428a4d48a40ac5e51ca9a53b4a4d8d589cf653b5e7a055b72b17ce119c86171e36b7e224fc965bdcd1423078ea4951baba456aead94163fb842b5b273ca94f661480046d1dc5fb1ee9a94d2ab228a31b1a2c688470b76b40a0092687a73dbd95b49a9149077d8b40820f42b0e7d33166e766c77ab3859d48a4a5152ec716e3d1a3974ac8613e439b237b0770550e9e7c67813092270e0765bfca8e67e165bb1c7c71c0f92fd035a495d8fd9f6b1a63fc11a6e0e763c592f6b435f1bc35c4f3cbb9fcd70e78c60e91db865292b673be19f13c50b1adcccb9806f521bb8fd3bae8e2fb47d1a4ce87031f1337224c878858256001c5dc0bfcc90b55e3bf06f87f1b4b9b55d3739fa7be3a262da1f1c8e278007504fb71faaf3083552c9e292379ded70731c072d70377fa7558766e7a8fd8e6b6e7e66bf3ea92eec99f2b73a479f4e287a0f6ed4bd2dcfc6d471007376b5dff0a66870f9b4daf9ab1f29f14d24d14a4991e5ef1c0b71ebd3f92dee1f8cf3f10b419cf1d9c8b151da78eb1b4bd0626e449833c7b9d5786fdcd75fb3ba7d5708ff0015e90de98ba893efe58ff35aff001978cb375e960c7f30b62823703b0fdf248bfa505cd8712d165a49f5e16ab2cd2eccde2837d1d79f1669bfc38399f3959fd123bc578bfc1a64eefce703fed5a1d3348d5b55c938da7624b3ca3ab58db0d1d2c9e802e8b51fb3cd5b4dc2873f304270c9fdecd8af33792dbeaf681c77e97d11e6c9f43c30f8633fc595d34b00ff00cd947ff1551f15cee1f06161b7d373e477f22174b93f66f95a5b04b90c9a7848b136390e8c83df8175f9d2c1c0d1b1606bfcc86290875b5f57616896597ec66de38fa3590eb1ac6400f831718b4f76c0f23f571590d77882622cc5103eb13001fa5ade3236c6ddac6b5a3d1a28295aac2fdc8c9e65e91a8187aac82a6d4dcd07a88da07f92876850c9fef53e44decf7f05743818191a84de562c7b9c05b89e1ad1ea4f608d59f0e99a764ff66e6e3ff6944e8cf9ee21c0c6efe289bdff0033e9d952c70ebb0529bfe1aac5c1c6c5a30441a6bef753f5590015a0d15d9595a83dec9a438ecff6af73b7195df3fa92ba3af65ad28f08ce49df25685611ec84ac545948013ed452762169149e9148b0129149e914802a918248dd1baf6bda5a68d705698e84fc73781905800e03cf23e616fa91b56738467d9709ca3d1cf64e36b79918c3c89ae10edc1cf702d06b83ea930bc27891445b944cd25f12c65cc3f3e6974a029a511c308952cb37ece2b55d0b331627cb088e66c62f703b5fb7dc7aad469ce9f3048d8da5c180123d07aaec35d76bc729b168f1b3c9747cc840b07b8e4fe4b0bc2d26a91e48c79f4d10e30dd723984107af049e45ff00358cb1c76a46f1c9251b673b998bfb3cc5af6064dd0c678255fa5e1e19c964d960cb0021ce843f67983d370fbbf45bfcbf06e2ceec891993289257170ba21a49be7d55ba5f8531b118e19123a77380e45b2bdf82a3c322bcd13bbd0b56f0a991b2e9901d1b2c45e5796ee2378ed641a3cd7268adc63f8931a49dd16537cbc8036d834eabbea3b2f3497c3d0d1fd9f2258cfa1e42c0970752c5365be6b4747466ff004eaa5e392eca5922cf78c2d576c6062cd1bd8d6d32378db5ec08e9e9d126a3a6689ab6e39988e8262ea134600278bbb160fcd78961788b2f0de1be63da4756bc2e9b07c7ae8da04b640ea41529b8f45349f66ff53f03664204ba74ccca8dc2f6934ef9762b452695918f37973c2e74ad679afc7638798d67345df86e8d7734aacefb5cc4d3710c1a642e9f228ed26831a7debaaf35caf10ea1a8ea7fda1999924b96e78779c4d169f6afbb5ecbaa1be48d395196b08493abfe1dbea59596f8637ba07c388f8db246d8da7cbdaee9f10b1668f536b5124e32dd16263e4c2f99a0b0185b6e634f569278d9ee3e4b65a4f891f165331b56d73025c29016bb2e30e7be368048a01a01249fe207bfaac8d435ef0d4391245a2d478e5dbdef113b74cf3d5c78fa0ecaa128c1f24ce2dae030b122c2c76410376b1a3ea7baba8ad6ff00a43a6d5f9921ff00a4efe8b231b57c0c900c590de7b3811fcd57922d98e8ccba42011408e41ee109d8522ea5149c046d4ec9d45a46d4fb54514586a2ed46d4d45145162a176a29351451458e85a5202652d4ac285aa51eead3b5c976a2c742284f4a293b10b484d48a4ac0aa48a394548c6bff00bc2d6be7f0fe9990fdf2e2837d83dc1bf4ba5b5509348a4daf6681fe11d21c29b14acfeeca7fced51fe85e9ad36c93247b6e1fd174ca14d47e0f697d34d3e86c998d6194535a1adb89bc01f929c3d162c564b1c8cc69c4b4374d0db9947ab4dadba14f8e25f925f4c6660e2467f778d137f260578681d057e4a4a8b54a911d816d8ab2845a131d17d8402910a0aa1ed4d855a9b4ec5a8e849b94da2c3526c29e12708dc9d8e87e14242e53b9162d47424dc8bf4e52b150e8a54b25648098ded7004825a6f94fb8a2c28921422d45a76144a85168b4ac28950a2d2bded63773dc1ad1d49341161a8c85aacbd7f07181a7ba53e8c163eab56ef13cefdde5c2c673c59b52e6914b1b3a8411cae3dfafe7bcf12b595f8581633f50cb9185aec890870a3ca5e42bc6ceca5cbc7881f3268db468db821702e92c924f27a9425e41e88f422fa174ab8f24bc7ddae7d508540879a631c4f7d5ed174886632441d55684200896631c4e7d5d76549cd3b602231fbd3c8be884200bdf290e0daeab027d5fca95cd1003b4917bbff48424c1235b27885ef703fb333e16ee16e3d6e92b7c4d9263af262dc6e8f61f2508509b2da4347e26c8f369d0445a1bcd5824d27d43579f234bdf15c1f1d3b6bb922bd7b21086d85235de15cd961cb871da498e52edcdbe3a0e69767b8a108c6f8265d81711caa67c9f247dddd5cf5a5085a324d13bc4b3ba573198f1b6b8b26d661d624661b249226bdee049a343e8a10b38b65b48d3eabab65e562821e226b641623b05df3b5a69f2a794b9b2caf7ff0079c4a94218d155173793d7d954d95cea75fa8a42162ca2d276b881d93433164cd91cd0f078da54a14db024e4921cef2dbe95ca1084d3607fffd9, 22, 3, 4),
('BRG-20240528005420', 'tanah 1 kg via pewawad', 0, 2000, 0xffd8ffe000104a46494600010100000100010000ffdb008400090607080706090807080a0a090b0d160f0d0c0c0d1b14151016201d2222201d1f1f2428342c242631271f1f2d3d2d3135373a3a3a232b3f443f384334393a37010a0a0a0d0c0d1a0f0f1a37251f253737373737373737373737373737373737373737373737373737373737373737373737373737373737373737373737373737ffc0001108008500c803012200021101031101ffc4001c0000020203010100000000000000000000000201030405060708ffc4003e1000010401030204030505040b0000000001000203110405122131410613516122819107325271a1142342b1d1157292c116243334436283c2d2e1f0ffc400190100030101010000000000000000000000000102030405ffc4002111000202020203000300000000000000000001021103122131134151044261ffda000c03010002110311003f00d00936f45632677ad2c6522fd57ad479f66679e53b724770560590536e4b51ec67b658dfc1a526369fba696007261239bd094b51ec66d16f176a4382c764ae23e24177296a3d8cb63e8ac86b9ae1cf2b5ad715911bdddd4b45265c6af851b394a0a6168019ace12bc14a5e52ef368a0b0702ab23856efa4a5c0a605546d291cab1c42addca6224526209af4f45480095905c1a02010f131ace50f959ecb1a5909fba56396b8f3696b61b19e660d1c054f9ae938aa2b1dad77ba7b2de8693d45633e42dfcd0b1e57389eb6109a889c8b031a4a71003d0a90d0de83953653b109e47ba47454b200251e4df7458518db68a7ecaef2691e49458a8a6d3c6371e5582323b276c249e9f449b4349922268ec536c7122ba2c864240e4ab034051668915c7171f1754db2d49291cea4862b994aa784cf7df7559e7d55225b1689be556e24774e6bdd56f6f6b4c96c42f3eaa0bca82d77a283615d13c921c87c8484b68e3ba282c52ebea80e4ff00077052ba90224bf8485dee8a51b51404a114a103365e49b47944765903712006924f6a5d1e9fe0ed532d9e6641870d87a79a6ddfe11fd560f25766aa17d1caf96ef452d61eebb9d0fc2d978dab3a0d5a0d2737008244d1492c7334f60584907e4b7f91e11d0656fc18ee88f62c95c2beb6166ff22269e16796360bee9863b41eabb9caf00b5cddfa767fe4d9875f98fe8b9ed43c3baa69c09c8c57960eb245f1b7f454b22974c4e0d7a35418d1d94d01d02905beb69b7347042a115dd0e1aa3713d9397848e7a1098a5c94907aa87d91d154e055a44b60f009e3f44be5840051ca6490611dad56e8dc3a2b4eff00551b88ea8e445767bd23e13d42b0c83b848e734f655c8842d6fb2acb137168b3d9022b2d2141055db9de83e8a0977e108e40a79f442b1ce27aa54c05429a4200d9798eecf00ac883c4dad69543cd7666303fc46dc3e6b5b68700f6398f276b85116b29e1525c9a47338b3afc0fb49c595a04ed732fbf50b6f178cf02703664869ea3ff008af26c7c4196e98cf29918081096bba340a06e85febd1449a5ccce71e50e1e8ee0ae27827568eb5963747b064f894c81a2224c601b7c6ff8b751aaf6baf5fc965e178ab74804a5bc9fe2155d4f51ec40aaec795e1dfb565e111e60919cf53d16cb13c432020cbb5e7a6e2391f350a970d15cf68f68ccc6d0b550f39d8c2096e8bef69078fe21c77fd0fa2d16a3e0290073b4bcd1271f0c730a3fe21fd172785e2587e21fb4490b9f575b79a374491641efeaba4d1b5ec88b2d84cd0cd13c90436d85b649363a11c9e793eddd529b8f4c4e0a472faa697a9e987fd7b1648dbf8eadbf51c2c0f31dd4af688b526be2fddc4266b8f2ce1bc57a1e0f3c76eab599fe1af0f6aa49309c29c9ab67eec93c763c1ea16f1fc95ed184b03fd59e57e69a51e6b8f536bafd53ecf751c7dcfc0963ca67e1bd8ffa1e0fd572b978591832f95998f24127e191a45fe5eaba63284ba3092947b2b12953e693d956428a54d226d96ee0a086955d29e7d514164960fc452960f5475504269058a428a4d48a40ac5e51ca9a53b4a4d8d589cf653b5e7a055b72b17ce119c86171e36b7e224fc965bdcd1423078ea4951baba456aead94163fb842b5b273ca94f661480046d1dc5fb1ee9a94d2ab228a31b1a2c688470b76b40a0092687a73dbd95b49a9149077d8b40820f42b0e7d33166e766c77ab3859d48a4a5152ec716e3d1a3974ac8613e439b237b0770550e9e7c67813092270e0765bfca8e67e165bb1c7c71c0f92fd035a495d8fd9f6b1a63fc11a6e0e763c592f6b435f1bc35c4f3cbb9fcd70e78c60e91db865292b673be19f13c50b1adcccb9806f521bb8fd3bae8e2fb47d1a4ce87031f1337224c878858256001c5dc0bfcc90b55e3bf06f87f1b4b9b55d3739fa7be3a262da1f1c8e278007504fb71faaf3083552c9e292379ded70731c072d70377fa7558766e7a8fd8e6b6e7e66bf3ea92eec99f2b73a479f4e287a0f6ed4bd2dcfc6d471007376b5dff0a66870f9b4daf9ab1f29f14d24d14a4991e5ef1c0b71ebd3f92dee1f8cf3f10b419cf1d9c8b151da78eb1b4bd0626e449833c7b9d5786fdcd75fb3ba7d5708ff0015e90de98ba893efe58ff35aff001978cb375e960c7f30b62823703b0fdf248bfa505cd8712d165a49f5e16ab2cd2eccde2837d1d79f1669bfc38399f3959fd123bc578bfc1a64eefce703fed5a1d3348d5b55c938da7624b3ca3ab58db0d1d2c9e802e8b51fb3cd5b4dc2873f304270c9fdecd8af33792dbeaf681c77e97d11e6c9f43c30f8633fc595d34b00ff00cd947ff1551f15cee1f06161b7d373e477f22174b93f66f95a5b04b90c9a7848b136390e8c83df8175f9d2c1c0d1b1606bfcc86290875b5f57616896597ec66de38fa3590eb1ac6400f831718b4f76c0f23f571590d77882622cc5103eb13001fa5ade3236c6ddac6b5a3d1a28295aac2fdc8c9e65e91a8187aac82a6d4dcd07a88da07f92876850c9fef53e44decf7f05743818191a84de562c7b9c05b89e1ad1ea4f608d59f0e99a764ff66e6e3ff6944e8cf9ee21c0c6efe289bdff0033e9d952c70ebb0529bfe1aac5c1c6c5a30441a6bef753f5590015a0d15d9595a83dec9a438ecff6af73b7195df3fa92ba3af65ad28f08ce49df25685611ec84ac545948013ed452762169149e9148b0129149e914802a918248dd1baf6bda5a68d705698e84fc73781905800e03cf23e616fa91b56738467d9709ca3d1cf64e36b79918c3c89ae10edc1cf702d06b83ea930bc27891445b944cd25f12c65cc3f3e6974a029a511c308952cb37ece2b55d0b331627cb088e66c62f703b5fb7dc7aad469ce9f3048d8da5c180123d07aaec35d76bc729b168f1b3c9747cc840b07b8e4fe4b0bc2d26a91e48c79f4d10e30dd723984107af049e45ff00358cb1c76a46f1c9251b673b998bfb3cc5af6064dd0c678255fa5e1e19c964d960cb0021ce843f67983d370fbbf45bfcbf06e2ceec891993289257170ba21a49be7d55ba5f8531b118e19123a77380e45b2bdf82a3c322bcd13bbd0b56f0a991b2e9901d1b2c45e5796ee2378ed641a3cd7268adc63f8931a49dd16537cbc8036d834eabbea3b2f3497c3d0d1fd9f2258cfa1e42c0970752c5365be6b4747466ff004eaa5e392eca5922cf78c2d576c6062cd1bd8d6d32378db5ec08e9e9d126a3a6689ab6e39988e8262ea134600278bbb160fcd78961788b2f0de1be63da4756bc2e9b07c7ae8da04b640ea41529b8f45349f66ff53f03664204ba74ccca8dc2f6934ef9762b452695918f37973c2e74ad679afc7638798d67345df86e8d7734aacefb5cc4d3710c1a642e9f228ed26831a7debaaf35caf10ea1a8ea7fda1999924b96e78779c4d169f6afbb5ecbaa1be48d395196b08493abfe1dbea59596f8637ba07c388f8db246d8da7cbdaee9f10b1668f536b5124e32dd16263e4c2f99a0b0185b6e634f569278d9ee3e4b65a4f891f165331b56d73025c29016bb2e30e7be368048a01a01249fe207bfaac8d435ef0d4391245a2d478e5dbdef113b74cf3d5c78fa0ecaa128c1f24ce2dae030b122c2c76410376b1a3ea7baba8ad6ff00a43a6d5f9921ff00a4efe8b231b57c0c900c590de7b3811fcd57922d98e8ccba42011408e41ee109d8522ea5149c046d4ec9d45a46d4fb54514586a2ed46d4d45145162a176a29351451458e85a5202652d4ac285aa51eead3b5c976a2c742284f4a293b10b484d48a4ac0aa48a394548c6bff00bc2d6be7f0fe9990fdf2e2837d83dc1bf4ba5b5509348a4daf6681fe11d21c29b14acfeeca7fced51fe85e9ad36c93247b6e1fd174ca14d47e0f697d34d3e86c998d6194535a1adb89bc01f929c3d162c564b1c8cc69c4b4374d0db9947ab4dadba14f8e25f925f4c6660e2467f778d137f260578681d057e4a4a8b54a911d816d8ab2845a131d17d8402910a0aa1ed4d855a9b4ec5a8e849b94da2c3526c29e12708dc9d8e87e14242e53b9162d47424dc8bf4e52b150e8a54b25648098ded7004825a6f94fb8a2c28921422d45a76144a85168b4ac28950a2d2bded63773dc1ad1d49341161a8c85aacbd7f07181a7ba53e8c163eab56ef13cefdde5c2c673c59b52e6914b1b3a8411cae3dfafe7bcf12b595f8581633f50cb9185aec890870a3ca5e42bc6ceca5cbc7881f3268db468db821702e92c924f27a9425e41e88f422fa174ab8f24bc7ddae7d508540879a631c4f7d5ed174886632441d55684200896631c4e7d5d76549cd3b602231fbd3c8be884200bdf290e0daeab027d5fca95cd1003b4917bbff48424c1235b27885ef703fb333e16ee16e3d6e92b7c4d9263af262dc6e8f61f2508509b2da4347e26c8f369d0445a1bcd5824d27d43579f234bdf15c1f1d3b6bb922bd7b21086d85235de15cd961cb871da498e52edcdbe3a0e69767b8a108c6f8265d81711caa67c9f247dddd5cf5a5085a324d13bc4b3ba573198f1b6b8b26d661d624661b249226bdee049a343e8a10b38b65b48d3eabab65e562821e226b641623b05df3b5a69f2a794b9b2caf7ff0079c4a94218d155173793d7d954d95cea75fa8a42162ca2d276b881d93433164cd91cd0f078da54a14db024e4921cef2dbe95ca1084d3607fffd9, 19, 4, 1);

--
-- Trigger `barang`
--
DELIMITER $$
CREATE TRIGGER `before_insert_barang` BEFORE INSERT ON `barang` FOR EACH ROW BEGIN
    SET NEW.id_barang = CONCAT('BRG-', DATE_FORMAT(NOW(), '%Y%m%d%H%i%s'));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_transaksi` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` int(5) NOT NULL,
  `id_barang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `id_jenis` int(10) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jenis_barang`
--

INSERT INTO `jenis_barang` (`id_jenis`, `jenis`, `keterangan`) VALUES
(4, 'Operasional', 'Inventaris yang terlibat dalam operasi sehari-harii'),
(19, 'Persediaan', 'Inventaris yang digunakan untuk menunjang operasi sehari-hari'),
(21, 'Administrasi', 'Inventaris peralatan kantor'),
(22, 'Kendaraan Dinas', 'Milik Dimas Kanjeng Taat Pribadi'),
(23, 'test notif berhasil', '123'),
(24, '1213131', 'afdafaf'),
(25, 'test', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi_barang`
--

CREATE TABLE `lokasi_barang` (
  `id_lokasi` int(10) NOT NULL,
  `nama_lokasi` varchar(64) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `lokasi_barang`
--

INSERT INTO `lokasi_barang` (`id_lokasi`, `nama_lokasi`, `keterangan`) VALUES
(1, 'Ruang Depan', 'Di depan'),
(2, 'Ruang cucii', 'Tempat cuci'),
(4, 'Hangar', 'Garasi Dimas Kanjeng Taat Pribadi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nama_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `nama_role`) VALUES
(1, 'admin'),
(2, 'owner');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan_barang`
--

CREATE TABLE `satuan_barang` (
  `id_satuan` int(10) NOT NULL,
  `satuan` varchar(32) NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `satuan_barang`
--

INSERT INTO `satuan_barang` (`id_satuan`, `satuan`, `keterangan`) VALUES
(3, 'Unit', 'Satuan dalam bentuk barang utuh'),
(4, 'Pcs', 'Satuan dalam bentuk bungkus'),
(6, 'Kg', 'Satuan berat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role_id`) VALUES
(1, 'superadmin', '12345678', 1),
(2, 'ownerganteng', 'R4ihan123', 2),
(3, 'admin', 'admin', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_satuan` (`id_satuan`),
  ADD KEY `id_lokasi` (`id_lokasi`);

--
-- Indeks untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indeks untuk tabel `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `lokasi_barang`
--
ALTER TABLE `lokasi_barang`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_role` (`nama_role`);

--
-- Indeks untuk tabel `satuan_barang`
--
ALTER TABLE `satuan_barang`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `id_jenis` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `lokasi_barang`
--
ALTER TABLE `lokasi_barang`
  MODIFY `id_lokasi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `satuan_barang`
--
ALTER TABLE `satuan_barang`
  MODIFY `id_satuan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis_barang` (`id_jenis`),
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`id_satuan`) REFERENCES `satuan_barang` (`id_satuan`),
  ADD CONSTRAINT `barang_ibfk_3` FOREIGN KEY (`id_lokasi`) REFERENCES `lokasi_barang` (`id_lokasi`);

--
-- Ketidakleluasaan untuk tabel `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `barang_masuk_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
