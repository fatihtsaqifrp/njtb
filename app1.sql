-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2019 at 12:36 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app1`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `nickname` text NOT NULL,
  `email` text NOT NULL,
  `telp` text NOT NULL,
  `level` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `kecamatan` text NOT NULL,
  `kota` text NOT NULL,
  `prov` text NOT NULL,
  `postal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `username`, `password`, `nickname`, `email`, `telp`, `level`, `alamat`, `kecamatan`, `kota`, `prov`, `postal`) VALUES
(1, 'admin', '$2y$10$vFn0wuFAdNZTHfZa4yOYt.271NbidwdDZIxt3LVzuiLGRHM/zFie6', 'adminku', 'admin@admin.com', '08123456789', 4, 'alamatku', 'Kecamatanku', 'Kabupatenku', 'Provinsiku', '60123'),
(2, 'owner', '$2y$10$Wh/QBNkKKBoACsFeRpl5jOHWyQtBQgp.NUiF3gF0b8Y.SWERFGjZi', 'ownerku', 'owner@owner.com', '08123456789', 5, '', '', '', '', ''),
(3, 'pegawai', '$2y$10$OHysG8pE3QonHY.TokJoI.AEH6ar/Ck149FUlhqoRR10vF3iJjHWK', 'pegawaiku1', 'pegawai@pegawai.com', '08123456789', 3, 'alamatpegawaiku1', 'kecpegawaiku1', 'kabpegawaiku1', 'provpegawaiku1', '60123'),
(4, 'pemasok', '$2y$10$Wh/QBNkKKBoACsFeRpl5jOHWyQtBQgp.NUiF3gF0b8Y.SWERFGjZi', 'pemasokku', 'pemasok@pemasok.com', '08123456789', 1, '', '', '', '', ''),
(5, 'pembeli', '$2y$10$Wh/QBNkKKBoACsFeRpl5jOHWyQtBQgp.NUiF3gF0b8Y.SWERFGjZi', 'pembeliku', 'pembeli@pembeli.com', '08123456789', 0, '', '', '', '', ''),
(6, 'keuangan', '$2y$10$Wh/QBNkKKBoACsFeRpl5jOHWyQtBQgp.NUiF3gF0b8Y.SWERFGjZi', 'keuanganku', 'keuangan@keuangan.com', '08123456789', 2, '', '', '', '', ''),
(7, 'tester123', '$2y$10$Wh/QBNkKKBoACsFeRpl5jOHWyQtBQgp.NUiF3gF0b8Y.SWERFGjZi', 'testerku', 'tester@tester.tester', '123434444555', 0, '', '', '', '', ''),
(8, 'yayeyo', '$2y$10$6E/JwvX6EJcTO6y2IhbHD.EV9dCi22O9MThXMvfSeXf1Mgdar5FL2', 'yayeyo', '111201710802@mhs.dinus.ac.id', '', 0, '', '', '', '', ''),
(9, 'riya', '$2y$10$LYZAsHafZ7K.ooPf60W9mef56AcFoVvonWXD0bp843ibCB9KYV8Oq', 'riya', 'riya@gmail.com', '', 0, '', '', '', '', ''),
(10, 'Nadya', '$2y$10$.qa8RIcsp1vWbI1STiJs0.AKeSuiBieqDNtCCnsb8ghehSvtuNK.C', 'Nadya', 'nadya@gmail.com', '', 0, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pemasok`
--

CREATE TABLE `pemasok` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `harga_barang` text NOT NULL,
  `tgl` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemasok`
--

INSERT INTO `pemasok` (`id`, `id_barang`, `id_user`, `jumlah_barang`, `harga_barang`, `tgl`) VALUES
(1, 6, 4, 10, '148999', '1560413471');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_barang` text NOT NULL,
  `harga_barang` text NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `tgl` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id`, `id_transaksi`, `id_barang`, `nama_barang`, `harga_barang`, `jumlah_barang`, `tgl`) VALUES
