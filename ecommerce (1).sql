
CREATE TABLE `carts` (
  `id` int(255) NOT NULL,
  `user_id` int(255) DEFAULT NULL,
  `product_id` int(255) DEFAULT NULL,
  `product_quantity` int(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `product_quantity`, `created_at`, `updated_at`) VALUES
(2, 7, 2, NULL, '2023-01-23 17:31:31', '2023-01-23 17:31:31'),
(3, 7, 3, NULL, '2023-01-23 17:31:47', '2023-01-23 17:31:47'),
(4, 7, 4, NULL, '2023-01-23 17:31:58', '2023-01-23 17:31:58'),
(5, 7, 4, NULL, '2023-01-23 17:37:39', '2023-01-23 17:37:39'),
(6, 7, 3, NULL, '2023-01-23 17:45:56', '2023-01-23 17:45:56');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Mobile', 'Active', 'Mobile', '1674402150.png', '2023-01-22 09:02:35', '2023-01-23 04:42:30'),
(3, 'Laptop', 'Active', 'Laptop', '1674402168.png', '2023-01-23 04:42:48', '2023-01-23 04:42:48');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `feedback` longtext DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `feedback`, `created_at`, `updated_at`) VALUES
(1, 'dvdsvdsvvds', '2023-01-23 20:46:41', '2023-01-23 20:46:41');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_09_24_183950_create_clients_table', 2),
(7, '2022_09_24_202646_create_vendors_table', 3),
(8, '2022_09_25_181306_create_assign_vendor_to_clients_table', 4),
(10, '2022_09_27_182320_create_given_amount_to_venors_table', 5),
(11, '2022_09_29_174335_create_receive_amount_from_clients_table', 6),
(13, '2022_10_18_182258_create_purchase_from_vendors_table', 7),
(14, '2022_10_18_190742_create_purchase_property_amount_monthlies_table', 8),
(15, '2023_01_21_234546_create_category_controllers_table', 9),
(16, '2023_01_22_005509_create_categories_table', 10),
(17, '2023_01_22_012335_create_products_table', 11),
(18, '2023_01_22_124651_create_product_images_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `status`, `description`, `quantity`, `price`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 'ABCD', 1, 'Active', 'zcsacacasc', '30', '300', '1674402345.png', '2023-01-22 21:04:11', '2023-01-23 04:45:46'),
(2, 'Test 2', 1, 'Active', 'dvdss', '23', '123', '1674402388.png', '2023-01-23 04:46:28', '2023-01-23 04:46:28'),
(3, 'ABCD', 3, 'Active', 'dsavvaddav', '23', '200', '1674402447.png', '2023-01-23 04:47:27', '2023-01-23 04:47:27'),
(4, 'Test Product 23', 3, 'Active', 'gyfytdg fthjdt d', '98', '500', '1674402496.png', '2023-01-23 04:48:16', '2023-01-23 04:48:16');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, '1674374651.png', '2023-01-22 21:04:11', '2023-01-22 21:04:11'),
(2, 2, '1674402388.png', '2023-01-23 04:46:28', '2023-01-23 04:46:28'),
(3, 2, '1674402388.png', '2023-01-23 04:46:28', '2023-01-23 04:46:28'),
(4, 2, '1674402388.png', '2023-01-23 04:46:28', '2023-01-23 04:46:28'),
(5, 2, '1674402388.png', '2023-01-23 04:46:28', '2023-01-23 04:46:28'),
(6, 3, '1674402447.png', '2023-01-23 04:47:27', '2023-01-23 04:47:27'),
(7, 3, '1674402447.png', '2023-01-23 04:47:27', '2023-01-23 04:47:27'),
(8, 4, '1674402496.png', '2023-01-23 04:48:16', '2023-01-23 04:48:16');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `review` longtext DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `review`, `created_at`, `updated_at`) VALUES
(1, 7, 3, 'csascsccsacascsa', '2023-01-23 19:37:58', '2023-01-23 19:56:36');

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE `role_permissions` (
  `id` int(11) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `permission` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`id`, `role`, `permission`, `updated_at`, `created_at`) VALUES
(1, 'Product Manager', 'Add User', '2023-01-23 21:48:29', '2023-01-23 21:48:29'),
(2, 'Product Manager', 'Edit User', '2023-01-23 21:48:29', '2023-01-23 21:48:29'),
(3, 'Product Manager', 'Delete User', '2023-01-23 21:48:29', '2023-01-23 21:48:29'),
(4, 'Product Manager', 'Delete Product', '2023-01-23 21:48:29', '2023-01-23 21:48:29'),
(5, 'Product Manager', 'Add Catgeory', '2023-01-23 21:48:29', '2023-01-23 21:48:29'),
(6, 'Product Manager', 'Edit Category', '2023-01-23 21:48:29', '2023-01-23 21:48:29'),
(7, 'Product Manager', 'Delete Category', '2023-01-23 21:48:29', '2023-01-23 21:48:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `type`, `role`, `contact`, `status`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'admin@ecommerce.com', NULL, '$2y$10$6dxhT9yGjpZomwyBEkZiOe01a.CLiMRT64QnTJk.OUq3buN9q2re.', 1, NULL, '', '', '', NULL, '2022-09-26 02:31:31', '2022-09-26 02:31:31'),
(2, 'Test', 'rulogoxewo', 'test@gmail.com', NULL, '$2y$10$ZNtDG52d02KTUFy0Mm9eAuC.yqlwM4HzN/N6.6jdYTkJc49.HaKJu', 2, 'User', '223', 'Active', 'csaccaccsac', NULL, '2023-01-23 02:25:19', '2023-01-23 03:39:07'),
(3, NULL, 'daqime', 'josadyre@mailinator.com', NULL, '$2y$10$kW8n0I6rbUV3O0.KD4/qCu8idlx2LANcVIa0P6m5wSsa9pPKyptze', 3, 'User', NULL, 'Active', NULL, NULL, '2023-01-23 04:33:50', '2023-01-23 04:33:50'),
(5, NULL, 'test', 'test1@gmail.com', NULL, '$2y$10$hLl4yC2rqjGi88kCe4enR.mGHAbItk.OBCTFnKZ/TWsl6uLsFKwb2', 3, 'User', NULL, 'Active', NULL, NULL, '2023-01-23 22:39:34', '2023-01-23 22:39:34'),
(6, NULL, 'daruldevs.com', 'accountant@gmail.com', NULL, '$2y$10$hWjB/nooNUBRttpsEhKvcOKccKVRLWB1I/iebQUiHgHpHtEVZo5Ni', 3, 'User', NULL, 'Active', NULL, NULL, '2023-01-23 22:54:50', '2023-01-23 22:54:50'),
(7, NULL, '123', 'salekeen@gmail.com', NULL, '$2y$10$ixO98fpycs9J3jRPv92OOefXbnzVY1pdAwv7FIZd0oJWPFCEwDbiq', 3, 'User', NULL, 'Active', NULL, NULL, '2023-01-23 22:56:25', '2023-01-23 22:56:25');

-- --------------------------------------------------------

--
-- Table structure for table `wishlets`
--

CREATE TABLE `wishlets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlets`
--

INSERT INTO `wishlets` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(2, 7, 3, '2023-01-23 20:29:40', '2023-01-23 20:29:40'),
(3, 7, 2, '2023-01-23 20:32:03', '2023-01-23 20:32:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlets`
--
ALTER TABLE `wishlets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `wishlets`
--
ALTER TABLE `wishlets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

