#
# Build: docker build -t lib-hl7v2-dev .
#
# Run:
#    docker run -it --rm \
#    --mount type=bind,source=$(pwd),target=/home/devel/proj \
#    --name "lib-hl7v2" \
#    "lib-hl7v2-dev" \
#    "$@"
#

FROM php:7-cli-alpine

RUN apk add --no-cache --virtual .persistent-deps \
		git \
		icu-libs \
		zlib

RUN set -xe \
	&& apk add --no-cache --virtual .build-deps \
		$PHPIZE_DEPS \
		icu-dev \
		zlib-dev \
	&& docker-php-ext-install \
		bcmath \
		intl \
		zip \
	&& docker-php-ext-enable --ini-name 05-opcache.ini opcache \
	&& apk del .build-deps

COPY docker/php.ini /usr/local/etc/php/php.ini

COPY --from=composer /usr/bin/composer /usr/bin/composer

# Set up the user
ARG UNAME=devel
ARG UID=1000
ARG GID=1000
ARG HOME=/home/${UNAME}
RUN adduser -D -g '' -u ${UID} ${UNAME}

ENV HOME=${HOME}

USER ${UNAME}

RUN mkdir ${HOME}/proj

WORKDIR ${HOME}/proj
