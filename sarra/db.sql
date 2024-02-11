CREATE TABLE `etablissments` (
    `id` bigint NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `address` varchar(255) DEFAULT NULL,
    `numero` varchar(20) DEFAULT NULL,
    `email` varchar(255) NOT NULL UNIQUE,
    PRIMARY KEY (`id`),
);

CREATE TABLE `stage` (
    `id` bigint NOT NULL AUTO_INCREMENT,
    `stagiaire_id` bigint NOT NULL,
    `e_name` varchar(255) NOT NULL,
    `sujet` varchar(255) DEFAULT NULL,
    `date` varchar(20) DEFAULT NULL,
    PRIMARY KEY (`id`),
    FOREIGN KEY (stagiaire_id) REFERENCES stagiare(id)
);

CREATE TABLE `stagiare` (
    `id` bigint NOT NULL AUTO_INCREMENT,
    `etablissment_id` bigint NOT NULL,
    `name` varchar(255) NOT NULL,
    `addresse` varchar(255) DEFAULT NULL,
    `numero` varchar(20) DEFAULT NULL,
    `email` varchar(50) NOT NULL UNIQUE,
    PRIMARY KEY (`id`),
    UNIQUE KEY `email` (`email`),
    FOREIGN KEY (etablissment_id) REFERENCES etablissments(id),
);