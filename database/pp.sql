-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for ferdy_blog
CREATE DATABASE IF NOT EXISTS `ferdy_blog` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `ferdy_blog`;

-- Dumping structure for table ferdy_blog.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_name_unique` (`name`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ferdy_blog.categories: ~2 rows (approximately)
INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
	(1, 'Web Programming', 'web-programming', '2026-02-08 08:38:29', '2026-02-08 08:38:29'),
	(2, 'Personal', 'personal', '2026-02-08 08:38:29', '2026-02-08 08:38:29');

-- Dumping structure for table ferdy_blog.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ferdy_blog.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table ferdy_blog.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ferdy_blog.migrations: ~0 rows (approximately)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2026_02_06_091538_create_posts_table', 1),
	(6, '2026_02_08_084104_create_categories_table', 1);

-- Dumping structure for table ferdy_blog.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ferdy_blog.password_resets: ~0 rows (approximately)

-- Dumping structure for table ferdy_blog.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ferdy_blog.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table ferdy_blog.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ferdy_blog.posts: ~20 rows (approximately)
INSERT INTO `posts` (`id`, `category_id`, `user_id`, `title`, `slug`, `excerpt`, `body`, `published_at`, `created_at`, `updated_at`) VALUES
	(1, 1, 2, 'Explicabo et a magnam est quas quia consequatur tenetur.', 'omnis-fuga-nihil-ea-sed-omnis-ea-odit-ab', 'Quae et culpa tempora nisi veniam inventore molestias perferendis dolores iusto temporibus necessitatibus totam corporis quia atque dignissimos at est ducimus.', 'Occaecati sit minus et nobis. Sit odit ea voluptates aliquam. Excepturi placeat blanditiis incidunt facere. Sit sequi nisi qui quidem. In voluptatibus similique dignissimos eius. Aliquam voluptas amet omnis architecto. Ducimus recusandae sint ratione laudantium repellendus quia non.', NULL, '2026-02-08 08:38:29', '2026-02-08 08:38:29'),
	(2, 2, 3, 'Qui nesciunt maiores.', 'veniam-facilis-provident-et-ullam-deserunt-nisi', 'Saepe sint consequatur voluptas ipsa et alias velit unde ut qui rerum nulla quos modi autem iusto modi maiores.', 'Natus qui placeat magni iste iste ex tenetur. Quaerat vero esse adipisci nihil dolores sit. Quas rerum id veniam facere minus sequi. Doloribus a in neque eius. Mollitia atque voluptate velit aut voluptas quia. Repudiandae in ullam molestias quia provident quasi.', NULL, '2026-02-08 08:38:29', '2026-02-08 08:38:29'),
	(3, 1, 3, 'Voluptatem accusantium aspernatur asperiores iure nihil ab et ut nam.', 'nam-nobis-et-sed-iste-et-vitae', 'Suscipit consectetur vero at omnis praesentium sit distinctio aut qui voluptatem.', 'Est soluta modi rem corrupti. Nostrum omnis sed molestias non quo. Inventore corporis excepturi eum sapiente porro quo eius. Velit id facere magni consectetur. Repellat voluptates porro dolores corrupti.', NULL, '2026-02-08 08:38:29', '2026-02-08 08:38:29'),
	(4, 2, 3, 'Ad eaque voluptates consequuntur rem eos consectetur.', 'sed-atque-consequuntur-inventore-perspiciatis', 'Quia dolor non sunt fugit aut consectetur est iusto unde autem quam rerum omnis quia sed accusamus et voluptatem dolores.', 'Eaque et vel fugiat eius. Ut est magnam vitae laboriosam nihil itaque ut. Debitis quis autem earum vel. Delectus debitis veritatis dolorem quisquam debitis. Molestias rerum non illum ut aperiam eum. Hic enim sed exercitationem enim facere aut.', NULL, '2026-02-08 08:38:29', '2026-02-08 08:38:29'),
	(5, 1, 3, 'Maxime voluptatem illo nostrum incidunt.', 'quis-consequatur-voluptatibus-molestiae-rerum-amet-dicta-fugiat', 'Molestiae officia minus error nulla nemo illo dolore odio illo praesentium qui ab cum fugiat magni expedita officiis non.', 'Laborum impedit velit quaerat ullam temporibus unde est eaque. Dolores ratione repellendus recusandae dicta sed ducimus. Quaerat similique aliquid laboriosam. Quasi qui et enim dolorem qui temporibus aspernatur. Accusantium exercitationem et qui dolorem praesentium fugit.', NULL, '2026-02-08 08:38:29', '2026-02-08 08:38:29'),
	(6, 1, 1, 'Voluptatem esse modi rerum.', 'labore-omnis-dolorem-iusto-qui', 'Et sed qui vero in facere ut omnis odio qui nisi ut laudantium.', 'Temporibus quod non qui omnis. Consequatur beatae ut quas delectus adipisci eum quasi ut. Quos aut fuga rerum necessitatibus ut eaque beatae tempora. Autem aliquid ea quia alias est et. Hic aut optio fugit sint. Rem possimus et eveniet eum delectus.', NULL, '2026-02-08 08:38:29', '2026-02-08 08:38:29'),
	(7, 2, 2, 'Voluptate quaerat error.', 'sit-omnis-voluptatum-voluptas-aliquid-velit-consequatur', 'Enim autem error et maxime laudantium aut porro veritatis rerum dolorum odit porro iusto itaque dolor debitis qui.', 'Error voluptate incidunt quo dignissimos aut. Fuga explicabo aut distinctio aut. Aut excepturi saepe quia harum eligendi. Aperiam perspiciatis ut harum. Sunt consequatur error ipsa dolores laborum ut. Vero occaecati distinctio ut. Ut id velit ut quam laborum. Est magnam qui cupiditate et. Neque tempora est omnis voluptas. Quo esse culpa cumque reprehenderit et. Molestiae assumenda fugit est optio facere soluta placeat.', NULL, '2026-02-08 08:38:29', '2026-02-08 08:38:29'),
	(8, 2, 2, 'Quia qui aut ab delectus et.', 'accusantium-eum-iusto-eaque-enim-ad', 'Cupiditate dolore fugit labore ex enim exercitationem et eveniet amet exercitationem quo modi laborum rerum.', 'Eius qui iure deleniti maiores saepe et. Quo perferendis at et commodi distinctio consequatur commodi architecto. Nemo tempore et dolor expedita corrupti nemo qui. Necessitatibus amet eligendi sed dolore praesentium. Cupiditate voluptatem omnis voluptatem. Dolores quidem ad doloribus rerum qui ut. Non quo et ratione. Quibusdam voluptatem eum aut sed aut. Iusto cumque dolor ut occaecati beatae quas sit.', NULL, '2026-02-08 08:38:29', '2026-02-08 08:38:29'),
	(9, 2, 1, 'Libero optio suscipit nulla suscipit.', 'sed-reprehenderit-animi-eius-sit-ut-minus', 'Quam fugiat rerum sunt eius ipsa ut velit natus et porro dolor debitis est dolores earum consequatur et eos omnis voluptatem et facilis unde similique laudantium excepturi aut aut.', 'Qui vel beatae et qui soluta est laboriosam. Earum maxime harum id amet sed quo numquam. Alias porro similique deserunt ratione tempore voluptatem necessitatibus. Voluptatibus fugit commodi omnis exercitationem. Ducimus laborum incidunt quia saepe ut. Facere impedit quia qui recusandae ea magnam quia. Ullam et culpa quod quis. Ipsum voluptatem praesentium corporis aut tenetur nisi ipsum. Tempora eveniet est voluptatibus natus rerum itaque iste autem. Tempora itaque sit sequi doloremque.', NULL, '2026-02-08 08:38:29', '2026-02-08 08:38:29'),
	(10, 2, 3, 'Dolores quaerat sequi sit.', 'officiis-praesentium-porro-aliquid-nulla', 'Id molestiae impedit tenetur et unde ex rem qui provident consequuntur veniam consectetur.', 'Perferendis qui quasi modi ea. Aperiam sit assumenda hic blanditiis aut. Quisquam voluptatem id cumque. Maxime maxime provident minus et dolorem recusandae. Molestias deserunt facilis amet sit quis voluptas voluptate. Repudiandae recusandae iste tempora sed quam est.', NULL, '2026-02-08 08:38:29', '2026-02-08 08:38:29'),
	(11, 1, 3, 'Et mollitia error maxime pariatur.', 'quaerat-est-ut-et-voluptatem', 'Aut rem molestiae accusamus et vel eaque et sit quia ullam est et cupiditate.', 'Sunt iste temporibus nobis perferendis tempore sunt sunt. Consequuntur omnis id voluptatem odio blanditiis quia quia et. Non mollitia et possimus nam consectetur. Aliquid dicta cupiditate velit quam blanditiis. Fugit veritatis maxime maiores rerum.', NULL, '2026-02-08 08:38:29', '2026-02-08 08:38:29'),
	(12, 2, 1, 'Dolores sit illo porro ut consectetur.', 'omnis-eveniet-dolorum-quo-dolor-est-qui-veniam', 'Fugiat ipsam ullam aliquam quo nostrum ut rem consequatur ea atque atque excepturi alias quibusdam dolorem unde fugiat quod.', 'Incidunt omnis officiis dolore enim. Tempore recusandae officiis enim delectus exercitationem fugit eveniet. Quasi sunt magni quisquam aspernatur officia sed perferendis. Et minus nostrum nihil quam culpa saepe quia sit. Quia nulla inventore nihil illo voluptas culpa nulla. Consequatur alias quasi quaerat tenetur quia velit ipsa voluptatem. Quia rerum numquam adipisci esse saepe error animi. Odit ullam autem ex qui. Rerum natus dolorum commodi laudantium saepe fugit nihil. Omnis voluptatibus architecto reprehenderit sed esse. Quam odio explicabo saepe ea molestiae. Odit omnis dolorem consequatur voluptas aut ut aut sapiente. Numquam quo ipsum voluptatem voluptas aut ipsa.', NULL, '2026-02-08 08:38:29', '2026-02-08 08:38:29'),
	(13, 1, 1, 'Reprehenderit aut cupiditate ad.', 'voluptatem-quas-incidunt-distinctio-quos-tenetur', 'Dolorum nihil repellendus aut nisi magnam dolorum optio iste dolor reprehenderit magni provident earum libero quod aut perferendis et aspernatur et porro qui quidem voluptatem.', 'Odit sapiente voluptatem fugit qui est voluptatibus quo. Veniam harum dolorem nisi est qui explicabo ipsam. Quia aliquam dolorem error quia. Incidunt iste nulla qui provident qui dolores facilis rem. Dolorum dolore cumque nesciunt harum veritatis exercitationem. Nostrum quia nostrum quaerat aut odit ut. Molestiae autem suscipit ullam dicta voluptas minima est. Qui facere id numquam consequatur quis consequatur. Molestias accusamus cumque quibusdam nostrum autem aspernatur voluptas. Commodi qui ipsa in similique ducimus at qui laboriosam. Ut illum asperiores suscipit quasi et nostrum minima. Ab dolor voluptatem rerum iste unde. Et deserunt doloremque sed vitae.', NULL, '2026-02-08 08:38:29', '2026-02-08 08:38:29'),
	(14, 2, 2, 'Repellat sed recusandae.', 'eos-consequuntur-deleniti-repellat-illum', 'Libero et modi facere omnis non sit qui aperiam dolor quae a ut fugit sit quia praesentium.', 'Consequatur ratione labore quidem sit dolores accusantium. Enim eos rem quisquam. Velit et ea amet enim facilis distinctio dignissimos hic. Optio ducimus qui dolores minima aut est sit. Similique consequatur ipsa enim minima. Accusamus eveniet quisquam quia consectetur. Praesentium voluptas illum esse illo officia consectetur sint autem.', NULL, '2026-02-08 08:38:29', '2026-02-08 08:38:29'),
	(15, 1, 1, 'Fuga ullam aut delectus amet.', 'autem-saepe-et-labore-ut-ratione', 'Fugit quam eius sunt debitis architecto voluptatem expedita cum est aut quia et praesentium ut esse omnis aut.', 'Est dolorem ut fugiat. Quam perspiciatis omnis quasi voluptate illum nihil. Nemo voluptatibus repellendus recusandae consectetur. Delectus ullam eum officia et et nisi nihil.', NULL, '2026-02-08 08:38:29', '2026-02-08 08:38:29'),
	(16, 1, 3, 'Inventore asperiores aut optio.', 'molestiae-et-ipsum-corporis-in-eius-sint-adipisci', 'Amet sed dolores ratione asperiores vel amet sint laudantium voluptatibus ut et.', 'Ut sequi deserunt explicabo id. Enim molestiae aut sunt incidunt iusto aut. Animi illo tempore minima aut quaerat accusamus rerum. Praesentium quod optio aspernatur ea hic. Qui architecto error a laborum facere vel. Ducimus culpa tenetur est neque facilis dolores quam autem. Et ad explicabo ipsum eligendi. Unde odit doloribus soluta excepturi tempore. Ut et reiciendis voluptas sequi sit adipisci tempore.', NULL, '2026-02-08 08:38:29', '2026-02-08 08:38:29'),
	(17, 2, 2, 'Illum quas corporis quia nobis natus aut iure ullam earum.', 'magni-cumque-quia-praesentium-aliquam-qui-voluptatem-amet', 'Aut aut odit laborum magni a maxime eveniet non libero eaque aut quisquam aut non sit esse sunt.', 'Velit fuga omnis impedit occaecati esse sed iure. Fuga ut quis omnis dolor cupiditate iusto. Molestiae ad possimus cupiditate commodi quaerat. Totam corrupti saepe similique et accusantium alias. Similique sed numquam magni accusamus necessitatibus doloremque. Corrupti dolor dolorem molestiae quaerat ea dolorem odio.', NULL, '2026-02-08 08:38:29', '2026-02-08 08:38:29'),
	(18, 1, 2, 'Amet nihil laudantium unde quo quam quos doloribus.', 'ducimus-aut-vitae-ut-autem-alias-consequatur-facilis-ipsa', 'Consequatur quaerat voluptatibus qui nostrum sint nostrum quam quaerat provident atque omnis ut quos quis ex explicabo repellendus unde sit qui odio rerum velit et nisi molestiae sunt voluptatum et minima.', 'Ea nam voluptatem neque est nesciunt. Aut molestiae atque sint eaque sed quaerat et. Dolorem accusamus ab reprehenderit. Amet nisi odit quam. Molestiae quia sapiente voluptas tempora velit sit aliquam. Saepe enim molestias maiores quasi consequatur eveniet eius. Odio quasi omnis debitis et sed. Dolorem eaque consequatur quia iste et unde. Explicabo deserunt in ut nemo. Pariatur quia consequatur maxime aut delectus magni vel. Ea excepturi laudantium et sapiente aut. Velit libero suscipit neque. Cum magnam officiis quam rerum.', NULL, '2026-02-08 08:38:29', '2026-02-08 08:38:29'),
	(19, 2, 2, 'Pariatur eveniet qui.', 'rem-fuga-dolorem-ullam-earum', 'Accusamus ipsam et ipsum accusamus incidunt fugit pariatur amet rerum dolorem tenetur qui omnis alias odit et fugit voluptas aliquid earum nam nihil veritatis voluptatem non corrupti veniam quia vel.', 'Reiciendis distinctio illum ea rerum aut atque. Ut dignissimos saepe ut ipsa expedita quia. Qui in adipisci blanditiis est at. Eveniet consequatur quo non et dolorem. Repellat ex omnis et autem et. Consequatur et unde et veritatis aliquam quo. Omnis ut ducimus ullam ut quo amet earum. Et deserunt corporis est natus expedita rerum. Hic ut ea excepturi voluptatem vel consequatur ullam. Aut hic at quidem totam exercitationem. Impedit est velit voluptas dolor. Omnis doloremque assumenda occaecati.', NULL, '2026-02-08 08:38:29', '2026-02-08 08:38:29'),
	(20, 2, 3, 'Corrupti illo alias ullam.', 'quia-dolor-et-dolor-fugiat-quos-libero-aspernatur', 'Aut reprehenderit nam vitae perferendis aliquam consequatur debitis rerum enim nostrum qui cumque ab qui quasi ullam fugit sunt.', 'Voluptatum rem culpa magni consequuntur praesentium qui atque. Nemo architecto quia nam. Fugiat ut laboriosam deserunt qui necessitatibus. Quidem quia error numquam qui nostrum illum. Nihil itaque corrupti autem id. Laborum non placeat iusto molestiae illo repellendus.', NULL, '2026-02-08 08:38:29', '2026-02-08 08:38:29');

-- Dumping structure for table ferdy_blog.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table ferdy_blog.users: ~2 rows (approximately)
INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Rizki Wawan Anggriawan M.M.', 'ira56', 'rahmawati.pangestu@example.org', '2026-02-08 08:38:29', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '6TklJ9P1Qv', '2026-02-08 08:38:29', '2026-02-08 08:38:29'),
	(2, 'Putri Aryani', 'najmudin.estiono', 'nsuryatmi@example.com', '2026-02-08 08:38:29', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'X61GqAuK1E', '2026-02-08 08:38:29', '2026-02-08 08:38:29'),
	(3, 'Mursita Suryono', 'wulandari.icha', 'cayadi74@example.org', '2026-02-08 08:38:29', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'PY1UNgb9KB', '2026-02-08 08:38:29', '2026-02-08 08:38:29');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
