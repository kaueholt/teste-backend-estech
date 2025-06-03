#!/bin/bash
set -e

chown -R "$HOST_UID":"$HOST_UID" /var/www
exec gosu "$HOST_USER" "$@"
exec "$@"