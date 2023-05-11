-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Май 02 2023 г., 11:14
-- Версия сервера: 10.4.24-MariaDB
-- Версия PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `hairdressing_salon`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(9) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `cost_lower` double(6,2) NOT NULL,
  `cost_upper` double(6,2) DEFAULT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `color` enum('primary','secondary','success','danger','warning','info','light','dark','white') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`, `cost_lower`, `cost_upper`, `label`, `color`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Женская стрижка', 15.00, 20.00, NULL, 'warning', '2023-02-21 09:50:08', '2023-02-21 09:50:08', NULL),
(2, 'Окрашивание корней', 20.00, NULL, NULL, 'danger', '2023-02-21 09:50:48', '2023-02-21 09:50:48', NULL),
(3, 'Макияж', 15.00, 20.00, 'Top', 'info', '2023-02-21 10:43:28', '2023-02-21 10:43:28', NULL),
(14, 'Мужская стрижка', 7.00, 15.00, '<i class=\"fas fa-thumbs-up\"></i> <i class=\"fas fa-thumbs-up\"></i>', 'primary', '2023-02-27 10:26:06', '2023-04-30 19:50:18', NULL),
(15, 'Мэйкап для праздника', 30.00, 70.00, '<i class=\"fa-brands fa-gratipay\"></i>', 'secondary', '2023-02-27 10:26:19', '2023-04-30 19:51:07', NULL),
(16, 'Покраска', 30.00, NULL, 'Top', 'success', '2023-02-27 10:26:34', '2023-04-30 19:54:21', NULL),
(17, 'danger', 1.00, NULL, '<i class=\"fas fa-heart\"></i>', 'danger', '2023-02-27 10:26:51', '2023-02-27 19:13:29', '2023-02-27 19:13:29'),
(19, 'info', 1.00, NULL, 'Top', 'info', '2023-02-27 10:27:20', '2023-03-27 19:14:47', '2023-03-27 19:14:47');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(9) NOT NULL,
  `gallery_id` int(9) NOT NULL,
  `user_id` int(9) NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `gallery_id`, `user_id`, `body`, `created_at`, `updated_at`, `deleted_at`) VALUES
(17, 6, 11, 'delete user', '2023-03-24 19:31:06', '2023-03-24 19:31:06', NULL),
(20, 4, 22, 'ertyjk,mnbvcxxcv', '2023-04-15 17:31:49', '2023-04-15 17:31:49', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE `gallery` (
  `id` int(9) NOT NULL,
  `category_id` int(9) NOT NULL,
  `service_id` int(9) DEFAULT NULL,
  `image` text COLLATE utf8_unicode_ci NOT NULL,
  `publishing` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `gallery`
--

INSERT INTO `gallery` (`id`, `category_id`, `service_id`, `image`, `publishing`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 1, NULL, 'image0.jpeg', 1, '2023-02-20 19:51:09', '2023-05-02 09:07:50', NULL),
(4, 16, NULL, 'image11.jpeg', 1, '2023-02-21 19:51:09', '2023-04-15 17:29:26', NULL),
(5, 15, NULL, 'image12.jpeg', 1, '2023-02-21 19:52:19', '2023-05-02 09:08:08', NULL),
(6, 3, NULL, 'image21.jpeg', 1, '2023-02-22 19:52:19', '2023-03-27 19:17:14', NULL),
(7, 2, NULL, 'image22.jpeg', 1, '2023-02-22 19:52:19', '2023-04-15 17:30:14', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `services`
--

CREATE TABLE `services` (
  `id` int(9) NOT NULL,
  `category_id` int(9) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `services`
--

INSERT INTO `services` (`id`, `category_id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 'hgyfdz', '2023-02-21 17:43:05', '2023-02-21 19:43:05', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(9) NOT NULL,
  `user_id` int(9) NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `testimonials`
--

