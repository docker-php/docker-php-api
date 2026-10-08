<?php

declare(strict_types=1);

namespace Docker\API;

class Client extends Runtime\Client\Client
{
    /**
     * Returns a list of containers. For details on the format, see the
     * [inspect endpoint](#operation/ContainerInspect).
     *
     * Note that it uses a different, smaller representation of a container
     * than inspecting a single container. For example, the list of linked
     * containers is not propagated .
     *
     * @param array{
     *    "all"?: bool, //Return all containers. By default, only running containers are shown.
     *    "limit"?: int, //Return this number of most recently created containers, including
     * non-running ones.
     *    "size"?: bool, //Return the size of container as fields `SizeRw` and `SizeRootFs`.
     *    "filters"?: string, //Filters to process on the container list, encoded as JSON (a
     * `map[string][]string`). For example, `{"status": ["paused"]}` will
     * only return paused containers.
     *
     * Available filters:
     *
     * - `ancestor`=(`<image-name>[:<tag>]`, `<image id>`, or `<image@digest>`)
     * - `before`=(`<container id>` or `<container name>`)
     * - `expose`=(`<port>[/<proto>]`|`<startport-endport>/[<proto>]`)
     * - `exited=<int>` containers with exit code of `<int>`
     * - `health`=(`starting`|`healthy`|`unhealthy`|`none`)
     * - `id=<ID>` a container's ID
     * - `isolation=`(`default`|`process`|`hyperv`) (Windows daemon only)
     * - `is-task=`(`true`|`false`)
     * - `label=key` or `label="key=value"` of a container label
     * - `name=<name>` a container's name
     * - `network`=(`<network id>` or `<network name>`)
     * - `publish`=(`<port>[/<proto>]`|`<startport-endport>/[<proto>]`)
     * - `since`=(`<container id>` or `<container name>`)
     * - `status=`(`created`|`restarting`|`running`|`removing`|`paused`|`exited`|`dead`)
     * - `volume`=(`<volume name>` or `<mount point destination>`)
     * } $queryParameters
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ContainerListBadRequestException
     * @throws Exception\ContainerListInternalServerErrorException
     *
     * @return ($fetch is 'object' ? Model\ContainerSummary[]|null : \Psr\Http\Message\ResponseInterface)
     */
    public function containerList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ContainerList($queryParameters), $fetch);
    }

    /**
     * @param array{
     *    "name"?: string, //Assign the specified name to the container. Must match
     * `/?[a-zA-Z0-9][a-zA-Z0-9_.-]+`.
     *    "platform"?: string, //Platform in the format `os[/arch[/variant]]` used for image lookup.
     *
     * When specified, the daemon checks if the requested image is present
     * in the local image cache with the given OS and Architecture, and
     * otherwise returns a `404` status.
     *
     * If the option is not set, the host's native OS and Architecture are
     * used to look up the image in the image cache. However, if no platform
     * is passed and the given image does exist in the local image cache,
     * but its OS or architecture does not match, the container is created
     * with the available image, and a warning is added to the `Warnings`
     * field in the response, for example;
     *
     * WARNING: The requested image's platform (linux/arm64/v8) does not
     * match the detected host platform (linux/amd64) and no
     * specific platform was requested
     * } $queryParameters
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ContainerCreateBadRequestException
     * @throws Exception\ContainerCreateNotFoundException
     * @throws Exception\ContainerCreateConflictException
     * @throws Exception\ContainerCreateInternalServerErrorException
     *
     * @return ($fetch is 'object' ? Model\ContainerCreateResponse|null : \Psr\Http\Message\ResponseInterface)
     */
    public function containerCreate(?Model\ContainersCreatePostBody $requestBody = null, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ContainerCreate($requestBody, $queryParameters), $fetch);
    }

    /**
     * Return low-level information about a container.
     *
     * @param string $id ID or name of the container
     * @param array{
     *    "size"?: bool, //Return the size of container as fields `SizeRw` and `SizeRootFs`
     * } $queryParameters
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ContainerInspectNotFoundException
     * @throws Exception\ContainerInspectInternalServerErrorException
     *
     * @return ($fetch is 'object' ? Model\ContainersIdJsonGetResponse200|null : \Psr\Http\Message\ResponseInterface)
     */
    public function containerInspect(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ContainerInspect($id, $queryParameters), $fetch);
    }

    /**
     * On Unix systems, this is done by running the `ps` command. This endpoint
     * is not supported on Windows.
     *
     * @param string $id ID or name of the container
     * @param array{
     *    "ps_args"?: string, //The arguments to pass to `ps`. For example, `aux`
     * } $queryParameters
     * @param array  $accept Accept content header application/json|text/plain
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ContainerTopNotFoundException
     * @throws Exception\ContainerTopInternalServerErrorException
     *
     * @return ($fetch is 'object' ? Model\ContainersIdTopGetJsonResponse200|null : \Psr\Http\Message\ResponseInterface)
     */
    public function containerTop(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\ContainerTop($id, $queryParameters, $accept), $fetch);
    }

    /**
     * Get `stdout` and `stderr` logs from a container.
     *
     * Note: This endpoint works only for containers with the `json-file` or
     * `journald` logging driver.
     *
     * @param string $id ID or name of the container
     * @param array{
     *    "follow"?: bool, //Keep connection after returning logs.
     *    "stdout"?: bool, //Return logs from `stdout`
     *    "stderr"?: bool, //Return logs from `stderr`
     *    "since"?: int, //Only return logs since this time, as a UNIX timestamp
     *    "until"?: int, //Only return logs before this time, as a UNIX timestamp
     *    "timestamps"?: bool, //Add timestamps to every log line
     *    "tail"?: string, //Only return this number of log lines from the end of the logs.
     * Specify as an integer or `all` to output all log lines.
     * } $queryParameters
     * @param array  $accept Accept content header application/vnd.docker.raw-stream|application/vnd.docker.multiplexed-stream|application/json
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ContainerLogsNotFoundException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function containerLogs(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\ContainerLogs($id, $queryParameters, $accept), $fetch);
    }

    /**
     * Returns which files in a container's filesystem have been added, deleted,
     * or modified. The `Kind` of modification can be one of:
     *
     * - `0`: Modified ("C")
     * - `1`: Added ("A")
     * - `2`: Deleted ("D")
     *
     * @param string $id    ID or name of the container
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ContainerChangesNotFoundException
     * @throws Exception\ContainerChangesInternalServerErrorException
     *
     * @return ($fetch is 'object' ? Model\FilesystemChange[]|null : \Psr\Http\Message\ResponseInterface)
     */
    public function containerChanges(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ContainerChanges($id), $fetch);
    }

    /**
     * Export the contents of a container as a tarball.
     *
     * @param string $id     ID or name of the container
     * @param array  $accept Accept content header application/octet-stream|application/json
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ContainerExportNotFoundException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function containerExport(string $id, string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\ContainerExport($id, $accept), $fetch);
    }

    /**
     * This endpoint returns a live stream of a container’s resource usage
     * statistics.
     *
     * The `precpu_stats` is the CPU statistic of the *previous* read, and is
     * used to calculate the CPU usage percentage. It is not an exact copy
     * of the `cpu_stats` field.
     *
     * If either `precpu_stats.online_cpus` or `cpu_stats.online_cpus` is
     * nil then for compatibility with older daemons the length of the
     * corresponding `cpu_usage.percpu_usage` array should be used.
     *
     * On a cgroup v2 host, the following fields are not set
     * * `blkio_stats`: all fields other than `io_service_bytes_recursive`
     * * `cpu_stats`: `cpu_usage.percpu_usage`
     * * `memory_stats`: `max_usage` and `failcnt`
     * Also, `memory_stats.stats` fields are incompatible with cgroup v1.
     *
     * To calculate the values shown by the `stats` command of the docker cli tool
     * the following formulas can be used:
     * * used_memory = `memory_stats.usage - memory_stats.stats.cache` (cgroups v1)
     * * used_memory = `memory_stats.usage - memory_stats.stats.inactive_file` (cgroups v2)
     * * available_memory = `memory_stats.limit`
     * * Memory usage % = `(used_memory / available_memory) * 100.0`
     * * cpu_delta = `cpu_stats.cpu_usage.total_usage - precpu_stats.cpu_usage.total_usage`
     * * system_cpu_delta = `cpu_stats.system_cpu_usage - precpu_stats.system_cpu_usage`
     * * number_cpus = `length(cpu_stats.cpu_usage.percpu_usage)` or `cpu_stats.online_cpus`
     * * CPU usage % = `(cpu_delta / system_cpu_delta) * number_cpus * 100.0`
     *
     * @param string $id ID or name of the container
     * @param array{
     *    "stream"?: bool, //Stream the output. If false, the stats will be output once and then
     * it will disconnect.
     *    "one-shot"?: bool, //Only get a single stat instead of waiting for 2 cycles. Must be used
     * with `stream=false`.
     * } $queryParameters
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ContainerStatsNotFoundException
     * @throws Exception\ContainerStatsInternalServerErrorException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function containerStats(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ContainerStats($id, $queryParameters), $fetch);
    }

    /**
     * Resize the TTY for a container.
     *
     * @param string $id ID or name of the container
     * @param array{
     *    "h": int, //Height of the TTY session in characters
     *    "w": int, //Width of the TTY session in characters
     * } $queryParameters
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ContainerResizeNotFoundException
     * @throws Exception\ContainerResizeInternalServerErrorException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function containerResize(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ContainerResize($id, $queryParameters), $fetch);
    }

    /**
     * @param string $id ID or name of the container
     * @param array{
     *    "detachKeys"?: string, //Override the key sequence for detaching a container. Format is a
     * single character `[a-Z]` or `ctrl-<value>` where `<value>` is one
     * of: `a-z`, `@`, `^`, `[`, `,` or `_`.
     * } $queryParameters
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ContainerStartBadRequestException
     * @throws Exception\ContainerStartNotFoundException
     * @throws Exception\ContainerStartInternalServerErrorException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function containerStart(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ContainerStart($id, $queryParameters), $fetch);
    }

    /**
     * @param string $id ID or name of the container
     * @param array{
     *    "signal"?: string, //Signal to send to the container as an integer or string (e.g. `SIGINT`).
     *    "t"?: int, //Number of seconds to wait before killing the container
     * } $queryParameters
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ContainerStopNotFoundException
     * @throws Exception\ContainerStopInternalServerErrorException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function containerStop(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ContainerStop($id, $queryParameters), $fetch);
    }

    /**
     * @param string $id ID or name of the container
     * @param array{
     *    "signal"?: string, //Signal to send to the container as an integer or string (e.g. `SIGINT`).
     *    "t"?: int, //Number of seconds to wait before killing the container
     * } $queryParameters
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ContainerRestartNotFoundException
     * @throws Exception\ContainerRestartInternalServerErrorException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function containerRestart(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ContainerRestart($id, $queryParameters), $fetch);
    }

    /**
     * Send a POSIX signal to a container, defaulting to killing to the
     * container.
     *
     * @param string $id ID or name of the container
     * @param array{
     *    "signal"?: string, //Signal to send to the container as an integer or string (e.g. `SIGINT`).
     * } $queryParameters
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ContainerKillNotFoundException
     * @throws Exception\ContainerKillConflictException
     * @throws Exception\ContainerKillInternalServerErrorException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function containerKill(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ContainerKill($id, $queryParameters), $fetch);
    }

    /**
     * Change various configuration options of a container without having to
     * recreate it.
     *
     * @param string $id    ID or name of the container
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ContainerUpdateNotFoundException
     * @throws Exception\ContainerUpdateInternalServerErrorException
     *
     * @return ($fetch is 'object' ? Model\ContainersIdUpdatePostResponse200|null : \Psr\Http\Message\ResponseInterface)
     */
    public function containerUpdate(string $id, ?Model\ContainersIdUpdatePostBody $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ContainerUpdate($id, $requestBody), $fetch);
    }

    /**
     * @param string $id ID or name of the container
     * @param array{
     *    "name": string, //New name for the container
     * } $queryParameters
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ContainerRenameNotFoundException
     * @throws Exception\ContainerRenameConflictException
     * @throws Exception\ContainerRenameInternalServerErrorException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function containerRename(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ContainerRename($id, $queryParameters), $fetch);
    }

    /**
     * Use the freezer cgroup to suspend all processes in a container.
     *
     * Traditionally, when suspending a process the `SIGSTOP` signal is used,
     * which is observable by the process being suspended. With the freezer
     * cgroup the process is unaware, and unable to capture, that it is being
     * suspended, and subsequently resumed.
     *
     * @param string $id    ID or name of the container
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ContainerPauseNotFoundException
     * @throws Exception\ContainerPauseInternalServerErrorException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function containerPause(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ContainerPause($id), $fetch);
    }

    /**
     * Resume a container which has been paused.
     *
     * @param string $id    ID or name of the container
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ContainerUnpauseNotFoundException
     * @throws Exception\ContainerUnpauseInternalServerErrorException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function containerUnpause(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ContainerUnpause($id), $fetch);
    }

    /**
     * Attach to a container to read its output or send it input. You can attach
     * to the same container multiple times and you can reattach to containers
     * that have been detached.
     *
     * Either the `stream` or `logs` parameter must be `true` for this endpoint
     * to do anything.
     *
     * See the [documentation for the `docker attach` command](https://docs.docker.com/engine/reference/commandline/attach/)
     * for more details.
     *
     * ### Hijacking
     *
     * This endpoint hijacks the HTTP connection to transport `stdin`, `stdout`,
     * and `stderr` on the same socket.
     *
     * This is the response from the daemon for an attach request:
     *
     * ```
     * HTTP/1.1 200 OK
     * Content-Type: application/vnd.docker.raw-stream
     *
     * [STREAM]
     * ```
     *
     * After the headers and two new lines, the TCP connection can now be used
     * for raw, bidirectional communication between the client and server.
     *
     * To hint potential proxies about connection hijacking, the Docker client
     * can also optionally send connection upgrade headers.
     *
     * For example, the client sends this request to upgrade the connection:
     *
     * ```
     * POST /containers/16253994b7c4/attach?stream=1&stdout=1 HTTP/1.1
     * Upgrade: tcp
     * Connection: Upgrade
     * ```
     *
     * The Docker daemon will respond with a `101 UPGRADED` response, and will
     * similarly follow with the raw stream:
     *
     * ```
     * HTTP/1.1 101 UPGRADED
     * Content-Type: application/vnd.docker.raw-stream
     * Connection: Upgrade
     * Upgrade: tcp
     *
     * [STREAM]
     * ```
     *
     * ### Stream format
     *
     * When the TTY setting is disabled in [`POST /containers/create`](#operation/ContainerCreate),
     * the HTTP Content-Type header is set to application/vnd.docker.multiplexed-stream
     * and the stream over the hijacked connected is multiplexed to separate out
     * `stdout` and `stderr`. The stream consists of a series of frames, each
     * containing a header and a payload.
     *
     * The header contains the information which the stream writes (`stdout` or
     * `stderr`). It also contains the size of the associated frame encoded in
     * the last four bytes (`uint32`).
     *
     * It is encoded on the first eight bytes like this:
     *
     * ```go
     * header := [8]byte{STREAM_TYPE, 0, 0, 0, SIZE1, SIZE2, SIZE3, SIZE4}
     * ```
     *
     * `STREAM_TYPE` can be:
     *
     * - 0: `stdin` (is written on `stdout`)
     * - 1: `stdout`
     * - 2: `stderr`
     *
     * `SIZE1, SIZE2, SIZE3, SIZE4` are the four bytes of the `uint32` size
     * encoded as big endian.
     *
     * Following the header is the payload, which is the specified number of
     * bytes of `STREAM_TYPE`.
     *
     * The simplest way to implement this protocol is the following:
     *
     * 1. Read 8 bytes.
     * 2. Choose `stdout` or `stderr` depending on the first byte.
     * 3. Extract the frame size from the last four bytes.
     * 4. Read the extracted size and output it on the correct output.
     * 5. Goto 1.
     *
     * ### Stream format when using a TTY
     *
     * When the TTY setting is enabled in [`POST /containers/create`](#operation/ContainerCreate),
     * the stream is not multiplexed. The data exchanged over the hijacked
     * connection is simply the raw data from the process PTY and client's
     * `stdin`.
     *
     * @param string $id ID or name of the container
     * @param array{
     *    "detachKeys"?: string, //Override the key sequence for detaching a container.Format is a single
     * character `[a-Z]` or `ctrl-<value>` where `<value>` is one of: `a-z`,
     * `@`, `^`, `[`, `,` or `_`.
     *    "logs"?: bool, //Replay previous logs from the container.
     *
     * This is useful for attaching to a container that has started and you
     * want to output everything since the container started.
     *
     * If `stream` is also enabled, once all the previous output has been
     * returned, it will seamlessly transition into streaming current
     * output.
     *    "stream"?: bool, //Stream attached streams from the time the request was made onwards.
     *    "stdin"?: bool, //Attach to `stdin`
     *    "stdout"?: bool, //Attach to `stdout`
     *    "stderr"?: bool, //Attach to `stderr`
     * } $queryParameters
     * @param array  $accept Accept content header application/vnd.docker.raw-stream|application/vnd.docker.multiplexed-stream|application/json
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ContainerAttachNotFoundException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function containerAttach(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\ContainerAttach($id, $queryParameters, $accept), $fetch);
    }

    /**
     * @param string $id ID or name of the container
     * @param array{
     *    "detachKeys"?: string, //Override the key sequence for detaching a container.Format is a single
     * character `[a-Z]` or `ctrl-<value>` where `<value>` is one of: `a-z`,
     * `@`, `^`, `[`, `,`, or `_`.
     *    "logs"?: bool, //Return logs
     *    "stream"?: bool, //Return stream
     *    "stdin"?: bool, //Attach to `stdin`
     *    "stdout"?: bool, //Attach to `stdout`
     *    "stderr"?: bool, //Attach to `stderr`
     * } $queryParameters
     * @param array  $accept Accept content header application/json|text/plain
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ContainerAttachWebsocketBadRequestException
     * @throws Exception\ContainerAttachWebsocketNotFoundException
     * @throws Exception\ContainerAttachWebsocketInternalServerErrorException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function containerAttachWebsocket(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\ContainerAttachWebsocket($id, $queryParameters, $accept), $fetch);
    }

    /**
     * Block until a container stops, then returns the exit code.
     *
     * @param string $id ID or name of the container
     * @param array{
     *    "condition"?: string, //Wait until a container state reaches the given condition.
     *
     * Defaults to `not-running` if omitted or empty.
     * } $queryParameters
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ContainerWaitBadRequestException
     * @throws Exception\ContainerWaitNotFoundException
     * @throws Exception\ContainerWaitInternalServerErrorException
     *
     * @return ($fetch is 'object' ? Model\ContainerWaitResponse|null : \Psr\Http\Message\ResponseInterface)
     */
    public function containerWait(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ContainerWait($id, $queryParameters), $fetch);
    }

    /**
     * @param string $id ID or name of the container
     * @param array{
     *    "v"?: bool, //Remove anonymous volumes associated with the container.
     *    "force"?: bool, //If the container is running, kill it before removing it.
     *    "link"?: bool, //Remove the specified link associated with the container.
     * } $queryParameters
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ContainerDeleteBadRequestException
     * @throws Exception\ContainerDeleteNotFoundException
     * @throws Exception\ContainerDeleteConflictException
     * @throws Exception\ContainerDeleteInternalServerErrorException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function containerDelete(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ContainerDelete($id, $queryParameters), $fetch);
    }

    /**
     * Get a tar archive of a resource in the filesystem of container id.
     *
     * @param string $id ID or name of the container
     * @param array{
     *    "path": string, //Resource in the container’s filesystem to archive.
     * } $queryParameters
     * @param array  $accept Accept content header application/x-tar|application/json
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ContainerArchiveNotFoundException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function containerArchive(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\ContainerArchive($id, $queryParameters, $accept), $fetch);
    }

    /**
     * A response header `X-Docker-Container-Path-Stat` is returned, containing
     * a base64 - encoded JSON object with some filesystem header information
     * about the path.
     *
     * @param string $id ID or name of the container
     * @param array{
     *    "path": string, //Resource in the container’s filesystem to archive.
     * } $queryParameters
     * @param array  $accept Accept content header application/json|text/plain
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ContainerArchiveInfoBadRequestException
     * @throws Exception\ContainerArchiveInfoNotFoundException
     * @throws Exception\ContainerArchiveInfoInternalServerErrorException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function containerArchiveInfo(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\ContainerArchiveInfo($id, $queryParameters, $accept), $fetch);
    }

    /**
     * Upload a tar archive to be extracted to a path in the filesystem of container id.
     * `path` parameter is asserted to be a directory. If it exists as a file, 400 error
     * will be returned with message "not a directory".
     *
     * @param string                                                 $id          ID or name of the container
     * @param string|resource|\Psr\Http\Message\StreamInterface|null $requestBody
     * @param array{
     *    "path": string, //Path to a directory in the container to extract the archive’s contents into.
     *    "noOverwriteDirNonDir"?: string, //If `1`, `true`, or `True` then it will be an error if unpacking the
     * given content would cause an existing directory to be replaced with
     * a non-directory and vice versa.
     *    "copyUIDGID"?: string, //If `1`, `true`, then it will copy UID/GID maps to the dest file or
     * dir
     * } $queryParameters
     * @param array  $accept Accept content header application/json|text/plain
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\PutContainerArchiveBadRequestException
     * @throws Exception\PutContainerArchiveForbiddenException
     * @throws Exception\PutContainerArchiveNotFoundException
     * @throws Exception\PutContainerArchiveInternalServerErrorException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function putContainerArchive(string $id, $requestBody = null, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\PutContainerArchive($id, $requestBody, $queryParameters, $accept), $fetch);
    }

    /**
     * @param array{
     *    "filters"?: string, //Filters to process on the prune list, encoded as JSON (a `map[string][]string`).
     *
     * Available filters:
     * - `until=<timestamp>` Prune containers created before this timestamp. The `<timestamp>` can be Unix timestamps, date formatted timestamps, or Go duration strings (e.g. `10m`, `1h30m`) computed relative to the daemon machine’s time.
     * - `label` (`label=<key>`, `label=<key>=<value>`, `label!=<key>`, or `label!=<key>=<value>`) Prune containers with (or without, in case `label!=...` is used) the specified labels.
     * } $queryParameters
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ContainerPruneInternalServerErrorException
     *
     * @return ($fetch is 'object' ? Model\ContainersPrunePostResponse200|null : \Psr\Http\Message\ResponseInterface)
     */
    public function containerPrune(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ContainerPrune($queryParameters), $fetch);
    }

    /**
     * Returns a list of images on the server. Note that it uses a different, smaller representation of an image than inspecting a single image.
     *
     * @param array{
     *    "all"?: bool, //Show all images. Only images from a final layer (no children) are shown by default.
     *    "filters"?: string, //A JSON encoded value of the filters (a `map[string][]string`) to
     * process on the images list.
     *
     * Available filters:
     *
     * - `before`=(`<image-name>[:<tag>]`,  `<image id>` or `<image@digest>`)
     * - `dangling=true`
     * - `label=key` or `label="key=value"` of an image label
     * - `reference`=(`<image-name>[:<tag>]`)
     * - `since`=(`<image-name>[:<tag>]`,  `<image id>` or `<image@digest>`)
     * - `until=<timestamp>`
     *    "shared-size"?: bool, //Compute and show shared size as a `SharedSize` field on each image.
     *    "digests"?: bool, //Show digest information as a `RepoDigests` field on each image.
     * } $queryParameters
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ImageListInternalServerErrorException
     *
     * @return ($fetch is 'object' ? Model\ImageSummary[]|null : \Psr\Http\Message\ResponseInterface)
     */
    public function imageList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ImageList($queryParameters), $fetch);
    }

    /**
     * Build an image from a tar archive with a `Dockerfile` in it.
     *
     * The `Dockerfile` specifies how the image is built from the tar archive. It is typically in the archive's root, but can be at a different path or have a different name by specifying the `dockerfile` parameter. [See the `Dockerfile` reference for more information](https://docs.docker.com/engine/reference/builder/).
     *
     * The Docker daemon performs a preliminary validation of the `Dockerfile` before starting the build, and returns an error if the syntax is incorrect. After that, each instruction is run one-by-one until the ID of the new image is output.
     *
     * The build is canceled if the client drops the connection by quitting or being killed.
     *
     * @param string|resource|\Psr\Http\Message\StreamInterface|null $requestBody
     * @param array{
     *    "dockerfile"?: string, //Path within the build context to the `Dockerfile`. This is ignored if `remote` is specified and points to an external `Dockerfile`.
     *    "t"?: string, //A name and optional tag to apply to the image in the `name:tag` format. If you omit the tag the default `latest` value is assumed. You can provide several `t` parameters.
     *    "extrahosts"?: string, //Extra hosts to add to /etc/hosts
     *    "remote"?: string, //A Git repository URI or HTTP/HTTPS context URI. If the URI points to a single text file, the file’s contents are placed into a file called `Dockerfile` and the image is built from that file. If the URI points to a tarball, the file is downloaded by the daemon and the contents therein used as the context for the build. If the URI points to a tarball and the `dockerfile` parameter is also specified, there must be a file with the corresponding path inside the tarball.
     *    "q"?: bool, //Suppress verbose build output.
     *    "nocache"?: bool, //Do not use the cache when building the image.
     *    "cachefrom"?: string, //JSON array of images used for build cache resolution.
     *    "pull"?: string, //Attempt to pull the image even if an older image exists locally.
     *    "rm"?: bool, //Remove intermediate containers after a successful build.
     *    "forcerm"?: bool, //Always remove intermediate containers, even upon failure.
     *    "memory"?: int, //Set memory limit for build.
     *    "memswap"?: int, //Total memory (memory + swap). Set as `-1` to disable swap.
     *    "cpushares"?: int, //CPU shares (relative weight).
     *    "cpusetcpus"?: string, //CPUs in which to allow execution (e.g., `0-3`, `0,1`).
     *    "cpuperiod"?: int, //The length of a CPU period in microseconds.
     *    "cpuquota"?: int, //Microseconds of CPU time that the container can get in a CPU period.
     *    "buildargs"?: string, //JSON map of string pairs for build-time variables. Users pass these values at build-time. Docker uses the buildargs as the environment context for commands run via the `Dockerfile` RUN instruction, or for variable expansion in other `Dockerfile` instructions. This is not meant for passing secret values.
     *
     * For example, the build arg `FOO=bar` would become `{"FOO":"bar"}` in JSON. This would result in the query parameter `buildargs={"FOO":"bar"}`. Note that `{"FOO":"bar"}` should be URI component encoded.
     *
     * [Read more about the buildargs instruction.](https://docs.docker.com/engine/reference/builder/#arg)
     *    "shmsize"?: int, //Size of `/dev/shm` in bytes. The size must be greater than 0. If omitted the system uses 64MB.
     *    "squash"?: bool, //Squash the resulting images layers into a single layer. *(Experimental release only.)*
     *    "labels"?: string, //Arbitrary key/value labels to set on the image, as a JSON map of string pairs.
     *    "networkmode"?: string, //Sets the networking mode for the run commands during build. Supported
     * standard values are: `bridge`, `host`, `none`, and `container:<name|id>`.
     * Any other value is taken as a custom network's name or ID to which this
     * container should connect to.
     *    "platform"?: string, //Platform in the format os[/arch[/variant]]
     *    "target"?: string, //Target build stage
     *    "outputs"?: string, //BuildKit output configuration in the format of a stringified JSON array of objects.
     * Each object must have two top-level properties: `Type` and `Attrs`.
     * The `Type` property must be set to 'moby'.
     * The `Attrs` property is a map of attributes for the BuildKit output configuration.
     * See https://docs.docker.com/build/exporters/oci-docker/ for more information.
     *
     * Example:
     *
     * ```
     * [{"Type":"moby","Attrs":{"type":"image","force-compression":"true","compression":"zstd"}}]
     * ```
     *    "version"?: string, //Version of the builder backend to use.
     *
     * - `1` is the first generation classic (deprecated) builder in the Docker daemon (default)
     * - `2` is [BuildKit](https://github.com/moby/buildkit)
     * } $queryParameters
     * @param array{
     *    "Content-type"?: string,
     *    "X-Registry-Config"?: string, //This is a base64-encoded JSON object with auth configurations for multiple registries that a build may refer to.
     *
     * The key is a registry URL, and the value is an auth configuration object, [as described in the authentication section](#section/Authentication). For example:
     *
     * ```
     * {
     * "docker.example.com": {
     * "username": "janedoe",
     * "password": "hunter2"
     * },
     * "https://index.docker.io/v1/": {
     * "username": "mobydock",
     * "password": "conta1n3rize14"
     * }
     * }
     * ```
     *
     * Only the registry domain name (and port if not the default 443) are required. However, for legacy reasons, the Docker Hub registry must be specified with both a `https://` prefix and a `/v1/` suffix even though Docker will prefer to use the v2 registry API.
     * } $headerParameters
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ImageBuildBadRequestException
     * @throws Exception\ImageBuildInternalServerErrorException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function imageBuild($requestBody = null, array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ImageBuild($requestBody, $queryParameters, $headerParameters), $fetch);
    }

    /**
     * @param array{
     *    "keep-storage"?: int, //Amount of disk space in bytes to keep for cache
     *    "all"?: bool, //Remove all types of build cache
     *    "filters"?: string, //A JSON encoded value of the filters (a `map[string][]string`) to
     * process on the list of build cache objects.
     *
     * Available filters:
     *
     * - `until=<timestamp>` remove cache older than `<timestamp>`. The `<timestamp>` can be Unix timestamps, date formatted timestamps, or Go duration strings (e.g. `10m`, `1h30m`) computed relative to the daemon's local time.
     * - `id=<id>`
     * - `parent=<id>`
     * - `type=<string>`
     * - `description=<string>`
     * - `inuse`
     * - `shared`
     * - `private`
     * } $queryParameters
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\BuildPruneInternalServerErrorException
     *
     * @return ($fetch is 'object' ? Model\BuildPrunePostResponse200|null : \Psr\Http\Message\ResponseInterface)
     */
    public function buildPrune(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\BuildPrune($queryParameters), $fetch);
    }

    /**
     * Pull or import an image.
     *
     * @param array{
     *    "fromImage"?: string, //Name of the image to pull. The name may include a tag or digest. This parameter may only be used when pulling an image. The pull is cancelled if the HTTP connection is closed.
     *    "fromSrc"?: string, //Source to import. The value may be a URL from which the image can be retrieved or `-` to read the image from the request body. This parameter may only be used when importing an image.
     *    "repo"?: string, //Repository name given to an image when it is imported. The repo may include a tag. This parameter may only be used when importing an image.
     *    "tag"?: string, //Tag or digest. If empty when pulling an image, this causes all tags for the given image to be pulled.
     *    "message"?: string, //Set commit message for imported image.
     *    "changes"?: array, //Apply `Dockerfile` instructions to the image that is created,
     * for example: `changes=ENV DEBUG=true`.
     * Note that `ENV DEBUG=true` should be URI component encoded.
     * Repeat the parameter to apply multiple instructions.
     *
     * Supported `Dockerfile` instructions:
     * `CMD`|`ENTRYPOINT`|`ENV`|`EXPOSE`|`ONBUILD`|`USER`|`VOLUME`|`WORKDIR`
     *    "platform"?: string, //Platform in the format os[/arch[/variant]].
     *
     * When used in combination with the `fromImage` option, the daemon checks
     * if the given image is present in the local image cache with the given
     * OS and Architecture, and otherwise attempts to pull the image. If the
     * option is not set, the host's native OS and Architecture are used.
     * If the given image does not exist in the local image cache, the daemon
     * attempts to pull the image with the host's native OS and Architecture.
     * If the given image does exists in the local image cache, but its OS or
     * architecture does not match, a warning is produced.
     *
     * When used with the `fromSrc` option to import an image from an archive,
     * this option sets the platform information for the imported image. If
     * the option is not set, the host's native OS and Architecture are used
     * for the imported image.
     * } $queryParameters
     * @param array{
     *    "X-Registry-Auth"?: string, //A base64url-encoded auth configuration.
     *
     * Refer to the [authentication section](#section/Authentication) for
     * details.
     * } $headerParameters
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ImageCreateNotFoundException
     * @throws Exception\ImageCreateInternalServerErrorException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function imageCreate(?string $requestBody = null, array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ImageCreate($requestBody, $queryParameters, $headerParameters), $fetch);
    }

    /**
     * Return low-level information about an image.
     *
     * @param string $name  Image name or id
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ImageInspectNotFoundException
     * @throws Exception\ImageInspectInternalServerErrorException
     *
     * @return ($fetch is 'object' ? Model\ImageInspect|null : \Psr\Http\Message\ResponseInterface)
     */
    public function imageInspect(string $name, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ImageInspect($name), $fetch);
    }

    /**
     * Return parent layers of an image.
     *
     * @param string $name  Image name or ID
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ImageHistoryNotFoundException
     * @throws Exception\ImageHistoryInternalServerErrorException
     *
     * @return ($fetch is 'object' ? Model\ImageHistoryResponseItem[]|null : \Psr\Http\Message\ResponseInterface)
     */
    public function imageHistory(string $name, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ImageHistory($name), $fetch);
    }

    /**
     * Push an image to a registry.
     *
     * If you wish to push an image on to a private registry, that image must
     * already have a tag which references the registry. For example,
     * `registry.example.com/myimage:latest`.
     *
     * The push is cancelled if the HTTP connection is closed.
     *
     * @param string $name Name of the image to push. For example, `registry.example.com/myimage`.
     *                     The image must be present in the local image store with the same name.
     *
     * The name should be provided without tag; if a tag is provided, it
     * is ignored. For example, `registry.example.com/myimage:latest` is
     * considered equivalent to `registry.example.com/myimage`.
     *
     * Use the `tag` parameter to specify the tag to push.
     * @param array{
     *    "tag"?: string, //Tag of the image to push. For example, `latest`. If no tag is provided,
     * all tags of the given image that are present in the local image store
     * are pushed.
     * } $queryParameters
     * @param array{
     *    "X-Registry-Auth": string, //A base64url-encoded auth configuration.
     *
     * Refer to the [authentication section](#section/Authentication) for
     * details.
     * } $headerParameters
     * @param array  $accept Accept content header application/json|text/plain
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ImagePushNotFoundException
     * @throws Exception\ImagePushInternalServerErrorException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function imagePush(string $name, array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\ImagePush($name, $queryParameters, $headerParameters, $accept), $fetch);
    }

    /**
     * Create a tag that refers to a source image.
     *
     * This creates an additional reference (tag) to the source image. The tag
     * can include a different repository name and/or tag. If the repository
     * or tag already exists, it will be overwritten.
     *
     * @param string $name image name or ID to tag
     * @param array{
     *    "repo"?: string, //The repository to tag in. For example, `someuser/someimage`.
     *    "tag"?: string, //The name of the new tag.
     * } $queryParameters
     * @param array  $accept Accept content header application/json|text/plain
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ImageTagBadRequestException
     * @throws Exception\ImageTagNotFoundException
     * @throws Exception\ImageTagConflictException
     * @throws Exception\ImageTagInternalServerErrorException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function imageTag(string $name, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\ImageTag($name, $queryParameters, $accept), $fetch);
    }

    /**
     * Remove an image, along with any untagged parent images that were
     * referenced by that image.
     *
     * Images can't be removed if they have descendant images, are being
     * used by a running container or are being used by a build.
     *
     * @param string $name Image name or ID
     * @param array{
     *    "force"?: bool, //Remove the image even if it is being used by stopped containers or has other tags
     *    "noprune"?: bool, //Do not delete untagged parent images
     * } $queryParameters
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ImageDeleteNotFoundException
     * @throws Exception\ImageDeleteConflictException
     * @throws Exception\ImageDeleteInternalServerErrorException
     *
     * @return ($fetch is 'object' ? Model\ImageDeleteResponseItem[]|null : \Psr\Http\Message\ResponseInterface)
     */
    public function imageDelete(string $name, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ImageDelete($name, $queryParameters), $fetch);
    }

    /**
     * Search for an image on Docker Hub.
     *
     * @param array{
     *    "term": string, //Term to search
     *    "limit"?: int, //Maximum number of results to return
     *    "filters"?: string, //A JSON encoded value of the filters (a `map[string][]string`) to process on the images list. Available filters:
     *
     * - `is-official=(true|false)`
     * - `stars=<number>` Matches images that has at least 'number' stars.
     * } $queryParameters
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ImageSearchInternalServerErrorException
     *
     * @return ($fetch is 'object' ? Model\ImagesSearchGetResponse200Item[]|null : \Psr\Http\Message\ResponseInterface)
     */
    public function imageSearch(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ImageSearch($queryParameters), $fetch);
    }

    /**
     * @param array{
     *    "filters"?: string, //Filters to process on the prune list, encoded as JSON (a `map[string][]string`). Available filters:
     *
     * - `dangling=<boolean>` When set to `true` (or `1`), prune only
     * unused *and* untagged images. When set to `false`
     * (or `0`), all unused images are pruned.
     * - `until=<string>` Prune images created before this timestamp. The `<timestamp>` can be Unix timestamps, date formatted timestamps, or Go duration strings (e.g. `10m`, `1h30m`) computed relative to the daemon machine’s time.
     * - `label` (`label=<key>`, `label=<key>=<value>`, `label!=<key>`, or `label!=<key>=<value>`) Prune images with (or without, in case `label!=...` is used) the specified labels.
     * } $queryParameters
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ImagePruneInternalServerErrorException
     *
     * @return ($fetch is 'object' ? Model\ImagesPrunePostResponse200|null : \Psr\Http\Message\ResponseInterface)
     */
    public function imagePrune(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ImagePrune($queryParameters), $fetch);
    }

    /**
     * Validate credentials for a registry and, if available, get an identity
     * token for accessing the registry without password.
     *
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\SystemAuthUnauthorizedException
     * @throws Exception\SystemAuthInternalServerErrorException
     *
     * @return ($fetch is 'object' ? Model\AuthPostResponse200|null : \Psr\Http\Message\ResponseInterface)
     */
    public function systemAuth(?Model\AuthConfig $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\SystemAuth($requestBody), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\SystemInfoInternalServerErrorException
     *
     * @return ($fetch is 'object' ? Model\SystemInfo|null : \Psr\Http\Message\ResponseInterface)
     */
    public function systemInfo(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\SystemInfo(), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\SystemVersionInternalServerErrorException
     *
     * @return ($fetch is 'object' ? Model\SystemVersion|null : \Psr\Http\Message\ResponseInterface)
     */
    public function systemVersion(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\SystemVersion(), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function systemPing(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\SystemPing(), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function systemPingHead(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\SystemPingHead(), $fetch);
    }

    /**
     * @param array{
     *    "container"?: string, //The ID or name of the container to commit
     *    "repo"?: string, //Repository name for the created image
     *    "tag"?: string, //Tag name for the create image
     *    "comment"?: string, //Commit message
     *    "author"?: string, //Author of the image (e.g., `John Hannibal Smith <hannibal@a-team.com>`)
     *    "pause"?: bool, //Whether to pause the container before committing
     *    "changes"?: string, //`Dockerfile` instructions to apply while committing
     * } $queryParameters
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ImageCommitNotFoundException
     * @throws Exception\ImageCommitInternalServerErrorException
     *
     * @return ($fetch is 'object' ? Model\IdResponse|null : \Psr\Http\Message\ResponseInterface)
     */
    public function imageCommit(?Model\ContainerConfig $requestBody = null, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ImageCommit($requestBody, $queryParameters), $fetch);
    }

    /**
     * Stream real-time events from the server.
     *
     * Various objects within Docker report events when something happens to them.
     *
     * Containers report these events: `attach`, `commit`, `copy`, `create`, `destroy`, `detach`, `die`, `exec_create`, `exec_detach`, `exec_start`, `exec_die`, `export`, `health_status`, `kill`, `oom`, `pause`, `rename`, `resize`, `restart`, `start`, `stop`, `top`, `unpause`, `update`, and `prune`
     *
     * Images report these events: `delete`, `import`, `load`, `pull`, `push`, `save`, `tag`, `untag`, and `prune`
     *
     * Volumes report these events: `create`, `mount`, `unmount`, `destroy`, and `prune`
     *
     * Networks report these events: `create`, `connect`, `disconnect`, `destroy`, `update`, `remove`, and `prune`
     *
     * The Docker daemon reports these events: `reload`
     *
     * Services report these events: `create`, `update`, and `remove`
     *
     * Nodes report these events: `create`, `update`, and `remove`
     *
     * Secrets report these events: `create`, `update`, and `remove`
     *
     * Configs report these events: `create`, `update`, and `remove`
     *
     * The Builder reports `prune` events
     *
     * @param array{
     *    "since"?: string, //Show events created since this timestamp then stream new events.
     *    "until"?: string, //Show events created until this timestamp then stop streaming.
     *    "filters"?: string, //A JSON encoded value of filters (a `map[string][]string`) to process on the event list. Available filters:
     *
     * - `config=<string>` config name or ID
     * - `container=<string>` container name or ID
     * - `daemon=<string>` daemon name or ID
     * - `event=<string>` event type
     * - `image=<string>` image name or ID
     * - `label=<string>` image or container label
     * - `network=<string>` network name or ID
     * - `node=<string>` node ID
     * - `plugin`=<string> plugin name or ID
     * - `scope`=<string> local or swarm
     * - `secret=<string>` secret name or ID
     * - `service=<string>` service name or ID
     * - `type=<string>` object to filter by, one of `container`, `image`, `volume`, `network`, `daemon`, `plugin`, `node`, `service`, `secret` or `config`
     * - `volume=<string>` volume name
     * } $queryParameters
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\SystemEventsBadRequestException
     * @throws Exception\SystemEventsInternalServerErrorException
     *
     * @return ($fetch is 'object' ? Model\EventMessage|null : \Psr\Http\Message\ResponseInterface)
     */
    public function systemEvents(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\SystemEvents($queryParameters), $fetch);
    }

    /**
     * @param array{
     *    "type"?: array, //Object types, for which to compute and return data.
     * } $queryParameters
     * @param array  $accept Accept content header application/json|text/plain
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\SystemDataUsageInternalServerErrorException
     *
     * @return ($fetch is 'object' ? Model\SystemDfGetJsonResponse200|null : \Psr\Http\Message\ResponseInterface)
     */
    public function systemDataUsage(array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\SystemDataUsage($queryParameters, $accept), $fetch);
    }

    /**
     * Get a tarball containing all images and metadata for a repository.
     *
     * If `name` is a specific name and tag (e.g. `ubuntu:latest`), then only that image (and its parents) are returned. If `name` is an image ID, similarly only that image (and its parents) are returned, but with the exclusion of the `repositories` file in the tarball, as there were no image names referenced.
     *
     * ### Image tarball format
     *
     * An image tarball contains [Content as defined in the OCI Image Layout Specification](https://github.com/opencontainers/image-spec/blob/v1.1.1/image-layout.md#content).
     *
     * Additionally, includes the manifest.json file associated with a backwards compatible docker save format.
     *
     * If the tarball defines a repository, the tarball should also include a `repositories` file at the root that contains a list of repository and tag names mapped to layer IDs.
     *
     * ```json
     * {
     *   "hello-world": {
     *     "latest": "565a9d68a73f6706862bfe8409a7f659776d4d60a8d096eb4a3cbce6999cc2a1"
     *   }
     * }
     * ```
     *
     * @param string $name  Image name or ID
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function imageGet(string $name, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ImageGet($name), $fetch);
    }

    /**
     * Get a tarball containing all images and metadata for several image
     * repositories.
     *
     * For each value of the `names` parameter: if it is a specific name and
     * tag (e.g. `ubuntu:latest`), then only that image (and its parents) are
     * returned; if it is an image ID, similarly only that image (and its parents)
     * are returned and there would be no names referenced in the 'repositories'
     * file for this image ID.
     *
     * For details on the format, see the [export image endpoint](#operation/ImageGet).
     *
     * @param array{
     *    "names"?: array, //Image names to filter by. Repeat the parameter for multiple images.
     * } $queryParameters
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function imageGetAll(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ImageGetAll($queryParameters), $fetch);
    }

    /**
     * Load a set of images and tags into a repository.
     *
     * For details on the format, see the [export image endpoint](#operation/ImageGet).
     *
     * @param string|resource|\Psr\Http\Message\StreamInterface|null $requestBody
     * @param array{
     *    "quiet"?: bool, //Suppress progress details during load.
     * } $queryParameters
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ImageLoadInternalServerErrorException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function imageLoad($requestBody = null, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ImageLoad($requestBody, $queryParameters), $fetch);
    }

    /**
     * Run a command inside a running container.
     *
     * @param string $id    ID or name of container
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ContainerExecNotFoundException
     * @throws Exception\ContainerExecConflictException
     * @throws Exception\ContainerExecInternalServerErrorException
     *
     * @return ($fetch is 'object' ? Model\IdResponse|null : \Psr\Http\Message\ResponseInterface)
     */
    public function containerExec(string $id, ?Model\ContainersIdExecPostBody $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ContainerExec($id, $requestBody), $fetch);
    }

    /**
     * Starts a previously set up exec instance. If detach is true, this endpoint
     * returns immediately after starting the command. Otherwise, it sets up an
     * interactive session with the command.
     *
     * @param string $id     Exec instance ID
     * @param array  $accept Accept content header application/vnd.docker.raw-stream|application/vnd.docker.multiplexed-stream
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function execStart(string $id, ?Model\ExecIdStartPostBody $requestBody = null, string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\ExecStart($id, $requestBody, $accept), $fetch);
    }

    /**
     * Resize the TTY session used by an exec instance. This endpoint only works
     * if `tty` was specified as part of creating and starting the exec instance.
     *
     * @param string $id Exec instance ID
     * @param array{
     *    "h": int, //Height of the TTY session in characters
     *    "w": int, //Width of the TTY session in characters
     * } $queryParameters
     * @param array  $accept Accept content header application/json|text/plain
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ExecResizeBadRequestException
     * @throws Exception\ExecResizeNotFoundException
     * @throws Exception\ExecResizeInternalServerErrorException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function execResize(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\ExecResize($id, $queryParameters, $accept), $fetch);
    }

    /**
     * Return low-level information about an exec instance.
     *
     * @param string $id    Exec instance ID
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ExecInspectNotFoundException
     * @throws Exception\ExecInspectInternalServerErrorException
     *
     * @return ($fetch is 'object' ? Model\ExecIdJsonGetResponse200|null : \Psr\Http\Message\ResponseInterface)
     */
    public function execInspect(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ExecInspect($id), $fetch);
    }

    /**
     * @param array{
     *    "filters"?: string, //JSON encoded value of the filters (a `map[string][]string`) to
     * process on the volumes list. Available filters:
     *
     * - `dangling=<boolean>` When set to `true` (or `1`), returns all
     * volumes that are not in use by a container. When set to `false`
     * (or `0`), only volumes that are in use by one or more
     * containers are returned.
     * - `driver=<volume-driver-name>` Matches volumes based on their driver.
     * - `label=<key>` or `label=<key>:<value>` Matches volumes based on
     * the presence of a `label` alone or a `label` and a value.
     * - `name=<volume-name>` Matches all or part of a volume name.
     * } $queryParameters
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\VolumeListInternalServerErrorException
     *
     * @return ($fetch is 'object' ? Model\VolumeListResponse|null : \Psr\Http\Message\ResponseInterface)
     */
    public function volumeList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\VolumeList($queryParameters), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\VolumeCreateInternalServerErrorException
     *
     * @return ($fetch is 'object' ? Model\Volume|null : \Psr\Http\Message\ResponseInterface)
     */
    public function volumeCreate(?Model\VolumeCreateOptions $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\VolumeCreate($requestBody), $fetch);
    }

    /**
     * Instruct the driver to remove the volume.
     *
     * @param string $name Volume name or ID
     * @param array{
     *    "force"?: bool, //Force the removal of the volume
     * } $queryParameters
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\VolumeDeleteNotFoundException
     * @throws Exception\VolumeDeleteConflictException
     * @throws Exception\VolumeDeleteInternalServerErrorException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function volumeDelete(string $name, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\VolumeDelete($name, $queryParameters), $fetch);
    }

    /**
     * @param string $name  Volume name or ID
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\VolumeInspectNotFoundException
     * @throws Exception\VolumeInspectInternalServerErrorException
     *
     * @return ($fetch is 'object' ? Model\Volume|null : \Psr\Http\Message\ResponseInterface)
     */
    public function volumeInspect(string $name, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\VolumeInspect($name), $fetch);
    }

    /**
     * @param string $name The name or ID of the volume
     * @param array{
     *    "version": int, //The version number of the volume being updated. This is required to
     * avoid conflicting writes. Found in the volume's `ClusterVolume`
     * field.
     * } $queryParameters
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\VolumeUpdateBadRequestException
     * @throws Exception\VolumeUpdateNotFoundException
     * @throws Exception\VolumeUpdateInternalServerErrorException
     * @throws Exception\VolumeUpdateServiceUnavailableException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function volumeUpdate(string $name, ?Model\VolumesNamePutBody $requestBody = null, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\VolumeUpdate($name, $requestBody, $queryParameters), $fetch);
    }

    /**
     * @param array{
     *    "filters"?: string, //Filters to process on the prune list, encoded as JSON (a `map[string][]string`).
     *
     * Available filters:
     * - `label` (`label=<key>`, `label=<key>=<value>`, `label!=<key>`, or `label!=<key>=<value>`) Prune volumes with (or without, in case `label!=...` is used) the specified labels.
     * - `all` (`all=true`) - Consider all (local) volumes for pruning and not just anonymous volumes.
     * } $queryParameters
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\VolumePruneInternalServerErrorException
     *
     * @return ($fetch is 'object' ? Model\VolumesPrunePostResponse200|null : \Psr\Http\Message\ResponseInterface)
     */
    public function volumePrune(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\VolumePrune($queryParameters), $fetch);
    }

    /**
     * Returns a list of networks. For details on the format, see the
     * [network inspect endpoint](#operation/NetworkInspect).
     *
     * Note that it uses a different, smaller representation of a network than
     * inspecting a single network. For example, the list of containers attached
     * to the network is not propagated in API versions 1.28 and up.
     *
     * @param array{
     *    "filters"?: string, //JSON encoded value of the filters (a `map[string][]string`) to process
     * on the networks list.
     *
     * Available filters:
     *
     * - `dangling=<boolean>` When set to `true` (or `1`), returns all
     * networks that are not in use by a container. When set to `false`
     * (or `0`), only networks that are in use by one or more
     * containers are returned.
     * - `driver=<driver-name>` Matches a network's driver.
     * - `id=<network-id>` Matches all or part of a network ID.
     * - `label=<key>` or `label=<key>=<value>` of a network label.
     * - `name=<network-name>` Matches all or part of a network name.
     * - `scope=["swarm"|"global"|"local"]` Filters networks by scope (`swarm`, `global`, or `local`).
     * - `type=["custom"|"builtin"]` Filters networks by type. The `custom` keyword returns all user-defined networks.
     * } $queryParameters
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\NetworkListInternalServerErrorException
     *
     * @return ($fetch is 'object' ? Model\Network[]|null : \Psr\Http\Message\ResponseInterface)
     */
    public function networkList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\NetworkList($queryParameters), $fetch);
    }

    /**
     * @param string $id    Network ID or name
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\NetworkDeleteForbiddenException
     * @throws Exception\NetworkDeleteNotFoundException
     * @throws Exception\NetworkDeleteInternalServerErrorException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function networkDelete(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\NetworkDelete($id), $fetch);
    }

    /**
     * @param string $id Network ID or name
     * @param array{
     *    "verbose"?: bool, //Detailed inspect output for troubleshooting
     *    "scope"?: string, //Filter the network by scope (swarm, global, or local)
     * } $queryParameters
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\NetworkInspectNotFoundException
     * @throws Exception\NetworkInspectInternalServerErrorException
     *
     * @return ($fetch is 'object' ? Model\Network|null : \Psr\Http\Message\ResponseInterface)
     */
    public function networkInspect(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\NetworkInspect($id, $queryParameters), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\NetworkCreateBadRequestException
     * @throws Exception\NetworkCreateForbiddenException
     * @throws Exception\NetworkCreateNotFoundException
     * @throws Exception\NetworkCreateInternalServerErrorException
     *
     * @return ($fetch is 'object' ? Model\NetworksCreatePostResponse201|null : \Psr\Http\Message\ResponseInterface)
     */
    public function networkCreate(?Model\NetworksCreatePostBody $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\NetworkCreate($requestBody), $fetch);
    }

    /**
     * The network must be either a local-scoped network or a swarm-scoped network with the `attachable` option set. A network cannot be re-attached to a running container.
     *
     * @param string $id     Network ID or name
     * @param array  $accept Accept content header application/json|text/plain
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\NetworkConnectBadRequestException
     * @throws Exception\NetworkConnectForbiddenException
     * @throws Exception\NetworkConnectNotFoundException
     * @throws Exception\NetworkConnectInternalServerErrorException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function networkConnect(string $id, ?Model\NetworksIdConnectPostBody $requestBody = null, string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\NetworkConnect($id, $requestBody, $accept), $fetch);
    }

    /**
     * @param string $id     Network ID or name
     * @param array  $accept Accept content header application/json|text/plain
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\NetworkDisconnectForbiddenException
     * @throws Exception\NetworkDisconnectNotFoundException
     * @throws Exception\NetworkDisconnectInternalServerErrorException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function networkDisconnect(string $id, ?Model\NetworksIdDisconnectPostBody $requestBody = null, string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\NetworkDisconnect($id, $requestBody, $accept), $fetch);
    }

    /**
     * @param array{
     *    "filters"?: string, //Filters to process on the prune list, encoded as JSON (a `map[string][]string`).
     *
     * Available filters:
     * - `until=<timestamp>` Prune networks created before this timestamp. The `<timestamp>` can be Unix timestamps, date formatted timestamps, or Go duration strings (e.g. `10m`, `1h30m`) computed relative to the daemon machine’s time.
     * - `label` (`label=<key>`, `label=<key>=<value>`, `label!=<key>`, or `label!=<key>=<value>`) Prune networks with (or without, in case `label!=...` is used) the specified labels.
     * } $queryParameters
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\NetworkPruneInternalServerErrorException
     *
     * @return ($fetch is 'object' ? Model\NetworksPrunePostResponse200|null : \Psr\Http\Message\ResponseInterface)
     */
    public function networkPrune(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\NetworkPrune($queryParameters), $fetch);
    }

    /**
     * Returns information about installed plugins.
     *
     * @param array{
     *    "filters"?: string, //A JSON encoded value of the filters (a `map[string][]string`) to
     * process on the plugin list.
     *
     * Available filters:
     *
     * - `capability=<capability name>`
     * - `enable=<true>|<false>`
     * } $queryParameters
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\PluginListInternalServerErrorException
     *
     * @return ($fetch is 'object' ? Model\Plugin[]|null : \Psr\Http\Message\ResponseInterface)
     */
    public function pluginList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\PluginList($queryParameters), $fetch);
    }

    /**
     * @param array{
     *    "remote": string, //The name of the plugin. The `:latest` tag is optional, and is the
     * default if omitted.
     * } $queryParameters
     * @param array  $accept Accept content header application/json|text/plain
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\GetPluginPrivilegesInternalServerErrorException
     *
     * @return ($fetch is 'object' ? Model\PluginPrivilege[]|null : \Psr\Http\Message\ResponseInterface)
     */
    public function getPluginPrivileges(array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\GetPluginPrivileges($queryParameters, $accept), $fetch);
    }

    /**
     * Pulls and installs a plugin. After the plugin is installed, it can be
     * enabled using the [`POST /plugins/{name}/enable` endpoint](#operation/PostPluginsEnable).
     *
     * @param Model\PluginPrivilege[]|null $requestBody
     * @param array{
     *    "remote": string, //Remote reference for plugin to install.
     *
     * The `:latest` tag is optional, and is used as the default if omitted.
     *    "name"?: string, //Local name for the pulled plugin.
     *
     * The `:latest` tag is optional, and is used as the default if omitted.
     * } $queryParameters
     * @param array{
     *    "X-Registry-Auth"?: string, //A base64url-encoded auth configuration to use when pulling a plugin
     * from a registry.
     *
     * Refer to the [authentication section](#section/Authentication) for
     * details.
     * } $headerParameters
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\PluginPullInternalServerErrorException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function pluginPull(?array $requestBody = null, array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\PluginPull($requestBody, $queryParameters, $headerParameters), $fetch);
    }

    /**
     * @param string $name   The name of the plugin. The `:latest` tag is optional, and is the
     *                       default if omitted.
     * @param array  $accept Accept content header application/json|text/plain
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\PluginInspectNotFoundException
     * @throws Exception\PluginInspectInternalServerErrorException
     *
     * @return ($fetch is 'object' ? Model\Plugin|null : \Psr\Http\Message\ResponseInterface)
     */
    public function pluginInspect(string $name, string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\PluginInspect($name, $accept), $fetch);
    }

    /**
     * @param string $name The name of the plugin. The `:latest` tag is optional, and is the
     *                     default if omitted.
     * @param array{
     *    "force"?: bool, //Disable the plugin before removing. This may result in issues if the
     * plugin is in use by a container.
     * } $queryParameters
     * @param array  $accept Accept content header application/json|text/plain
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\PluginDeleteNotFoundException
     * @throws Exception\PluginDeleteInternalServerErrorException
     *
     * @return ($fetch is 'object' ? Model\Plugin|null : \Psr\Http\Message\ResponseInterface)
     */
    public function pluginDelete(string $name, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\PluginDelete($name, $queryParameters, $accept), $fetch);
    }

    /**
     * @param string $name The name of the plugin. The `:latest` tag is optional, and is the
     *                     default if omitted.
     * @param array{
     *    "timeout"?: int, //Set the HTTP client timeout (in seconds)
     * } $queryParameters
     * @param array  $accept Accept content header application/json|text/plain
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\PluginEnableNotFoundException
     * @throws Exception\PluginEnableInternalServerErrorException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function pluginEnable(string $name, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\PluginEnable($name, $queryParameters, $accept), $fetch);
    }

    /**
     * @param string $name The name of the plugin. The `:latest` tag is optional, and is the
     *                     default if omitted.
     * @param array{
     *    "force"?: bool, //Force disable a plugin even if still in use.
     * } $queryParameters
     * @param array  $accept Accept content header application/json|text/plain
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\PluginDisableNotFoundException
     * @throws Exception\PluginDisableInternalServerErrorException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function pluginDisable(string $name, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\PluginDisable($name, $queryParameters, $accept), $fetch);
    }

    /**
     * @param string                       $name        The name of the plugin. The `:latest` tag is optional, and is the
     *                                                  default if omitted.
     * @param Model\PluginPrivilege[]|null $requestBody
     * @param array{
     *    "remote": string, //Remote reference to upgrade to.
     *
     * The `:latest` tag is optional, and is used as the default if omitted.
     * } $queryParameters
     * @param array{
     *    "X-Registry-Auth"?: string, //A base64url-encoded auth configuration to use when pulling a plugin
     * from a registry.
     *
     * Refer to the [authentication section](#section/Authentication) for
     * details.
     * } $headerParameters
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\PluginUpgradeNotFoundException
     * @throws Exception\PluginUpgradeInternalServerErrorException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function pluginUpgrade(string $name, ?array $requestBody = null, array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\PluginUpgrade($name, $requestBody, $queryParameters, $headerParameters), $fetch);
    }

    /**
     * @param string|resource|\Psr\Http\Message\StreamInterface|null $requestBody
     * @param array{
     *    "name": string, //The name of the plugin. The `:latest` tag is optional, and is the
     * default if omitted.
     * } $queryParameters
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\PluginCreateInternalServerErrorException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function pluginCreate($requestBody = null, array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\PluginCreate($requestBody, $queryParameters), $fetch);
    }

    /**
     * Push a plugin to the registry.
     *
     * @param string $name   The name of the plugin. The `:latest` tag is optional, and is the
     *                       default if omitted.
     * @param array  $accept Accept content header application/json|text/plain
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\PluginPushNotFoundException
     * @throws Exception\PluginPushInternalServerErrorException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function pluginPush(string $name, string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\PluginPush($name, $accept), $fetch);
    }

    /**
     * @param string       $name        The name of the plugin. The `:latest` tag is optional, and is the
     *                                  default if omitted.
     * @param array[]|null $requestBody
     * @param string       $fetch       Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\PluginSetNotFoundException
     * @throws Exception\PluginSetInternalServerErrorException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function pluginSet(string $name, ?array $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\PluginSet($name, $requestBody), $fetch);
    }

    /**
     * @param array{
     *    "filters"?: string, //Filters to process on the nodes list, encoded as JSON (a `map[string][]string`).
     *
     * Available filters:
     * - `id=<node id>`
     * - `label=<engine label>`
     * - `membership=`(`accepted`|`pending`)`
     * - `name=<node name>`
     * - `node.label=<node label>`
     * - `role=`(`manager`|`worker`)`
     * } $queryParameters
     * @param array  $accept Accept content header application/json|text/plain
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\NodeListInternalServerErrorException
     * @throws Exception\NodeListServiceUnavailableException
     *
     * @return ($fetch is 'object' ? Model\Node[]|null : \Psr\Http\Message\ResponseInterface)
     */
    public function nodeList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\NodeList($queryParameters, $accept), $fetch);
    }

    /**
     * @param string $id The ID or name of the node
     * @param array{
     *    "force"?: bool, //Force remove a node from the swarm
     * } $queryParameters
     * @param array  $accept Accept content header application/json|text/plain
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\NodeDeleteNotFoundException
     * @throws Exception\NodeDeleteInternalServerErrorException
     * @throws Exception\NodeDeleteServiceUnavailableException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function nodeDelete(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\NodeDelete($id, $queryParameters, $accept), $fetch);
    }

    /**
     * @param string $id     The ID or name of the node
     * @param array  $accept Accept content header application/json|text/plain
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\NodeInspectNotFoundException
     * @throws Exception\NodeInspectInternalServerErrorException
     * @throws Exception\NodeInspectServiceUnavailableException
     *
     * @return ($fetch is 'object' ? Model\Node|null : \Psr\Http\Message\ResponseInterface)
     */
    public function nodeInspect(string $id, string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\NodeInspect($id, $accept), $fetch);
    }

    /**
     * @param string $id The ID of the node
     * @param array{
     *    "version": int, //The version number of the node object being updated. This is required
     * to avoid conflicting writes.
     * } $queryParameters
     * @param array  $accept Accept content header application/json|text/plain
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\NodeUpdateBadRequestException
     * @throws Exception\NodeUpdateNotFoundException
     * @throws Exception\NodeUpdateInternalServerErrorException
     * @throws Exception\NodeUpdateServiceUnavailableException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function nodeUpdate(string $id, ?Model\NodeSpec $requestBody = null, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\NodeUpdate($id, $requestBody, $queryParameters, $accept), $fetch);
    }

    /**
     * @param array  $accept Accept content header application/json|text/plain
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\SwarmInspectNotFoundException
     * @throws Exception\SwarmInspectInternalServerErrorException
     * @throws Exception\SwarmInspectServiceUnavailableException
     *
     * @return ($fetch is 'object' ? Model\Swarm|null : \Psr\Http\Message\ResponseInterface)
     */
    public function swarmInspect(string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\SwarmInspect($accept), $fetch);
    }

    /**
     * @param array  $accept Accept content header application/json|text/plain
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\SwarmInitBadRequestException
     * @throws Exception\SwarmInitInternalServerErrorException
     * @throws Exception\SwarmInitServiceUnavailableException
     *
     * @return ($fetch is 'object' ? string|null : \Psr\Http\Message\ResponseInterface)
     */
    public function swarmInit(?Model\SwarmInitPostBody $requestBody = null, string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\SwarmInit($requestBody, $accept), $fetch);
    }

    /**
     * @param array  $accept Accept content header application/json|text/plain
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\SwarmJoinBadRequestException
     * @throws Exception\SwarmJoinInternalServerErrorException
     * @throws Exception\SwarmJoinServiceUnavailableException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function swarmJoin(?Model\SwarmJoinPostBody $requestBody = null, string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\SwarmJoin($requestBody, $accept), $fetch);
    }

    /**
     * @param array{
     *    "force"?: bool, //Force leave swarm, even if this is the last manager or that it will
     * break the cluster.
     * } $queryParameters
     * @param array  $accept Accept content header application/json|text/plain
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\SwarmLeaveInternalServerErrorException
     * @throws Exception\SwarmLeaveServiceUnavailableException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function swarmLeave(array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\SwarmLeave($queryParameters, $accept), $fetch);
    }

    /**
     * @param array{
     *    "version": int, //The version number of the swarm object being updated. This is
     * required to avoid conflicting writes.
     *    "rotateWorkerToken"?: bool, //Rotate the worker join token.
     *    "rotateManagerToken"?: bool, //Rotate the manager join token.
     *    "rotateManagerUnlockKey"?: bool, //Rotate the manager unlock key.
     * } $queryParameters
     * @param array  $accept Accept content header application/json|text/plain
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\SwarmUpdateBadRequestException
     * @throws Exception\SwarmUpdateInternalServerErrorException
     * @throws Exception\SwarmUpdateServiceUnavailableException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function swarmUpdate(?Model\SwarmSpec $requestBody = null, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\SwarmUpdate($requestBody, $queryParameters, $accept), $fetch);
    }

    /**
     * @param array  $accept Accept content header application/json|text/plain
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\SwarmUnlockkeyInternalServerErrorException
     * @throws Exception\SwarmUnlockkeyServiceUnavailableException
     *
     * @return ($fetch is 'object' ? Model\SwarmUnlockkeyGetJsonResponse200|null : \Psr\Http\Message\ResponseInterface)
     */
    public function swarmUnlockkey(string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\SwarmUnlockkey($accept), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\SwarmUnlockInternalServerErrorException
     * @throws Exception\SwarmUnlockServiceUnavailableException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function swarmUnlock(?Model\SwarmUnlockPostBody $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\SwarmUnlock($requestBody), $fetch);
    }

    /**
     * @param array{
     *    "filters"?: string, //A JSON encoded value of the filters (a `map[string][]string`) to
     * process on the services list.
     *
     * Available filters:
     *
     * - `id=<service id>`
     * - `label=<service label>`
     * - `mode=["replicated"|"global"]`
     * - `name=<service name>`
     *    "status"?: bool, //Include service status, with count of running and desired tasks.
     * } $queryParameters
     * @param array  $accept Accept content header application/json|text/plain
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ServiceListInternalServerErrorException
     * @throws Exception\ServiceListServiceUnavailableException
     *
     * @return ($fetch is 'object' ? Model\Service[]|null : \Psr\Http\Message\ResponseInterface)
     */
    public function serviceList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\ServiceList($queryParameters, $accept), $fetch);
    }

    /**
     * @param array{
     *    "X-Registry-Auth"?: string, //A base64url-encoded auth configuration for pulling from private
     * registries.
     *
     * Refer to the [authentication section](#section/Authentication) for
     * details.
     * } $headerParameters
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ServiceCreateBadRequestException
     * @throws Exception\ServiceCreateForbiddenException
     * @throws Exception\ServiceCreateConflictException
     * @throws Exception\ServiceCreateInternalServerErrorException
     * @throws Exception\ServiceCreateServiceUnavailableException
     *
     * @return ($fetch is 'object' ? Model\ServiceCreateResponse|null : \Psr\Http\Message\ResponseInterface)
     */
    public function serviceCreate(?Model\ServicesCreatePostBody $requestBody = null, array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ServiceCreate($requestBody, $headerParameters), $fetch);
    }

    /**
     * @param string $id     ID or name of service
     * @param array  $accept Accept content header application/json|text/plain
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ServiceDeleteNotFoundException
     * @throws Exception\ServiceDeleteInternalServerErrorException
     * @throws Exception\ServiceDeleteServiceUnavailableException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function serviceDelete(string $id, string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\ServiceDelete($id, $accept), $fetch);
    }

    /**
     * @param string $id ID or name of service
     * @param array{
     *    "insertDefaults"?: bool, //Fill empty fields with default values.
     * } $queryParameters
     * @param array  $accept Accept content header application/json|text/plain
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ServiceInspectNotFoundException
     * @throws Exception\ServiceInspectInternalServerErrorException
     * @throws Exception\ServiceInspectServiceUnavailableException
     *
     * @return ($fetch is 'object' ? Model\Service|null : \Psr\Http\Message\ResponseInterface)
     */
    public function serviceInspect(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\ServiceInspect($id, $queryParameters, $accept), $fetch);
    }

    /**
     * @param string $id ID or name of service
     * @param array{
     *    "version": int, //The version number of the service object being updated. This is
     * required to avoid conflicting writes.
     * This version number should be the value as currently set on the
     * service *before* the update. You can find the current version by
     * calling `GET /services/{id}`
     *    "registryAuthFrom"?: string, //If the `X-Registry-Auth` header is not specified, this parameter
     * indicates where to find registry authorization credentials.
     *    "rollback"?: string, //Set to this parameter to `previous` to cause a server-side rollback
     * to the previous service spec. The supplied spec will be ignored in
     * this case.
     * } $queryParameters
     * @param array{
     *    "X-Registry-Auth"?: string, //A base64url-encoded auth configuration for pulling from private
     * registries.
     *
     * Refer to the [authentication section](#section/Authentication) for
     * details.
     * } $headerParameters
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ServiceUpdateBadRequestException
     * @throws Exception\ServiceUpdateNotFoundException
     * @throws Exception\ServiceUpdateInternalServerErrorException
     * @throws Exception\ServiceUpdateServiceUnavailableException
     *
     * @return ($fetch is 'object' ? Model\ServiceUpdateResponse|null : \Psr\Http\Message\ResponseInterface)
     */
    public function serviceUpdate(string $id, ?Model\ServicesIdUpdatePostBody $requestBody = null, array $queryParameters = [], array $headerParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ServiceUpdate($id, $requestBody, $queryParameters, $headerParameters), $fetch);
    }

    /**
     * Get `stdout` and `stderr` logs from a service. See also
     * [`/containers/{id}/logs`](#operation/ContainerLogs).
     *
     * **Note**: This endpoint works only for services with the `local`,
     * `json-file` or `journald` logging drivers.
     *
     * @param string $id ID or name of the service
     * @param array{
     *    "details"?: bool, //Show service context and extra details provided to logs.
     *    "follow"?: bool, //Keep connection after returning logs.
     *    "stdout"?: bool, //Return logs from `stdout`
     *    "stderr"?: bool, //Return logs from `stderr`
     *    "since"?: int, //Only return logs since this time, as a UNIX timestamp
     *    "timestamps"?: bool, //Add timestamps to every log line
     *    "tail"?: string, //Only return this number of log lines from the end of the logs.
     * Specify as an integer or `all` to output all log lines.
     * } $queryParameters
     * @param array  $accept Accept content header application/vnd.docker.raw-stream|application/vnd.docker.multiplexed-stream|application/json
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ServiceLogsNotFoundException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function serviceLogs(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\ServiceLogs($id, $queryParameters, $accept), $fetch);
    }

    /**
     * @param array{
     *    "filters"?: string, //A JSON encoded value of the filters (a `map[string][]string`) to
     * process on the tasks list.
     *
     * Available filters:
     *
     * - `desired-state=(running | shutdown | accepted)`
     * - `id=<task id>`
     * - `label=key` or `label="key=value"`
     * - `name=<task name>`
     * - `node=<node id or name>`
     * - `service=<service name>`
     * } $queryParameters
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\TaskListInternalServerErrorException
     * @throws Exception\TaskListServiceUnavailableException
     *
     * @return ($fetch is 'object' ? Model\Task[]|null : \Psr\Http\Message\ResponseInterface)
     */
    public function taskList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\TaskList($queryParameters), $fetch);
    }

    /**
     * @param string $id    ID of the task
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\TaskInspectNotFoundException
     * @throws Exception\TaskInspectInternalServerErrorException
     * @throws Exception\TaskInspectServiceUnavailableException
     *
     * @return ($fetch is 'object' ? Model\Task|null : \Psr\Http\Message\ResponseInterface)
     */
    public function taskInspect(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\TaskInspect($id), $fetch);
    }

    /**
     * Get `stdout` and `stderr` logs from a task.
     * See also [`/containers/{id}/logs`](#operation/ContainerLogs).
     *
     * **Note**: This endpoint works only for services with the `local`,
     * `json-file` or `journald` logging drivers.
     *
     * @param string $id ID of the task
     * @param array{
     *    "details"?: bool, //Show task context and extra details provided to logs.
     *    "follow"?: bool, //Keep connection after returning logs.
     *    "stdout"?: bool, //Return logs from `stdout`
     *    "stderr"?: bool, //Return logs from `stderr`
     *    "since"?: int, //Only return logs since this time, as a UNIX timestamp
     *    "timestamps"?: bool, //Add timestamps to every log line
     *    "tail"?: string, //Only return this number of log lines from the end of the logs.
     * Specify as an integer or `all` to output all log lines.
     * } $queryParameters
     * @param array  $accept Accept content header application/vnd.docker.raw-stream|application/vnd.docker.multiplexed-stream|application/json
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\TaskLogsNotFoundException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function taskLogs(string $id, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\TaskLogs($id, $queryParameters, $accept), $fetch);
    }

    /**
     * @param array{
     *    "filters"?: string, //A JSON encoded value of the filters (a `map[string][]string`) to
     * process on the secrets list.
     *
     * Available filters:
     *
     * - `id=<secret id>`
     * - `label=<key> or label=<key>=value`
     * - `name=<secret name>`
     * - `names=<secret name>`
     * } $queryParameters
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\SecretListInternalServerErrorException
     * @throws Exception\SecretListServiceUnavailableException
     *
     * @return ($fetch is 'object' ? Model\Secret[]|null : \Psr\Http\Message\ResponseInterface)
     */
    public function secretList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\SecretList($queryParameters), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\SecretCreateConflictException
     * @throws Exception\SecretCreateInternalServerErrorException
     * @throws Exception\SecretCreateServiceUnavailableException
     *
     * @return ($fetch is 'object' ? Model\IdResponse|null : \Psr\Http\Message\ResponseInterface)
     */
    public function secretCreate(?Model\SecretsCreatePostBody $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\SecretCreate($requestBody), $fetch);
    }

    /**
     * @param string $id    ID of the secret
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\SecretDeleteNotFoundException
     * @throws Exception\SecretDeleteInternalServerErrorException
     * @throws Exception\SecretDeleteServiceUnavailableException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function secretDelete(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\SecretDelete($id), $fetch);
    }

    /**
     * @param string $id    ID of the secret
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\SecretInspectNotFoundException
     * @throws Exception\SecretInspectInternalServerErrorException
     * @throws Exception\SecretInspectServiceUnavailableException
     *
     * @return ($fetch is 'object' ? Model\Secret|null : \Psr\Http\Message\ResponseInterface)
     */
    public function secretInspect(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\SecretInspect($id), $fetch);
    }

    /**
     * @param string $id The ID or name of the secret
     * @param array{
     *    "version": int, //The version number of the secret object being updated. This is
     * required to avoid conflicting writes.
     * } $queryParameters
     * @param array  $accept Accept content header application/json|text/plain
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\SecretUpdateBadRequestException
     * @throws Exception\SecretUpdateNotFoundException
     * @throws Exception\SecretUpdateInternalServerErrorException
     * @throws Exception\SecretUpdateServiceUnavailableException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function secretUpdate(string $id, ?Model\SecretSpec $requestBody = null, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\SecretUpdate($id, $requestBody, $queryParameters, $accept), $fetch);
    }

    /**
     * @param array{
     *    "filters"?: string, //A JSON encoded value of the filters (a `map[string][]string`) to
     * process on the configs list.
     *
     * Available filters:
     *
     * - `id=<config id>`
     * - `label=<key> or label=<key>=value`
     * - `name=<config name>`
     * } $queryParameters
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ConfigListInternalServerErrorException
     * @throws Exception\ConfigListServiceUnavailableException
     *
     * @return ($fetch is 'object' ? Model\Config[]|null : \Psr\Http\Message\ResponseInterface)
     */
    public function configList(array $queryParameters = [], string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ConfigList($queryParameters), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ConfigCreateConflictException
     * @throws Exception\ConfigCreateInternalServerErrorException
     * @throws Exception\ConfigCreateServiceUnavailableException
     *
     * @return ($fetch is 'object' ? Model\IdResponse|null : \Psr\Http\Message\ResponseInterface)
     */
    public function configCreate(?Model\ConfigsCreatePostBody $requestBody = null, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ConfigCreate($requestBody), $fetch);
    }

    /**
     * @param string $id    ID of the config
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ConfigDeleteNotFoundException
     * @throws Exception\ConfigDeleteInternalServerErrorException
     * @throws Exception\ConfigDeleteServiceUnavailableException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function configDelete(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ConfigDelete($id), $fetch);
    }

    /**
     * @param string $id    ID of the config
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ConfigInspectNotFoundException
     * @throws Exception\ConfigInspectInternalServerErrorException
     * @throws Exception\ConfigInspectServiceUnavailableException
     *
     * @return ($fetch is 'object' ? Model\Config|null : \Psr\Http\Message\ResponseInterface)
     */
    public function configInspect(string $id, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\ConfigInspect($id), $fetch);
    }

    /**
     * @param string $id The ID or name of the config
     * @param array{
     *    "version": int, //The version number of the config object being updated. This is
     * required to avoid conflicting writes.
     * } $queryParameters
     * @param array  $accept Accept content header application/json|text/plain
     * @param string $fetch  Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\ConfigUpdateBadRequestException
     * @throws Exception\ConfigUpdateNotFoundException
     * @throws Exception\ConfigUpdateInternalServerErrorException
     * @throws Exception\ConfigUpdateServiceUnavailableException
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function configUpdate(string $id, ?Model\ConfigSpec $requestBody = null, array $queryParameters = [], string $fetch = self::FETCH_OBJECT, array $accept = [])
    {
        return $this->executeEndpoint(new Endpoint\ConfigUpdate($id, $requestBody, $queryParameters, $accept), $fetch);
    }

    /**
     * Return image digest and platform information by contacting the registry.
     *
     * @param string $name  Image name or id
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @throws Exception\DistributionInspectUnauthorizedException
     * @throws Exception\DistributionInspectInternalServerErrorException
     *
     * @return ($fetch is 'object' ? Model\DistributionInspect|null : \Psr\Http\Message\ResponseInterface)
     */
    public function distributionInspect(string $name, string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\DistributionInspect($name), $fetch);
    }

    /**
     * @param string $fetch Fetch mode to use (can be OBJECT or RESPONSE)
     *
     * @return ($fetch is 'object' ? null : \Psr\Http\Message\ResponseInterface)
     */
    public function session(string $fetch = self::FETCH_OBJECT)
    {
        return $this->executeEndpoint(new Endpoint\Session(), $fetch);
    }

    public static function create($httpClient = null, array $additionalPlugins = [], array $additionalNormalizers = [], bool $applyServerPlugins = true)
    {
        $plugins = [];
        if (null === $httpClient) {
            $httpClient = \Http\Discovery\Psr18ClientDiscovery::find();
        }
        if ($applyServerPlugins) {
            $uri = \Http\Discovery\Psr17FactoryDiscovery::findUriFactory()->createUri('/v1.45');
            $plugins[] = new \Http\Client\Common\Plugin\AddPathPlugin($uri);
        }
        if (\count($additionalPlugins) > 0) {
            $plugins = array_merge($plugins, $additionalPlugins);
        }
        $httpClient = new \Http\Client\Common\PluginClient($httpClient, $plugins);
        $requestFactory = \Http\Discovery\Psr17FactoryDiscovery::findRequestFactory();
        $streamFactory = \Http\Discovery\Psr17FactoryDiscovery::findStreamFactory();
        $normalizers = [new \Symfony\Component\Serializer\Normalizer\ArrayDenormalizer(), new Normalizer\JaneObjectNormalizer()];
        if (\count($additionalNormalizers) > 0) {
            $normalizers = array_merge($normalizers, $additionalNormalizers);
        }
        $serializer = new \Symfony\Component\Serializer\Serializer($normalizers, [new \Symfony\Component\Serializer\Encoder\JsonEncoder(new \Symfony\Component\Serializer\Encoder\JsonEncode(), new \Symfony\Component\Serializer\Encoder\JsonDecode(['json_decode_associative' => true])), new Runtime\Client\FormEncoder()]);

        return new static($httpClient, $requestFactory, $serializer, $streamFactory);
    }
}