(1, 1, 1, 'hoodie jaket', '150000', 1, '1560286753'),
(2, 1, 5, 'Sweater 1', '145000', 1, '1560286753'),
(3, 1, 2, 'Baju Kemeja 1', '115000', 3, '1560286753'),
(4, 2, 1, 'hoodie jaket', '150000', 2, '1560286874'),
(5, 2, 3, 'Baju Kemeja 2', '115000', 1, '1560286874'),
(6, 3, 6, 'Tricolore Oversize Jaket Hoodie Pria', '148999', 1, '1560778748'),
(7, 4, 5, 'Sweater 1', '145000', 2, '1560789977'),
(8, 5, 6, 'Tricolore Oversize Jaket Hoodie Pria', '148999', 2, '1560790649'),
(9, 6, 1, 'hoodie jaket', '150000', 1, '1560926967'),
(10, 7, 6, 'Tricolore Oversize Jaket Hoodie Pria', '148999', 1, '1561041221'),
(11, 8, 1, 'hoodie jaket', '150000', 3, '1561298917'),
(12, 8, 6, 'Tricolore Oversize Jaket Hoodie Pria', '148999', 1, '1561298917'),
(13, 9, 1, 'hoodie jaket', '150000', 1, '1561306223'),
(14, 10, 1, 'hoodie jaket', '150000', 2, '1561424195'),
(15, 11, 1, 'hoodie jaket', '150000', 1, '1561461811'),
(16, 12, 1, 'hoodie jaket', '150000', 1, '1561462442'),
(17, 13, 6, 'Tricolore Oversize Jaket Hoodie Pria', '148999', 1, '1561464657'),
(18, 14, 1, 'hoodie jaket', '150000', 1, '1561465189'),
(19, 14, 7, 'W.ESSENTIELS Delibes Windbreaker Jaket Pria', '449005', 1, '1561465189'),
(20, 15, 6, 'Tricolore Oversize Jaket Hoodie Pria', '148999', 2, '1561472867'),
(21, 16, 6, 'Tricolore Oversize Jaket Hoodie Pria', '148999', 3, '1561473079'),
(22, 17, 1, 'hoodie jaket', '150000', 1, '1561476743'),
(23, 18, 1, 'hoodie jaket', '150000', 1, '1561476779');

-- --------------------------------------------------------

--
-- Table structure for table `picture`
--

