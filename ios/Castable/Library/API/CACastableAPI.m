//
//  CACastableAPI.m
//  Castable
//
//  Created by Mike Riley on 2/23/18.
//  Copyright © 2018 Panopsis. All rights reserved.
//

#import "CACastableAPI.h"
#import "CAConfig.h"
@import AFNetworking;

@implementation CACastableAPI

- (NSString *)apiURL:(NSString *)path {
    return [[[[CAConfig sharedConfig] apiURI] URLByAppendingPathComponent:path] absoluteString];
}

- (void)search:(NSString *)podcastName handler:(CACastableAPIPodcastListResponseHandler)responseHandler {
    AFHTTPSessionManager *manager = [AFHTTPSessionManager manager];
    [manager GET:[self apiURL:@"podcast.search"]
      parameters:@{
                   @"api.token":[[CAConfig sharedConfig] apiKey]
                   }
        progress:nil
         success:^(NSURLSessionTask *task, id responseObject) {
             NSLog(@"JSON: %@", responseObject);
             
         } failure:^(NSURLSessionTask *operation, NSError *error) {
             NSLog(@"Error: %@", [operation response]);
         }];
}

- (void)start {
    NSLog(@"Error");
    CACastableAPIPodcastListResponseHandler responseHandler = ^(NSArray * results) {
        
    };
    [self search:@"trump" handler:responseHandler];
}

CA_SYNTHESIZE_SINGLETON(CastableAPI)

@end
