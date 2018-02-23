//
//  CASingleton.h
//  Castable
//
//  Created by Mike Riley on 2/23/18.
//  Copyright © 2018 Panopsis. All rights reserved.
//

#import <Foundation/Foundation.h>

@protocol CASingleton <NSObject>
@optional
- (void)start;
- (void)stop;
- (void)pause;
- (void)resume;
- (BOOL)handleOpenUrl:(NSURL *)url;
@end