INSERT INTO `testimonials` (`id`, `user_id`, `body`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 5, 'Делаю прически здесь уже не первый раз. Всегда круто получается. Соотношение цена-качество 5 баллов!!!', '2023-03-23 09:14:28', '2023-03-23 09:14:28', NULL),
(7, 5, 'Это просто вау!!! Больше никуда не пойду, только к Ксюше', '2023-03-23 09:14:50', '2023-03-23 09:14:50', NULL),
(9, 11, 'Ксюша, ты молодец. Продолжай в том же духе. Успехов тебе в твоем деле', '2023-03-23 09:16:27', '2023-03-23 09:16:27', NULL),
(12, 11, 'Отличное место. Ксения классный мастер. Прятно иметь дело. Ркомендую', '2023-03-24 13:47:50', '2023-03-24 13:47:50', NULL),
(13, 23, 'Делала тут макияж для праздника. Очень понравилось. Обязательно сюда вернусь', '2023-03-25 10:04:00', '2023-03-25 10:04:00', NULL),
(14, 22, 'Делал стрижку. Классный мастер. Понимает с полуслова. Просто огонь!!!', '2023-03-25 10:44:24', '2023-03-25 10:44:24', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(9) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` enum('admin','manager','user') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user',
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'avatar.jpg',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `phone`, `password`, `role`, `avatar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin@hr.hr', 'adminNn', '86468481', '$2y$10$JuKJ4tBSkDfuCFk7sQKVxeEnC1fOfBIamAzzuW1eKZzrWHJ/xp9lS', 'admin', 'DSC_2215.JPG', '2023-02-20 14:32:05', '2023-03-24 19:19:24', '2023-03-24 19:19:24'),
(5, 'manager@hr.hr', 'Светик', '78909876', '$2y$10$v/d8eEBUL6/5kt1xsD4KG.JWzQ.RXCVHCNidXIp1LND/zvGymrCrG', 'manager', 'cat.png', '2023-02-20 14:58:00', '2023-03-21 16:04:00', NULL),
(10, 'qwert@ee.ee', 'qwert', NULL, '$2y$10$7752vhotRL2DDBsAtMOlc.LiZs.SK2EjPDN1I2MEc/RM8pCgDV39q', 'user', 'avatar.jpg', '2023-03-01 11:17:22', '2023-03-01 11:37:10', '2023-03-01 11:37:10'),
(11, 'user@hr.hr', 'Мария', '456798811', '$2y$10$GOhDR5hcgjgjUgcsYuTLY.EF713V7YolLysFiXoYEeg1iohn49mA2', 'user', 'DSC_0062.JPG', '2023-03-21 15:26:09', '2023-03-24 19:33:59', '2023-03-24 19:33:59'),
(22, 'and@hr.hr', 'Андрей', NULL, '$2y$10$nmoY4ZJ5TlZI52RNhsYNluPwmJg2RhixHppYxL.sWw2oMC9fBhXOa', 'admin', 'DSC_2215.JPG', '2023-03-24 19:13:26', '2023-03-24 19:19:01', NULL),
(23, 'andr@hr.hr', 'СК', '2345678', '$2y$10$x5VvTu2DoDyR49P8.ROGwOevdbDkSMVmNpB2OBGuB6J1K9nin5ULS', 'admin', 'avatar.jpg', '2023-03-25 10:02:47', '2023-03-25 10:05:30', '2023-03-25 10:05:30'),
(24, 'dim@hr.hr', 'Ольга', '78945', '$2y$10$2tP3b0qxn753VNmS5CbdY.jP.gxwy3g8Su1EN3W7gb8c/RiI1YaeG', 'user', 'avatar.jpg', '2023-03-25 10:14:50', '2023-03-25 10:14:50', NULL),
(25, 'werta@hr.hr', 'werta', NULL, '$2y$10$6eJ3KcjiKxSfJz0XIxtiYev5349XSrWAUo/Hyd2C95rz0lZLO3cCi', 'manager', 'avatar.jpg', '2023-03-26 18:13:30', '2023-03-26 18:13:30', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_fk_user` (`user_id`),
  ADD KEY `comments_fk_gallery` (`gallery_id`);

--
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `category_id` (`category_id`) USING BTREE;

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_fk_categories` (`category_id`);

--
-- Индексы таблицы `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `testimonials_fk_users` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `services`
--
ALTER TABLE `services`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_fk_gallery` FOREIGN KEY (`gallery_id`) REFERENCES `gallery` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comments_fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `gallery_fk_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `gallery_fk_service` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);

--
-- Ограничения внешнего ключа таблицы `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_fk_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Ограничения внешнего ключа таблицы `testimonials`
--
ALTER TABLE `testimonials`
  ADD CONSTRAINT `testimonials_fk_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