CREATE TABLE `picture` (
  `id` int(11) NOT NULL,
  `url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `picture`
--

INSERT INTO `picture` (`id`, `url`) VALUES
(0, 'nopic.jpg'),
(2, 'jaket-hoodie-sweatshirt-long-sleeve-size-m-light-gray-1.jpg'),
(3, '700_700_7922e7a50de74c5792c5ba33f2d479ca.jpg'),
(4, 'Kemeja_Pria_hem_alonzo_kemeja_cowo_keren_kemeja_laki_laki_ke.jpg'),
(5, '5f43541319f97ab134607a3ccaf3c2fa.jpg'),
(6, 'lada_navy.jpg'),
(7, '1.jpg'),
(8, 'ambulance.png'),
(9, '2.jpg'),
(10, '21.jpg'),
(11, 'w-essentiels_w-essentiels-delibes-windbreaker-jaket-pria_full83.jpg'),
(12, 'edwin_edwin-brooklyn-03-regular-fit-jaket-jeans-pria_full05.jpg'),
(13, 'cheap-monday_cheap-monday-pullover-skull-badge-hood-sweater-pria---black_full02.jpg'),
(14, 'off-white_off-white-kiss-jaket-hoodie-pria---black_full06.jpg'),
(15, 'champion_champion-hoodie-graphic-jacket-wanita_full17.jpg'),
(16, 'off-white_off-white-boat-zipped-jaket-hoodie-pria-sweatshirt-full-zip---white_full11.jpg'),
(17, 'tendencies_tendencies-jaket-hoodie-pria-pullover_full13.jpg'),
(18, 'vm_vm-pullover-jaket-hoodie-pria_full09.jpg'),
(19, '3second_3second-men-jacket---black--106031915-_full02.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `nama_barang` text NOT NULL,
  `jenis_barang` int(11) NOT NULL,
  `stok_barang` int(11) NOT NULL,
  `harga_barang` text NOT NULL,
  `tgl_barang` text NOT NULL,
  `keterangan_barang` text NOT NULL,
  `id_pic` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `nama_barang`, `jenis_barang`, `stok_barang`, `harga_barang`, `tgl_barang`, `keterangan_barang`, `id_pic`) VALUES
(1, 'hoodie jaket', 1, 3, '150000', '1560309630', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc in finibus sapien. Aenean ac lorem vitae metus varius pulvinar vel vel erat. Donec id lectus magna. Morbi id ante accumsan, aliquam felis nec, luctus lectus. Quisque non convallis magna. Nunc in luctus dui. Pellentesque ut velit mattis, mattis orci et, congue velit. Donec at blandit nisl. Nulla pretium leo ac libero mattis sollicitudin. Integer sollicitudin ac dolor sed placerat. Donec tempor urna eros, vitae rhoncus sem vehicula eget. In lacus dui, lacinia at eros eu, dapibus vehicula orci. Etiam at arcu arcu. Suspendisse pretium finibus interdum. Phasellus vel consectetur massa, in maximus nibh. Fusce vehicula bibendum tellus eu fringilla.', 2),
(2, 'Baju Kemeja 1', 2, 20, '115000', '1560309630', 'Proin lacinia erat sit amet sapien fermentum scelerisque sit amet sed nulla. Duis quis lacinia velit. Maecenas ac pretium sem. Aenean ut pharetra nibh. Mauris dolor eros, blandit ut tincidunt vitae, luctus non neque. Donec sodales ligula gravida leo placerat tempus. Duis fringilla nec justo et iaculis. Phasellus id odio sit amet purus tempus placerat ut id nisl.', 3),
(4, 'Baju Kemeja 3', 2, 10, '110000', '1560309630', 'In sit amet risus metus. Etiam quis tincidunt eros. Mauris pretium eleifend vestibulum. Donec non felis justo. Aenean auctor lobortis feugiat. Mauris ornare tortor est, in bibendum risus luctus vitae. Maecenas blandit iaculis aliquet. Phasellus in ligula nec ligula aliquam vulputate. Nam sit amet cursus nisi. Duis maximus neque non ligula maximus blandit. Quisque vel tincidunt nisi, ac posuere tellus. Proin quis ante ut purus porta congue nec id nunc. Nulla in est orci.', 5),
(5, 'Sweater 1', 3, 5, '145000', '1560309630', 'Vivamus faucibus, nunc ac posuere aliquet, nunc leo fringilla augue, ut vehicula neque nunc sed erat. Proin placerat malesuada commodo. Sed at ipsum sapien. Etiam et sem lacus. Curabitur mollis non nunc sit amet ornare. In laoreet facilisis felis, quis molestie diam fermentum a. Nullam leo erat, feugiat hendrerit lacinia non, tincidunt tempor risus.', 6),
(6, 'Tricolore Oversize Jaket Hoodie Pria', 1, 10, '148999', '1560309630', 'Tricolore Oversize Jaket Hoodie Pria', 9),
(7, 'W.ESSENTIELS Delibes Windbreaker Jaket Pria', 1, 100, '449005', '1561432830', 'Dibuat menggunakan kasih ibu', 11),
(8, 'Edwin Brooklyn 03 Regular Fit Jaket Jeans Pria', 1, 20, '349000', '1561432830', 'Fitur Produk\r\n\r\n    Long sleeves jacket\r\n    Didesain trendy regular fit\r\n    Pointed collar, front flap pockets\r\n    Front button opening\r\n    Material : Jeans', 12),
(9, 'Cheap Monday Pullover Skull Badge Hood Sweater Pria - Black', 3, 80, '499999', '1561432830', 'Fitur Produk\r\n\r\n    Long sleeves hoodie sweater\r\n    Didesain trendy\r\n    Aksen drawcord\r\n    Nyaman digunakan\r\n    Material : Cotton\r\n', 13),
(10, 'Off White Kiss Sweater Hoodie Pria - Black', 3, 10, '6500000', '1561432830', '\r\n    Long sleeves sweater\r\n    Didesain trendy\r\n    Detail hoodie, 2 front pockets, detail ribbed pada cuffs dan hem bottom\r\n    Nyaman digunakan\r\n    Material : Cotton\r\n', 14),
(11, 'Champion Hoodie Graphic Jacket Wanita', 2, 10, '1250000', '1561432830', '    Long sleeves hoodie jacket\r\n    Didesain trendy\r\n    Aksen drawcord\r\n    2 front pockets, dan detail ribbed cuff & bottom\r\n    Material : Cotton\r\n', 15),
(12, 'Off White Boat Zipped Jaket Hoodie Pria - White', 2, 8, '4999990', '1561432830', '\r\n    Long sleeves jacket\r\n    Didesain trendy\r\n    Detail hoodie, front zipper opening, 2 front pockets, detail ribbed pada cuffs dan hem bottom\r\n    Nyaman digunakan\r\n    Material : Cotton\r\n', 16),
(13, 'Tendencies Pullover Jaket Hoodie Pria', 2, 29, '500000', '1561432830', '\r\n    Long sleeves hoodie jacket \r\n    Didesain trendy\r\n    Detail front pocket serta ribbed of cuff & hem\r\n    Dibuat dengan kualitas bahan yang nyaman dan cocok untuk digunakan sehari-hari\r\n    Material : Fleece\r\n', 17),
(14, 'VM Pullover Jaket Hoodie Pria', 2, 30, '299996', '1562296830', 'VM Pullover Jaket Hoodie Pria merupakan long sleeves hoodie sweater berbahan fleece di desain trendy dan stylish, dengan detail front pocket dan detail drawcord, sehingga nyaman digunakan kapan saja.\r\n\r\nSize Chart :\r\n\r\n    Size M :\r\n    Lebar dada 53 x panjang jaket 66 cm\r\n    Size L :\r\n    Lebar dada 55 x panjang jaket 69 cm\r\n    Size XL :\r\n    Lebar dada 56 x panjang jaket 72 cm\r\n', 18),
(15, '3SECOND Men Jacket - Black ', 1, 16, '449995', '1561432830', '3SECOND Men Jacket - Black [106031915] merupakan short sleeves hoodie berbahan cotton yang didesain trendy dengan detail print pada bagian depan, detail drawcord, dan front pockets.\r\n\r\nSize Chart\r\n\r\n    Size S\r\n    Chest : 86-91 cm, Waist : 76-81 cm\r\n    Size M\r\n    Chest : 97-102 cm, Waist : 81-84 cm\r\n    Size L\r\n    Chest : 107-112 cm, Waist : 84-86 cm\r\n    Size XL\r\n    Chest : 117-122 cm, Waist : 91-97 cm\r\n    Size XXL\r\n    Chest : 122-127 cm, Waist : 102-107 cm\r\n', 19);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `success` int(11) NOT NULL,
  `tgl_pesan` text NOT NULL,
  `tgl_paid` text NOT NULL,
  `tgl_sampai` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_user`, `success`, `tgl_pesan`, `tgl_paid`, `tgl_sampai`) VALUES
(1, 5, 1, '1560286753', '1560309630', '1560309630'),
(2, 7, 1, '1560286874', '1561432830', '1561605630'),
(3, 2, 2, '1560778748', '', ''),
(4, 5, 0, '1560789977', '', ''),
(5, 5, 0, '1560790649', '', ''),
(6, 8, 2, '1560926967', '1561000830', '1561000830'),
(7, 7, 0, '1561041221', '', ''),
(8, 8, 0, '1561298917', '', ''),
(9, 5, 2, '1561306223', '', ''),
(10, 8, 1, '1561424195', '1559704830', '1561692030'),
(11, 5, 2, '1561461811', '', ''),
(12, 5, 1, '1561462442', '1561432830', '1561692030'),
(13, 5, 0, '1561464657', '', ''),
(14, 5, 0, '1561465189', '', ''),
(15, 5, 0, '1561472867', '', ''),
(16, 5, 0, '1561473079', '', ''),
(17, 5, 0, '1561476743', '', ''),
(18, 5, 0, '1561476779', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemasok`
--
ALTER TABLE `pemasok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `picture`
--
ALTER TABLE `picture`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pemasok`
--
ALTER TABLE `pemasok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `picture`
--
ALTER TABLE `picture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
