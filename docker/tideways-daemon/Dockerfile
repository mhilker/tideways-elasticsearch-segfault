FROM debian:stable-slim

RUN apt-get update \
 && apt-get install -yq --no-install-recommends gnupg2 curl sudo ca-certificates

RUN echo 'deb http://s3-eu-west-1.amazonaws.com/tideways/packages debian main' > /etc/apt/sources.list.d/tideways.list \
 && curl -sS 'https://s3-eu-west-1.amazonaws.com/tideways/packages/EEB5E8F4.gpg' | apt-key add - \
 && DEBIAN_FRONTEND=noninteractive apt-get update \
 && apt-get install -yq tideways-daemon \
 && apt-get autoremove --assume-yes \
 && apt-get clean \
 && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

ENTRYPOINT ["tideways-daemon","--hostname=tideways-daemon","--address=0.0.0.0:9135"]
