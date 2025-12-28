#!/bin/bash
# Script de déploiement pour ravignon-enzo.fr

set -e

echo "🚀 Déploiement en production..."

# 1. Clear cache
echo "🧹 Nettoyage du cache..."
docker compose -f compose.yaml -f compose.prod.yaml exec php bin/console cache:clear --env=prod --no-warmup

# 2. Warmup cache
echo "🔥 Préchauffage du cache..."
docker compose -f compose.yaml -f compose.prod.yaml exec php bin/console cache:warmup --env=prod

# 3. Dump routes (pour debug)
echo "📋 Liste des routes disponibles:"
docker compose -f compose.yaml -f compose.prod.yaml exec php bin/console debug:router --env=prod

# 4. Check database connection
echo "🔌 Vérification de la connexion DB..."
docker compose -f compose.yaml -f compose.prod.yaml exec php bin/console dbal:run-sql "SELECT 1" --env=prod

echo "✅ Déploiement terminé!"
